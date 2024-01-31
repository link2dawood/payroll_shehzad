<?php

namespace App\Http\Controllers;

use App\Models\{User, Position, Overtime, Deduction, Attendance};
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;

class PayrollController extends Controller
{
    private $folder = "admin.payroll.";
    private $folders = "payroll.payroll.";

    public function index()
    {
        return View($this->folders . 'index', [
            'get_data' => route($this->folder . 'getData'),
        ]);
    }

    public function getData()
    {
        $position = Position::all();
        return View($this->folders . 'content', [
            'add_new' => "/",
            'getDataTable' => route($this->folder . 'getDataTable'),
            'payroll_url' => route($this->folder . "payrollExportPDF"),
            'payslip_url' => route($this->folder . "payslipExportPDF"),
            'position' => $position,
        ]);
    }

    public function getDataTable(Request $request)
    {

        $payroll = $this->payroll($request);
        // dd($payroll);
        return  Datatables::of($payroll)
            ->addIndexColumn()
            ->addColumn('employee', function ($data) {
                return "<div class='row'><div class='col-md-3 text-center'><img src='" . asset('images/' . $data->image) . "' class='rounded-circle table-user-thumb'></div><div class='col-md-6 col-lg-6 my-auto'><b class='mb-0'>" . $data->FirstName . " " . $data->LastName . "</b><p class='mb-2' title='" . $data->id . "'><small><i class='ik ik-at-sign'></i>" . $data->id . "</small></p></div><div class='col-md-4 col-lg-4'><small class='text-muted float-right'></small></div></div>";
            })
            ->addColumn('gross', function ($data) {
                return number_format($data->salary, 2);
            })
            ->addColumn('deductions', function ($data) {
                return ($data->deductions != null) ? number_format($data->deductions, 2) : "00";
            })
            ->addColumn('overtime', function ($data) {
                return ($data->overtime != null) ? number_format($data->overtime) . "-mins" : "0-mins";
            })
            ->addColumn('latetime', function ($data) {
                return ($data->latetime != null) ? number_format($data->latetime) . "-mins" : "0-mins";
            })

            ->addColumn('net_pay', function ($data) {


                $amount = (($data->salary) + (($data->overtime != null) ? $data->salary * ($data->overtime / (30 * 24 * 60)) : 0)) - (($data->deductions) + (($data->latetime != null) ? $data->salary * ($data->latetime / (30 * 24 * 60)) : 0));
                if ($amount <= 0) {
                    return "<b class='text-danger'>Rs." . number_format($amount, 2) . "</b>";
                }
                return "<b>Rs." . number_format($amount, 2) . "</b>";
            })
            ->rawColumns(['employee', 'gross', 'deductions', 'overtime', 'latetime', 'net_pay'])
            ->toJson();
    }

    public function payrollExportPDF(Request $request)
    {
        $payrolls = $this->payroll($request);

        $pdf = PDF::loadView($this->folders . "export.payroll", [
            'payrolls' => $payrolls,
            'date' => $request->date,

        ]);

        /*
    	return View($this->folder."export.payroll",[
    		'payrolls'=> $payrolls,
    		'date'=> $request->date,
    		'deduction_amount' => Deduction::sum("amount")
    	]);
    	*/
        $fileName = "payroll-" . date("d-M-Y") . "-" . time() . '.pdf';
        return $pdf->download($fileName);
    }

    public function payslipExportPDF(Request $request)
    {
        $payslips = $this->payroll($request);

        $pdf = PDF::loadView($this->folders . "export.payslip", [
            'payrolls' => $payslips,
            'date' => $request->date,

        ]);
        /*
    	return View($this->folder."export.payslip",[
    		'payrolls'=> $payrolls,
    		'date'=> $request->date,
    		'deduction_amount'=> Deduction::sum("amount"),
    	]);
		*/
        $fileName = "payslip-" . date("d-M-Y") . "-" . time() . '.pdf';
        return $pdf->download($fileName);
    }

    private function payroll($request)
    {
        $date = explode(' - ', $request->date);
        $position = $request->position;
        $start_date = date("Y-m-d", strtotime($date[0]));
        $end_date = date("Y-m-d", strtotime($date[1]));

        $thirtyDaysAgostrt = date("Y-m-d", strtotime("-30 days", strtotime($end_date)));
        $thirtyDaysAgoend = date("Y-m-d", strtotime("-30 days", strtotime($end_date)));
        if ($request->deductions != 0 && $request->overtime != 0 && $request->latetime != 0 && $position!=0) {
            $users = User::where("created_at", "<=", $thirtyDaysAgostrt)
                ->where("created_at", "<=", $thirtyDaysAgoend)
                ->where("deductions", "!=", null)
                ->where("overtime", "!=", null)
                ->where("latetime", "!=", null)
                ->where("position", "=", $position)
                ->where("active", '2')
                ->get();


        } elseif ($request->deductions != 0 && $request->overtime != 0 && $request->latetime != 0 ) {
            $users = User::where("created_at", "<=", $thirtyDaysAgostrt)
                ->where("created_at", "<=", $thirtyDaysAgoend)
                ->where("deductions", "!=", null)
                ->where("overtime", "!=", null)
                ->where("latetime", "!=", null)
                ->where("active", '2')
                ->get();


        }
        elseif ($request->deductions != 0 && $request->overtime != 0 && $position!=0) {
            $users = User::where("created_at", "<=", $thirtyDaysAgostrt)
                ->where("created_at", "<=", $thirtyDaysAgoend)
                ->where("deductions", "!=", null)
                ->where("overtime", "!=", null)
                ->where("position", "=", $position)
                ->where("active", '2')
                ->get();


        }  elseif ($request->overtime != 0 && $request->latetime != 0 && $position!=0) {
            $users = User::where("created_at", "<=", $thirtyDaysAgostrt)
                ->where("created_at", "<=", $thirtyDaysAgoend)
                ->where("overtime", "!=", null)
                ->where("latetime", "!=", null)
                ->where("position", "=", $position)
                ->where("active", '2')
                ->get();


        }
         elseif ($request->deductions != 0 && $request->latetime != 0 && $position!=0) {
            $users = User::where("created_at", "<=", $thirtyDaysAgostrt)
                ->where("created_at", "<=", $thirtyDaysAgoend)
                ->where("deductions", "!=", null)
                ->where("latetime", "!=", null)
                ->where("position", "=", $position)
                ->where("active", '2')
                ->get();


        }elseif ($request->deductions != 0 && $request->latetime != 0) {
            $users = User::where("created_at", "<=", $thirtyDaysAgostrt)
                ->where("created_at", "<=", $thirtyDaysAgoend)
                ->where("deductions", "!=", null)
                ->where("latetime", "!=", null)
                ->where("active", '2')
                ->get();


        }elseif ($request->deductions != 0 && $request->overtime != 0) {
            $users = User::where("created_at", "<=", $thirtyDaysAgostrt)
                ->where("created_at", "<=", $thirtyDaysAgoend)
                ->where("deductions", "!=", null)
                ->where("overtime", "!=", null)
                ->where("active", '2')
                ->get();


        }
         elseif ($request->deductions != 0 && $request->latetime != 0  ) {
            $users = User::where("created_at", "<=", $thirtyDaysAgostrt)
                ->where("created_at", "<=", $thirtyDaysAgoend)
                ->where("deductions", "!=", null)
                ->where("latetime", "!=", null)
                ->where("active", '2')
                ->get();


        }
            elseif ($request->overtime != 0 && $request->latetime != 0) {
            $users = User::where("created_at", "<=", $thirtyDaysAgostrt)
                ->where("created_at", "<=", $thirtyDaysAgoend)
                ->where("overtime", "!=", null)
                ->where("latetime", "!=", null)
                ->where("active", '2')
                ->get();


        }
         elseif ($request->deductions != 0 && $position!=0) {
            $users = User::where("created_at", "<=", $thirtyDaysAgostrt)
                ->where("created_at", "<=", $thirtyDaysAgoend)
                ->where("deductions", "!=", null)
                ->where("position", "=", $position)
                ->where("active", '2')
                ->get();


        }elseif ($request->overtime != 0 && $position!=0) {
            $users = User::where("created_at", "<=", $thirtyDaysAgostrt)
                ->where("created_at", "<=", $thirtyDaysAgoend)
                ->where("overtime", "!=", null)
                ->where("position", "=", $position)
                ->where("active", '2')
                ->get();


        }
         elseif ($request->latetime != 0 && $position!=0) {
            $users = User::where("created_at", "<=", $thirtyDaysAgostrt)
                ->where("created_at", "<=", $thirtyDaysAgoend)
                ->where("latetime", "!=", null)
                ->where("position", "=", $position)
                ->where("active", '2')
                ->get();


        }
        elseif ($request->deductions != 0 ) {
            $users = User::where("created_at", "<=", $thirtyDaysAgostrt)
                ->where("created_at", "<=", $thirtyDaysAgoend)
                ->where("deductions", "!=", null)
                ->where("active", '2')
                ->get();


        }
          elseif ($request->latetime != 0 ) {
            $users = User::where("created_at", "<=", $thirtyDaysAgostrt)
                ->where("created_at", "<=", $thirtyDaysAgoend)
                ->where("latetime", "!=", null)
                ->where("active", '2')
                ->get();


        }elseif ($request->overtime != 0) {
            $users = User::where("created_at", "<=", $thirtyDaysAgostrt)
                ->where("created_at", "<=", $thirtyDaysAgoend)
                ->where("overtime", "!=", null)
                ->where("active", '2')
                ->get();


        }
        elseif ($position != 0) {
            $users = User::where("created_at", "<=", $thirtyDaysAgostrt)
                ->where("created_at", "<=", $thirtyDaysAgoend)
                ->where("position", "=",$position)
                ->where("active", '2')
                ->get();
        }
        elseif ($position == 0) {
            $users = User::where("created_at", "<=", $thirtyDaysAgostrt)
                ->where("created_at", "<=", $thirtyDaysAgoend)
                ->where("active", '2')
                ->get();
        }

        return $users;
    }
}
