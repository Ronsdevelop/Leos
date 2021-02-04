<header class="main-header">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <a href="home" class="logo">
        <span class="logo-mini">
            <b title="Panadería Leos">P</b>L
        </span>
        <span class="logo-lg">
            <b title="Panaderia Leo's">Panaderia Leo's</b>
        </span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">#</span>
        </a>

     {{--    <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="ES">
                    <img src="{{ asset('pages/postext/img/flags/es.png') }}" alt="Español">
                </a>
                <ul class="dropdown-menu ps ps--theme_default">

                </ul>
            </li>
            <li>
                <a href="#" onClick="return false;" id="live_datetime"></a>
            </li>
        </ul> --}}
        <!-- navbar custome menu start -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="user user-menu active sell-btn">
                    <a href="pos" title="pos">
                        <svg class="svg-icon"><use href="#icon-pos-green"></svg>
                        <span class="text">pos</span>
                    </a>
                </li>
                <li>
                    <a id="keyboard-shortcut" ng-click="keyboardShortcutModal()" onClick="return false;" href="#" title="ATAJOS TECLADO">
                        <svg class="svg-icon"><use href="#icon-keyboard-green"></svg>
                    </a>
                </li>
                <li>
                    <a id="holding-order" ng-click="holdingOrderDetailsModal()" onClick="return false;" href="#" title="ORDEN DE ESPERA">
                        <svg class="svg-icon"><use href="#icon-hold-green"></svg>
                        &nbsp;<span class="label label-warning">0</span>
                    </a>
                </li>
                <li class="user user-menu">
                    <a href="report_cashbook.php" title="Informe de caja">
                        <svg class="svg-icon"><use href="#icon-register-green"></svg>
                        <span class="text">LIBRO DE PAGO</span>
                    </a>
                </li>
                <li class="user user-menu">
                    <a href="invoice.php" title="Factura">
                        <svg class="svg-icon"><use href="#icon-invoice-green"></svg>
                        <span class="text">Factura</span>
                        &nbsp;<span class="label label-warning">0</span>
                    </a>
                </li>
                <li id="user-preference" class="user user-menu sell-btn">
                    <a href="user_preference.php?store_id=1" title="Preferencia de usuario">
                        <svg class="svg-icon"><use href="#icon-heart-green"></svg>
                    </a>
                </li>
                <li class="user user-menu sell-btn">
                    <a href="store_single.php" title="Configuraciones">
                        <svg class="svg-icon"><use href="#icon-settings-green"></svg>
                    </a>
                </li>
                <li class="user user-menu">
                    <a href="stock_alert.php" title="Alerta de stock">
                        <svg class="svg-icon"><use href="#icon-alert-green"></svg>
                    </a>
                </li>

                <li class="user user-menu">

                </li>
                <li>
                    <a id="togglingfullscreen" onClick="toggleFullScreenMode(); return false;" href="#" title="tusolutionweb">
                        <span class="fa fa-fw fa-expand"></span>
                    </a>
                </li>
                <li id="scrolling-sidebar" class="user user-menu">
                    <a href="#" title="Reportes" data-toggle="scrolling-sidebar" data-width="350">
                        <i class="fa fa-square"></i>
                    </a>
                </li>
                <li id="screen-lock" class="user user-menu">
                    <a href="../lockscreen.php" title="Bloquear pantalla">
                        <i class="fa fa-lock"></i>
                    </a>
                </li>
                <li class="user user-menu">
                    <a id="logout" href="logout.php" title="Cerrar sesion">
                        <i class="fa fa-sign-out"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
