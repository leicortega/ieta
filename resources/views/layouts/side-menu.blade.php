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

                @canany(['estudiantes', 'general'])
                    <li>
                        <a href="/students" class="waves-effect"><i class="ion ion-ios-people"></i><span> Estudiantes <span class="float-right menu-arrow"></span> </span></a>
                    </li>
                @endcanany

                @canany(['profesores', 'general'])
                    <li>
                        <a href="/teachers" class="waves-effect"><i class="mdi mdi-tooltip-account"></i><span> Maestros <span class="float-right menu-arrow"></span> </span></a>
                    </li>
                @endcanany

                @canany(['grados', 'general'])
                    <li>
                        <a href="/grados" class="waves-effect"><i class="mdi mdi-account-badge-alert"></i><span> Grados <span class="float-right menu-arrow"></span> </span></a>
                    </li>
                @endcanany

                @canany(['materias', 'general'])
                    <li>
                        <a href="/materias" class="waves-effect"><i class="mdi mdi-notebook-multiple"></i><span> Materias <span class="float-right menu-arrow"></span> </span></a>
                    </li>
                @endcanany

                {{-- @if (Request::is('admin') || Request::is('admin/*'))

                    <li>
                        <a href="/admin/users" class="waves-effect"><i class="ion ion-md-people"></i><span> Usuarios <span class="float-right menu-arrow"></span> </span></a>
                    </li>

                @else --}}

                    {{-- @canany(['personal', 'general'])
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-md-person"></i><span> Estudiantes <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="/create-personal">Crear</a></li>
                                <li><a href="/view-personal">Ver Personal</a></li>
                            </ul>
                        </li>
                    @endcanany

                    @canany(['control ingreso', 'administrador personal', 'general'])
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-md-exit"></i><span> Control de Ingreso <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="/control/funcionarios">Funcionarios</a></li>
                                <li><a href="/control/clientes">Clientes</a></li>
                            </ul>
                        </li>
                    @endcanany

                @endif --}}

            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
