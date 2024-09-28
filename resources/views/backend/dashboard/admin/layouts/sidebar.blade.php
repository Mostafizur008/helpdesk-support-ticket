<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">

        <li>
            <a href="/backend/dashboard/admin" class="waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-dashboards">Dashboard</span>
            </a>
        </li>

        <li class="menu-title" key="t-apps">Menu</li>

        <li>
            <a href="{{ route('priority') }}" class="waves-effect">
                <i class="bx bx-check-shield"></i>
                <span key="t-priority">Priority</span>
            </a>
        </li>
        <li>
            <a href="{{ route('department') }}" class="waves-effect">
                <i class="bx bx-spreadsheet"></i>
                <span key="t-department">Department</span>
            </a>
        </li>


        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-purchase-tag-alt"></i>
                <span key="t-icons">Ticket</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route('am.ticket')}}" key="t-material-design">Via Ticket</a></li>
                <li><a href="{{route('r.ticket')}}" key="t-boxicons">Reply Ticket</a></li>
                <li><a href="{{route('cl.ticket')}}" key="t-dripicons">Close Ticket</a></li>
            </ul>
        </li>


        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-cog"></i>
                <span key="t-setting">Settings</span>
            </a>
            <ul class="sub-menu" aria-expanded="true">
                <li><a href="{{route('setting.update')}}" key="t-level-1-1">Site Setting</a></li>
            </ul>
        </li>

    </ul>
</div>