<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <h3 class="text-white "><i class=" bi bi-boxes"> </i> POS </h3>
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu icon-style-1
        icon-list-style-1
        ">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('auth.dashboard') }}" class="dropdown-toggle no-arrow">
                        <i class="micon bi bi-justify"></i><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <i class="micon bi bi-justify"></i><span class="mtext">Product</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('auth.product.index') }}">List Product</a></li>
                        <li><a href="{{ route('auth.product.create') }}">Create Product</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <i class="micon bi bi-justify"></i><span class="mtext">Supply</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('auth.product.index') }}">List Supply</a></li>
                        <li><a href="{{ route('auth.product.create') }}">Create Supply</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <i class="micon bi bi-justify"></i><span class="mtext">Transaction</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('auth.product.index') }}">List Transaction</a></li>
                        <li><a href="{{ route('auth.product.create') }}">Create Transaction</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <i class="micon bi bi-justify"></i><span class="mtext">User</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('auth.product.index') }}">List User</a></li>
                        <li><a href="{{ route('auth.product.create') }}">Access User</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>
