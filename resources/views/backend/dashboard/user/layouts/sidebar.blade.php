<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">

        <li>
            <a href="/backend/dashboard/user" class="waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-dashboards">Dashboard</span>
            </a>
        </li>

        <li class="menu-title" key="t-apps">Menu</li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-purchase-tag-alt"></i>
                <span key="t-icons">Ticket</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route('open.ticket')}}" key="t-boxicons">Open Ticket</a></li>
                <li><a href="{{route('ticket')}}" key="t-material-design">View Ticket</a></li>
            </ul>
        </li>

    </ul>
</div>