<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\File;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Comp;
use App\Models\Position;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{



    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }




    public function index()
    {
        $user = DB::table('users')->where('active', 2)->get();
        // $users = User::all();
        $comp = Comp::all();
        return view('Employee.view', compact('comp'), compact('user'));
    }
    public function create()
    {
        $comp = Comp::all();
        $position = Position::all();

        return view('Employee.create', compact('comp'),compact('positon'));
    }
    public function store(Request $request)
    {
        $phase = $request->all();
        Validator::make($phase, [
            'account_type' => ['account_type'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_id' => ['user_id'],
            'active' => ['required'],
            'company_id' => ['required'],
            'mobile' => ['required'],
            'altnumber' => ['required'],
            'FirstName' => ['required', 'string', 'max:255'],
            'LastName' => ['required'],
            'city' => ['required'],
            'country' => ['required'],
            'dob' => ['required'],
            'vat' => ['required'],
            'position' => ['required'],
            'salary' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['required'],

        ]);

        //   dd($request->input('company_id'));
        if ($request->file('image')) {
            $destinationPath = 'public/images/';
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . 'k.' . $extention;
            $file->move($destinationPath, $filename);
            $phase['image'] = $filename;
        }
        $names = [];

        if ($request->file('multipleimages')) {

            foreach ($request->file('multipleimages') as $image) {
                $destinationPath = 'public/images/';
                $filename = $image->getClientOriginalName();
                $image->move($destinationPath, $filename);
                $names[] = $filename;
            }
        }


        //    dd($phase['company_id']);
        User::create([

            'email' => $phase['email'],
            'city' => $phase['city'],
            'country' => $phase['country'],
            'image' => $phase['image'],
            'company_id' => $phase['company_id'],
            'account_type' => $phase['account_type'],
            'user_id' => $phase['user_id'],
            'FirstName' => $phase['FirstName'],
            'altnumber' => $phase['altnumber'],
            'mobile' => $phase['mobile'],
            'LastName' => $phase['LastName'],
            'dob' => $phase['dob'],
            'vat' => $phase['vat'],
            'position' => $phase['position'],
            'salary' => $phase['salary'],
            'active' => $phase['active'],
            'doc_type' => $phase['doc_type'],
            'multipleimages' => json_encode($names),
            'password' => Hash::make($phase['password']),
        ]);
        return redirect()->route('list.employ')->with('success', 'Employee created successfully.');
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $phase = $request->all();
        Validator::make($phase, [
            'account_type' => ['account_type'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_id' => ['user_id'],
            'active' => ['required'],
            'company_id' => ['required'],
            'mobile' => ['required'],
            'altnumber' => ['required'],
            'FirstName' => ['required', 'string', 'max:255'],
            'LastName' => ['required'],
            'city' => ['required'],
            'country' => ['required'],
            'dob' => ['required'],
            'vat' => ['required'],
            'position' => ['required'],
            'salary' => ['required'],

            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);

        //   dd($request->file('image'));
        if ($request->file('image')) {
            $destination = 'public/images/' . $user->image;
            if (File::exists($destination)) {

                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . 'k.' . $extention;
            $file->move('public/images/', $filename);
            $phase['image'] = $filename;
        }


        $names = [];

        if ($request->file('multipleimages')) {
            foreach ($request->file('multipleimages') as $image) {
                $filename = $image->getClientOriginalName();
                $destination = 'public/images/' . $filename;

                $destinationPath = 'public/images/';

                $image->move($destinationPath, $filename);
                $names[] = $filename;
                if (json_decode($user->multipleimages) != null) {
                    foreach (json_decode($user->multipleimages) as $images) {
                        if ($images == $filename) {
                            if (File::exists($destination)) {

                                File::delete($destination);
                            }
                            foreach (array_keys(json_decode($user->multipleimages), $images) as $key) {
                                json_decode($user->multipleimages)[$key]=$filename;

                            }
                        }
                    }
                }
            }
        }

        $user->Update($phase);
        return redirect()->route('list.employ')->with('success', 'Employee updated successfully.');
    }

    public function reset_password(Request $request, $id, $token = null)
    {
        $user = User::find($id);
        $password = $request->input('password');
        $validated = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);



        $user->Update([

            'password' => Hash::make($password),
        ]);
        $user = User::find($id);
        $comp = Comp::all();
        return view('employee.edit', compact('user'), compact('comp'))->with(
            ['token' => $token, 'email' => $user->email]
        );
    }
    public function edit($id, $token = null)
    {
        $user = User::find($id);
        $comp = Comp::all();
        return view('employee.edit', compact('user'), compact('comp'))->with(
            ['token' => $token, 'email' => $user->email]
        );
    }
    public function salary()
    {
        $users = DB::table('users')->where('active', 2)->get();
        // $users = User::all();

        return view('employee.managesalary', compact('users'));
    }
    public function edit_salary($id)
    {
        $user = User::find($id);
        $position = Position::all();
        return view('employee.editsalary', compact('user'),compact('position'));

    }

    public function update_salary(Request $request, $id)
    {
        $user = User::find($id);
        $phase = $request->all();
        Validator::make($phase, [


            'deductions' => ['nullable'],
            'deductions_detail' => ['nullable'],
            'overtime' => ['nullable'],
            'latetime' => ['nullable'],
            'position'=>['required'],
            'salary' => ['required'],



        ]);



        $user->Update($phase);
        return redirect()->route('salary')->with('success', 'Employee updated successfully.');
    }



    public function destroy($id)
    {

        $post = User::find($id);
        $destination = 'public/images/' . $post->image;

        if (File::exists($destination)) {
            File::delete($destination);
        }

        $post->delete();

        return redirect()->route('list.employ')
            ->with('success', 'Post deleted successfully');
    }
}
