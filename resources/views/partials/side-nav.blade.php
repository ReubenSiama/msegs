<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- <div class="sb-sidenav-menu-heading">Core</div> --}}
                <a class="nav-link" href="/dashboard">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="/material-requests">
                    <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                    Material Requests
                </a>
                <a class="nav-link" href="/materials">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Material
                </a>
                <a class="nav-link" href="/supplier">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                    Supplier
                </a>
                <a class="nav-link" href="/district-manager">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    District Manager
                </a>
                <a class="nav-link" href="/purchasing-manager">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-shield"></i></div>
                    Purchasing Manager
                </a>
                <a class="nav-link" href="/categories">
                    <div class="sb-nav-link-icon"><i class="fas fa-layer-group"></i></div>
                    Categories
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
  </div>