@extends('Admin.layout.main')
@section('content')

<div class="content">
<div>
    <h4>Dashboard</h4>
</div>   
  
<div class="row">
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget">
        <span class="dash-widget-bg1"><i class="fa fa-user" aria-hidden="true"></i></span>
        <div class="dash-widget-info text-right">
                <h3> {{ $employee }} </h3>
               
                <span class="widget-title1">  
                    <a href="{{ url('employee') }}" class="text-white">Employees</a>
                    <i class="fa fa-check" aria-hidden="true"></i>
                </span> 
        </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget">
            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
            <div class="dash-widget-info text-right">
                <h3>1072</h3>
                <span class="widget-title2">
                    <a href="{{route('emp.leave')}}" class="text-white">Leave Management</a>
                    <i class="fa fa-check" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget">
            <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
            <div class="dash-widget-info text-right">
                <h3>72</h3>
                <span class="widget-title3">
                    <a href="{{route('salary.list')}}" class="text-white">Payroll Management</a> 
                    <i class="fa fa-check" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
<!--    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget">
            <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
            <div class="dash-widget-info text-right">
                <h3>618</h3>
                <span class="widget-title4">
                    Pending 
                <i class="fa fa-check" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>-->
</div>
 
 
</div>
@endsection