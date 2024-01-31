<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Payroll {{ $date }} | PeSystem - A System for HR Payment Generator. </title>
    <style type="text/css">
      body {
          position: relative;
          width: auto;
          height: 29.7cm;
          color: #001028;
          background: #FFFFFF;
          font-size: 14px;
          font-family : 'helvetica';
      }
      table {
          width: 100%;
          border-collapse: collapse;
          border-spacing: 0;
          margin-bottom: 20px;
          border: 1px solid #dee2e6;
          border-collapse: collapse;
      }

      table tr:nth-child(2n-1) td {
          background: #F5F5F5;
      }

      table th,
      table td {
          text-align: center;
      }

      table th {
          padding: 5px 20px;
          color: #5D6975;
          border-bottom: 1px solid #C1CED9;
          white-space: nowrap;
          font-weight: normal;
      }

      table td {
          padding: 12px;
          text-align: left;
      }

      .text-center{
        text-align: center;
      }

      .border-top-bootom-1{
        border-top: 1px solid #C1CED9;
        border-bottom: 1px solid #C1CED9;
      }
      .py-4{
        padding-top:16px;
        padding-bottom:16px;
      }

      .my-4{
        margin-top:16px;
        margin-bottom:16px;
      }

      .px-4{
        padding-left:16px;
        padding-right:16px;
      }

      .mx-4{
        margin-left:16px;
        margin-right:16px;
      }

      .row-inline-block{
        display: inline-block;
      }
      .row > .col-4{
        width: 33%;
        display: inline-block;
      }

      .row > .col-6{
        width: 49%;
        display: inline-block;
      }

      .border-1{
        border:1px solid #C1CED9;
      }

      .text-right{
        text-align: right;
      }

      .block{
        text-align: right;
      }
      .block p{
        width: 50%;
      }

      .column {
        float: left;
        width: 50%;
      }

      /* Clear floats after the columns */
      .row-css:after {
        content: "";
        display: table;
        clear: both;
      }
  </style>
  </head>
  <body>
    <div class="card border-1">
          <div class="card-header">
              <h2 class="text-center border-top-bootom-1 py-4">PESYSTEM - PAYROLLS</h2>
              <h2 class="text-center border-top-bootom-1 py-4">{{ $date }}</h2>
          </div>
          <div class="card-body border">

                <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="border table table-bordered" cellspacing="0" cellpadding="3">
                     <tr>
                      <th width="30%" class="text-center"><b>Employee Name</b></th>
                      <th width="10%" class="text-center"><b>Employee ID</b></th>
                      <th width="20%" class="text-center"><b>Deductions</b></th>
                      <th width="10%" class="text-center"><b>Overtime</b></th>
                      <th width="10%" class="text-center"><b>Latetime</b></th>
                      <th width="20%" class="text-cnter"><b>Net Pay</b></th>
                    </tr>
                    @php
                      $total = 0;
                    @endphp
                    @foreach($payrolls as $payroll)
                    <tr>
                      <td  class="text-center">{{ $payroll->FirstName." ".$payroll->LastName }}</td>
                      <td  class="text-center">{{ $payroll->id }}</td>
                      @php
                      $amount = (($payroll->salary)+(($payroll->overtime!=null)?$payroll->salary*($payroll->overtime/(30*24*60)):0))-(($payroll->deductions)+(($payroll->latetime!=null)?$payroll->salary*($payroll->latetime/(30*24*60)):0));
                        $total=$total+$amount;
                      @endphp
                      <td  class="text-center">Rs.{{ ($payroll->deductions!=null)?number_format($payroll->deductions,2):00 }}</td>
                      <td  class="text-center">{{ ($payroll->overtime!=null)?$payroll->overtime:0}}.-mins</td>
                      <td  class="text-center">{{ ($payroll->latetime!=null)?$payroll->latetime:0 }}.-mins</td>
                      <td  class="text-center">Rs.{{ number_format($amount,2) }}</td>
                    </tr>
                    @endforeach
                    <tr>
                      <td colspan="5" class="text-right"><b>Total:</b></td>
                      <td class="text-right"><b>RS. {{ number_format($total,2) }}</b></td>
                    </tr>
                  </div>
                </div>
          </div>
        </div>
  </body>
</html>
