<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
        <ul>
            <li class="menu-title">Main</li>
            <li class=" ">
                <a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li>
                <a href="{{ url('employee') }}"><i class="fa fa-user-md"></i> <span>Employee</span></a>
            
             <li class="submenu">
            <a href="#"><i class="fa fa-book"></i> <span> Employee Details </span> <span class="menu-arrow"></span></a>
            <ul style="display: none;"> 
                <li>
                    <a href="{{ route('emp.licence') }}">
                    <i class="fa fa-file"></i> Licence</a>
                </li>
                <li>
                    <a href="{{ route('emp.education') }}">
                    <i class="fa fa-file"></i> Education</a>
                </li>
                <li><a href="{{ route('emp.vaccination') }}">
                    <i class="fa fa-file"></i> Vaccination</a>
                </li>
                <li><a href="{{ route('emp.wsq') }}">
                    <i class="fa fa-file"></i> Wsq</a>
                </li>
                
                <li><a href="{{ route('emp.certificate') }}">
                    <i class="fa fa-file"></i> Certificates</a>
                </li>
                <li><a href="{{ route('emp.bonus') }}">
                    <i class="fa fa-file"></i> Bonus</a>
                </li>  
                <li><a href="#">
                    <i class="fa fa-file"></i> Referal</a>
                </li>
                <li><a href="#">
                    <i class="fa fa-file"></i> Renewal</a>
                </li>
               
            </ul>
            </li>
            <li class="submenu">
                <a href="#"><i class="fa fa-book"></i> <span> Leave Management </span> <span class="menu-arrow"></span></a>
                <ul style="display: none;">
                <li>
                <a href="{{ url('/employee/leave')}}"><i class="fa fa-clock-o"></i> <span>Employee Leaves</span></a>
                </li>
                    <li><a href="{{ route('emp.leave.status') }}">
                        <i class="fa fa-file"></i> Leave Status</a></li> 
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><i class="fa fa-book"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
                <ul style="display: none;">
                    <li><a href="{{ url('salary')}}">Employee Salary</a></li>
                    <li><a href="{{ url('payslip/history') }}">Payslip History</a></li> 
                </ul>
            </li>
             
            <li class="submenu">
                    <a href="#"><i class="fa fa-address-book-o"></i> <span> Core Hr </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                            <li><a href="{{ url('warning') }}">Employees Warning</a></li>
                            <li><a href="{{url('termination')}}">Employee Terminations</a></li> 
                    </ul>
            </li>
			 
        </ul>
    </div>
</div>
</div>