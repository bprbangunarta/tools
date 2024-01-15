<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-square" style="border-radius: 3px;"
                    alt="User Image">
            </div>
            <div class="pull-left info">
                <p style="text-transform: uppercase;">{{ Auth::user()->username }}</p>
                <span class="label label-success">Verified</span>
            </div>
        </div>

        <form action="{{ route('dashboard') }}" method="GET" class="sidebar-form">
            <div class="input-group">
                <input type="text" class="form-control text-uppercase pull-right"
                    style="width: 180px;font-size:11.4px;" name="keyword" id="keyword"
                    value="{{ request('keyword') }}" placeholder="Search">

                <span class="input-group-btn">
                    <button type="submit" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN MENU</li>

            <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    Dashboard
                </a>
            </li>

            <li
                class="treeview {{ request()->is('transaksi/tabungan', 'transaksi/sma', 'pembukaan/deposito', 'pembukaan/tabungan') ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-tv"></i>
                    Monitoring Transaksi
                    @if ($total == 0)
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    @else
                        <span class="pull-right-container">
                            <span class="label label-danger pull-right">{{ $total }}</span>
                        </span>
                    @endif
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('transaksi/tabungan') ? 'active' : '' }}">
                        <a href="{{ route('trx-tabungan.index') }}">
                            @if ($trx_tabungan == 0)
                                <i class="fa fa-circle-o"></i>
                                Transaksi Tabungan
                            @else
                                <span class="pull-right-container">
                                    <span class="label label-danger pull-right">{{ $trx_tabungan }}</span>
                                </span>
                            @endif
                        </a>
                    </li>

                    <li class="{{ request()->is('transaksi/sma') ? 'active' : '' }}">
                        <a href="{{ route('trx-sama.index') }}">
                            @if ($trx_sma == 0)
                                <i class="fa fa-circle-o"></i>
                                Transaksi SMA Dana
                            @else
                                <span class="pull-right-container">
                                    <span class="label label-danger pull-right">{{ $trx_sma }}</span>
                                </span>
                            @endif
                        </a>
                    </li>

                    <li class="{{ request()->is('pembukaan/deposito') ? 'active' : '' }}">
                        <a href="{{ route('pembukaan-deposito.index') }}">
                            @if ($deposito == 0)
                                <i class="fa fa-circle-o"></i>
                                Pembukaan Deposito
                            @else
                                <span class="pull-right-container">
                                    <span class="label label-danger pull-right">{{ $deposito }}</span>
                                </span>
                            @endif
                        </a>
                    </li>

                    <li class="{{ request()->is('pembukaan/tabungan') ? 'active' : '' }}">
                        <a href="{{ route('pembukaan-tabungan.index') }}">
                            @if ($tabungan == 0)
                                <i class="fa fa-circle-o"></i>
                                Pembukaan Tabungan
                            @else
                                <span class="pull-right-container">
                                    <span class="label label-danger pull-right">{{ $tabungan }}</span>
                                </span>
                            @endif
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{ request()->is('deposito', 'deposito/search') ? 'active' : '' }}">
                <a href="{{ route('deposito.index') }}">
                    <i class="fa fa-money"></i>
                    Update QQ Deposito
                </a>
            </li>

            <li class="{{ request()->is('tabungan', 'tabungan/search') ? 'active' : '' }}">
                <a href="{{ route('tabungan.index') }}">
                    <i class="fa fa-credit-card"></i>
                    Update QQ Tabungan
                </a>
            </li>

            <li class="{{ request()->is('nasabah', 'nasabah/search') ? 'active' : '' }}">
                <a href="{{ route('nasabah.index') }}">
                    <i class="fa fa-phone"></i>
                    Update Nomor Telepon
                </a>
            </li>
        </ul>
    </section>
</aside>
