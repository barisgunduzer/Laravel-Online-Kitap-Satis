<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        User
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_users')}}"><i class="fas fa-user"></i>Users</a>
                    </li>
                    <li class="nav-divider">
                        Product
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_category')}}"><i class="fas fa-fw fa-chart-pie"></i>Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_products')}}"><i class="fas fa-fw fa-book"></i>Products</a>
                    </li>
                    <li class="nav-divider">
                        Customer
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-box"></i>Orders</a>
                        <div id="submenu-1" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin_orders')}}">All Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin_order_list',['status'=>'New'])}}">New Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin_order_list',['status'=>'Accepted'])}}">Accepted Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin_order_list',['status'=>'Shipped'])}}">Shipped Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin_order_list',['status'=>'Completed'])}}">Completed Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin_order_list',['status'=>'Canceled'])}}">Canceled Orders</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('admin_review')}}"><i class="fas fa-comment"></i>Reviews</a>
                    </li>
                    <li class="nav-divider">
                        Website
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('admin_message')}}"><i class="fas fa-envelope"></i>Contact Messages</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('admin_faq')}}"><i class=" fas fa-question"></i>FAQs</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('admin_setting')}}"><i class="fas fa-fw fa-cog"></i>Settings</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->
