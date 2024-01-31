<!--data here-->
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade active show" id="live" role="tabpanel" aria-labelledby="pills-timeline-tab">

        <!--Live Overtime Data-->
        <div class="card-header">


            <div class="col-md-3 d-block">
                <button class="btn btn-sm btn-dark float-left" id="pdfBtnPrintpayroll"><i class="ik ik-printer"></i> PAYROLL</button>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-0">
                    <span class="input-group-prepend">
                        <label class="input-group-text"><i class="ik ik-calendar"></i></label>
                    </span>
                    <input type="text" class="form-control form-control-bold text-center" placeholder="From date - To date" id="date">
                    <span class="input-group-append">
                        <label class="input-group-text"><i class="ik ik-calendar"></i></label>
                    </span>
                </div>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary mb-2 h-33 float-right" id="pdfBtnPrintpayslilp"><i class="ik ik-printer"></i> PAYSLIP</button>
            </div>


        </div>
        <div class="row" style="margin-left: 250px;">


            <div class="col-md-3 d-flex">
                <label class="form-label mt-2" for="position"><i class="fa-sharp fa-solid fa-circle-dollar">Designation:</i></label>
                <select class="form-control " name="position" id="position" required>
                    <option value="0">All</option>
                    @foreach($position as $pop)
                    <option value="{{$pop->id}}">{{$pop->position}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mt-2">
                <label class="form-label" for="deductions"><i class="fa-sharp fa-solid fa-circle-dollar">Deductions:</i></label>
                <input type="checkbox" name="deductions" id="deductions" value="0">
            </div>
            <div class="col-md-3 mt-2">
                <label class="form-label" for="overtime"><i class="fa-sharp fa-solid fa-gauge-min">Overtime:</i></label>
                <input type="checkbox" name="overtime" id="overtime" value="0">
            </div>
            <div class="col-md-3 mt-2">
                <label class="form-label" for="latetime"><i class="fa-sharp fa-solid fa-gauge-min">Latetime:</i></label>
                <input type="checkbox" name="latetime" id="latetime" value="0">
            </div>

        </div>
        <div class="card-body table-responsive">
            <table id="payroll_data_table" class="table table-striped">
                <thead>
                    <tr>
                        <th>Employee Details</th>
                        <th>Gross</th>
                        <th>Deductions</th>
                        <th>Overtime</th>
                        <th>Latetime</th>
                        <th>Net Pay</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <!--End Live Overtime Data-->

    </div>
</div>
<!--End data here-->

<div class="divHide">
    <form data-action="{{ $payslip_url }}" method="post" id="payslipForm" >
        @method('POST')
        @csrf
        <input type="text" name="date" id="payslip_date_input">
        <input type="text" name="deductions" id="payslip_deductions"  value="0" >
        <input type="text" name="overtime" id="payslip_overtime"  value="0">
        <input type="text" name="latetime" id="payslip_latetime"  value="0">
        <input type="text" name="position" id="payslip_position"  value="0">
    </form>
    <form data-action="{{ $payroll_url }}" method="post" id="payrollForm"  >
        @method('POST')
        @csrf
        <input type="text" name="date" id="payroll_date_input">
        <input type="text" name="deductions" id="payroll_deductions"  value="0">
        <input type="text" name="overtime" id="payroll_overtime"  value="0">
        <input type="text" name="latetime" id="payroll_latetime"  value="0">
        <input type="text" name="position" id="payroll_position"  value="0">
    </form>
</div>
<script type="text/javascript">
    // get data from serve ajax

    function printForm(formId, btn) {

        $.ajax({
            url: $(formId).data('action'),
            type: 'POST',
            data: new FormData($(formId)[0]),
            processData: false,
            contentType: false,
            xhrFields: {
                'responseType': 'blob'
            },
            beforeSend: function() {
                btn.prop('disabled', true);
            },
            complete: function() {
                btn.prop('disabled', false);
            },
            success: function(blob, status, xhr) {
                let filename = '';
                const disposition = xhr.getResponseHeader('Content-Disposition');

                if (disposition && disposition.indexOf('attachment') !== -1) {
                    const filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                    const matches = filenameRegex.exec(disposition);

                    if (matches != null && matches[1]) {
                        filename = matches[1].replace(/['"]/g, '');
                    }
                }

                let a = document.createElement('a');
                a.href = window.URL.createObjectURL(blob, status, xhr);
                a.download = filename;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                window.URL.revokeObjectURL(a.href);
            }
        });
    }

    $(document).ready(function() {

        var crntDate = moment().format('MMMM DD, YYYY');
        var lastDate = moment().subtract(30, 'days').format('MMMM DD, YYYY');
        var datePickerPlug = $('#date').daterangepicker({
            "startDate": lastDate,
            "endDate": crntDate,
            locale: {
                format: 'MMMM DD, YYYY'
            },
        });
        var position=$('#position');
        var deductions = $('#deductions');
        var overtime = $('#overtime');
        var latetime = $('#latetime');

        var table = $("table#payroll_data_table").DataTable({
            "processing": true,
            "serverSide": true,
            "pagingType": "full_numbers",
            "pageLength": 25,
            "autoWidth": false,
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "ajax": {
                "url": "{{ $getDataTable }}",
                "type": "POST",
                "data": function(d) {
                    d.date = $("#date").val();
                    d.deductions = $("#deductions").val();
                    d.overtime = $("#overtime").val();
                    d.latetime = $("#latetime").val();
                    d.position = $("#position").val();
                }
            },
            "columnDefs": [{
                'targets': [1],
                'searchable': false,
                'orderable': false,
                "className": "text-left"
            }],
            "columns": [{
                    "data": "employee"
                },
                {
                    "data": "gross"
                },
                {
                    "data": "deductions"
                },
                {
                    "data": "overtime"
                },
                {
                    "data": "latetime"
                },
                {
                    "data": "net_pay"
                },
            ],
        });

        var inputDate = $("#date").val();
        $("#payroll_date_input,#payslip_date_input").val(inputDate);

        datePickerPlug.on('apply.daterangepicker', function(ev, picker) {
            var date = picker.startDate.format("MMMM DD, YYYY") + " - " + picker.endDate.format("MMMM DD, YYYY");
            $("#payroll_date_input,#payslip_date_input").val(date);
            table.ajax.reload();
        });
        deductions.on('change', function() {
            if (this.checked) {
                $("#deductions,#payroll_deductions,#payslip_deductions").val('1');
            } else {
                $("#deductions,#payroll_deductions,#payslip_deductions").val('0');
            }
            table.ajax.reload();
        });
        overtime.on('change', function() {
            if (this.checked) {
                $("#overtime,#payroll_overtime,#payslip_overtime").val('1');
            } else {
                $("#overtime,#payroll_overtime,#payslip_overtime").val('0');
            }
            table.ajax.reload();
        });
        latetime.on('change', function() {
            if (this.checked) {
                $("#latetime,#payroll_latetime,#payslip_latetime").val('1');
            } else {
                $("#latetime,#payroll_latetime,#payslip_latetime").val('0');
            }
            table.ajax.reload();
        });
        position.on('change', function() {

                $("#payroll_position,#payslip_position").val(position.val());

            table.ajax.reload();
        });



        $("#pdfBtnPrintpayslilp,#pdfBtnPrintpayroll").on("click", function(e) {
            var formId = ($(this).attr("id") == "pdfBtnPrintpayslilp") ? "#payslipForm" : "#payrollForm";
            printForm(formId, $(this));
        });
    });
</script>
