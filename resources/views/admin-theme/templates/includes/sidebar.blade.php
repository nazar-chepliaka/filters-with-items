<!-- Sidebar -->
<div class="sidebar">

<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item">
      <a href="{{route('admin.dashboard')}}" class="nav-link
      @if(
        request()->routeIs('admin.dashboard')
      )
        active
      @endif
    ">
        <i class="nav-icon fas fa-home"></i>
        <p>
          Основная
        </p>
      </a>
    </li>

  </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->

</aside>