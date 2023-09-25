<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('customer') }}">
                    <span class="menu-title">Customer</span>
                    <i class="mdi mdi-contacts menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('supplier') }}">
                    <span class="menu-title">Suppliers</span>
                    <i class="mdi mdi-contacts menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('category') }}">
                    <span class="menu-title">Categories</span>
                    <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('employee') }}">
                    <span class="menu-title">Employees</span>
                    <i class="mdi mdi-chart-bar menu-icon"></i>
                </a>
            </li>
        </ul>
    </nav>
