<!-- sidebar-->
<aside class="aside-container">
    <!-- START Sidebar (left)-->
    <div class="aside-inner">
        <nav class="sidebar" data-sidebar-anyclick-close="">
            <!-- START sidebar nav-->
            <ul class="sidebar-nav">
                <!-- START user info-->
                <li class="has-user-block">
                    <div class="show" id="user-block">
                        <div class="item user-block">
                            <!-- User picture-->
                            <div class="user-block-picture">
                                <div class="user-block-status">
                                    <img class="img-thumbnail rounded-circle" src="{{ auth::user()->photo }}" alt="Avatar" width="60" height="60">
                                    <div class="circle bg-success circle-lg"></div>
                                </div>
                            </div>
                            <!-- Name and Job-->
                            <div class="user-block-info">
                                <span class="user-block-name">Hello, {{ auth::user()->first_name }}</span>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- END user info-->
                <!-- Iterates over all sidebar items-->
                <li class="nav-heading ">
                    <span data-localize="sidebar.heading.HEADER">Main Navigation</span>
                </li>
                <li class=" ">
                    <a href="{{route('home')}}" title="Dashboard">
                        <em class="icon-speedometer"></em>
                        <span data-localize="sidebar.nav.DASHBOARD">Dashboard</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="#manage-transaction" title="Transaction" data-toggle="collapse">
                        <em class="icon-grid"></em>
                        <span data-localize="sidebar.nav.MANAGE">Transaction</span>
                    </a>
                    <ul class="sidebar-nav sidebar-subnav collapse" id="manage-transaction">
                        <li class="sidebar-subnav-header">Transaction</li>
                        <li>
                            <a href="{{ route('transaction.selling.index') }}" title="User">
                                <span>Selling</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('transaction.buying.index') }}" title="User">
                                <span>Buying</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=" ">
                    <a href="#manage" title="Manage" data-toggle="collapse">
                        <em class="icon-grid"></em>
                        <span data-localize="sidebar.nav.MANAGE">Manage</span>
                    </a>
                    <ul class="sidebar-nav sidebar-subnav collapse" id="manage">
                        <li class="sidebar-subnav-header">Manage</li>
                        <li>
                            <a href="{{ route('customer.index') }}" title="User">
                                <span>Customer</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('distributor.index') }}" title="User">
                                <span>Distributor</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('product.index') }}" title="User">
                                <span>Product</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('product-category.index') }}" title="User">
                                <span>Product Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('unit.index') }}" title="User">
                                <span>Unit</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('user-group.index')}}" title="User Group">
                                <span>User Group</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="{{ route('user.index') }}" title="User">
                                <span>User</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- END sidebar nav-->
        </nav>
    </div>
    <!-- END Sidebar (left)-->
</aside>