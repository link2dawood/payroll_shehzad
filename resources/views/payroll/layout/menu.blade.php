<div class="nav-container">
    <nav id="main-menu-navigation" class="navigation-main">

        <div class="nav-item {{ request()->routeIs(['admin.payroll.*']) ? 'active' : '' }}">
            <a href="{{ route('admin.payroll.index') }}"><i class="ik ik-dollar-sign"></i><span>Payroll</span></a>
        </div>

       

    </nav>
</div>
