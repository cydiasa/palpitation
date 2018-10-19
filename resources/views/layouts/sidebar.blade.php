<div class="list-group">
    <a href=" /dashboard" class="list-group-item {{ Request::is('dashboard') ? 'active' : '' }}"  data-toggle="tooltip" data-placement="botton" title="Back to dashboard" ><i class="fa fa-key"></i> | <span>Dashboard</span></a>
    <a href=" /dashboard/caffeine-sources" class="list-group-item {{ Request::is('dashboard/caffeine-sources*') ? 'active' : '' }}"  data-toggle="tooltip" data-placement="bottom" title="Caffeine sources" >
        <i class="fa fa-coffee"></i> | <span>Caffeine Sources</span>
    </a>
    @if(Request::is('dashboard/caffeine-sources*'))
    <ul class="nav flex-column" style="margin-left:2.5em;">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/caffeine-sources/create') ? 'font-weight-bold' : '' }}" href="/dashboard/caffeine-sources/create"  data-toggle="tooltip" data-placement="bottom" title="Create a new resource" >Create New Caffeine Source</a>
        </li>
        <li class="nav-item">
            <a class="nav-link  {{ Request::is('dashboard/caffeine-sources') ? 'font-weight-bold' : '' }}" href="/dashboard/caffeine-sources"  data-toggle="tooltip" data-placement="bottom" title="View all resource" >View All</a>
        </li>
    </ul>
    @endif


    <a href=" /dashboard/caffeine-intake" class="list-group-item {{ Request::is('dashboard/caffeine-intake*') ? 'active' : '' }}"  data-toggle="tooltip" data-placement="bottom" title="Caffeine Intake" >
        <i class="fas fa-redo-alt"></i> | <span>Caffeine Intake</span>
    </a>
    @if(Request::is('dashboard/caffeine-intake*'))
    <ul class="nav flex-column" style="margin-left:2.5em;">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/caffeine-intake/create') ? 'font-weight-bold' : '' }}" href="/dashboard/caffeine-intake/create"  data-toggle="tooltip" data-placement="bottom" title="Create a new resource" >Create New Caffeine Intake</a>
        </li>
        <li class="nav-item">
            <a class="nav-link  {{ Request::is('dashboard/caffeine-intake') ? 'font-weight-bold' : '' }}" href="/dashboard/caffeine-intake"  data-toggle="tooltip" data-placement="bottom" title="View all resource" >View All</a>
        </li>
        <li class="nav-item" style="margin-left:1.5em;">
                <a class="nav-link  {{ Request::is('dashboard/caffeine-intake?ts=today') ? 'font-weight-bold' : '' }}" href="/dashboard/caffeine-intake?ts=today"  data-toggle="tooltip" data-placement="bottom" title="View resources created today" >-Today</a>
        </li>
        <li class="nav-item" style="margin-left:1.5em;">
                <a class="nav-link  {{ Request::is('dashboard/caffeine-intake?ts=week') ? 'font-weight-bold' : '' }}" href="/dashboard/caffeine-intake?ts=week"  data-toggle="tooltip" data-placement="bottom" title="View resources created last week" >-Week</a>
        </li>
        <li class="nav-item" style="margin-left:1.5em;">
                <a class="nav-link  {{ Request::is('dashboard/caffeine-intake?ts=month') ? 'font-weight-bold' : '' }}" href="/dashboard/caffeine-intake?ts=month"  data-toggle="tooltip" data-placement="bottom" title="View resources created last week" >-Month</a>
        </li>
        <li class="nav-item" style="margin-left:1.5em;">
                <a class="nav-link  {{ Request::is('dashboard/caffeine-intake?ts=year') ? 'font-weight-bold' : '' }}" href="/dashboard/caffeine-intake?ts=year"  data-toggle="tooltip" data-placement="bottom" title="View resources created last week" >-Year</a>
        </li>

    </ul>
    @endif
</div>
