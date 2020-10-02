<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Overview</li>
                <li>
                <a href="{{ route('index') }}" class="waves-effect">
                        <i class="ion ion-md-speedometer"></i> <span> Dashboard </span>
                    </a>
                </li>

                <li class="menu-title">Apps</li>
                
                @if (Request::is('admin') || Request::is('admin/*'))

                    <li>
                        <a href="/admin/users" class="waves-effect"><i class="ion ion-md-people"></i><span> Usuarios <span class="float-right menu-arrow"></span> </span></a>
                    </li>

                @else

                    @canany('personal')
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-md-person"></i><span> Personal <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="/create-personal">Crear</a></li>
                                <li><a href="/view-personal">Ver Personal</a></li>
                            </ul>
                        </li>
                    @endcanany

                    @canany(['control ingreso', 'administrador personal'])
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-md-exit"></i><span> Control de Ingreso <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="/control/funcionarios">Funcionarios</a></li>
                                <li><a href="/control/clientes">Clientes</a></li>
                            </ul>
                        </li>
                    @endcanany

                @endif                

            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>