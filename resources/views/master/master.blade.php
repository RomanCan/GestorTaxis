<!--
    * Copyright 2016 Carlos Eduardo Alfaro Orellana
    -->
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Admin</title>
        {{--TOKEN PARA CAMBIOS--}}
    <meta name="token" id="token" value="{{ csrf_token() }}">
    {{--META PARA RUTA DINAMICA--}}
    <meta name="route" id="route" value="{{url('/')}}">

         <!-- Normalize CSS -->
        <link rel="stylesheet" href="css/normalize.css">

         <!-- Materialize CSS -->
        <link rel="stylesheet" href="css/materialize.min.css">

         <!-- Material Design Iconic Font CSS -->
        <link rel="stylesheet" href="css/material-design-iconic-font.min.css">

        <!-- Malihu jQuery custom content scroller CSS -->
        <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">

        <!-- Sweet Alert CSS -->
        <link rel="stylesheet" href="css/sweetalert.css">
        <!-- <link rel="stylesheet" href="css/sweetalert2.css"> -->

        <!-- MaterialDark CSS -->
        <link rel="stylesheet" href="css/style.css">

        {{--  iconos materialize  --}}
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <script src="js/vue.js"></script>
        <script src="js/vue-resource.min.js"></script>
    </head>
    <body>
        <!-- Nav Lateral -->
        <section class="NavLateral full-width">
            <div class="NavLateral-FontMenu full-width ShowHideMenu"></div>
            <div class="NavLateral-content full-width">
                <header class="NavLateral-title full-width center-align">
                    {{ Session::get('rol') }} <i class="zmdi zmdi-close NavLateral-title-btn ShowHideMenu"></i>
                </header>
                <figure class="full-width NavLateral-logo">
                    {{-- <img src="assets/img/logo.png" alt="material-logo" class="responsive-img center-box"> --}}
                    <figcaption class="center-align">{{Session::get('usuario')}}</figcaption>
                </figure>
                <div class="NavLateral-Nav">
                    <ul class="full-width">

                        <li class="active"><a href="{{url('perfil')}}"><i class="large material-icons">account_circle</i><span> Perfil</span></a></li><br>

                        <li class="active"><a href="{{url('taxistas')}}"><i class="large material-icons">assignment_ind</i><span> Taxistas</span></a></li><br>

                        <li class="active"><a href="{{url('taxis')}}"><i class="large material-icons">directions_bus</i><span> Taxis</span></a></li><br>

                        <li class="active"><a href="{{url('marcas')}}"><i class="large material-icons">description</i><span> Marcas</span></a></li><br>

                        <li class="active"><a href="{{url('destinos')}}"><i class="large material-icons">assignment_turned_in</i><span> Destinos</span></a></li><br>

                        <li class="active"><a href="{{url('pasajes_fijos')}}"><i class="large material-icons">assignment_ind</i><span> Pasajes Fijos</span></a></li><br>
                        
                        <li class="active"><a href="{{url('logout')}}" data-tooltip="Logout" ><i class="large material-icons">keyboard_tab</i><span> Salir</span></a></li><br>

                        {{-- <!-- <li class="NavLateralDivider"></li>
                        <li>
                            <a href="#" class="NavLateral-DropDown  waves-effect waves-light"><i class="zmdi zmdi-language-css3 zmdi-hc-fw"></i> <i class="zmdi zmdi-chevron-down NavLateral-CaretDown"></i> CSS</a>
                            <ul class="full-width">
                                <li><a href="typography-shadow.html" class="waves-effect waves-light">Typography & Shadow</a></li>
                                <li class="NavLateralDivider"></li>
                                <li><a href="table.html" class="waves-effect waves-light">Table</a></li>
                            </ul>
                        </li> --> --}}

                    </ul>
                </div>
            </div>
        </section>

        <!-- Page content -->
        <section class="ContentPage full-width">
            <!-- Nav Info -->
            <div class="ContentPage-Nav full-width">
                <ul class="full-width">
                    <li class="btn-MobileMenu ShowHideMenu"><a href="#" class="tooltipped waves-effect waves-light" data-position="bottom" data-delay="50" data-tooltip="Menu"><i class="zmdi zmdi-more-vert"></i></a></li>
                    <li><figure><img src="assets/img/user.png" alt="UserImage"></figure></li>
                    <li style="padding:0 5px;">{{Session::get('usuario')}}</li>
                    <!-- <li><a href="{{url('logout')}}" class="tooltipped waves-effect waves-light btn-ExitSystem" data-position="bottom" data-delay="50" data-tooltip="Logout"><i class="zmdi zmdi-power"></i></a></li> -->
                    {{-- <!-- <li><a href="#" class="tooltipped waves-effect waves-light btn-Search" data-position="bottom" data-delay="50" data-tooltip="Search"><i class="zmdi zmdi-search"></i></a></li> -->
                    <!-- <li>
                        <a href="#" class="tooltipped waves-effect waves-light btn-Notification" data-position="bottom" data-delay="50" data-tooltip="Notifications">
                            <i class="zmdi zmdi-notifications"></i>
                            <span class="ContentPage-Nav-indicator bg-danger">2</span>
                        </a>
                    </li> --> --}}
                </ul>
            </div>

            {{-- <!-- Notifications area -->
            <!-- <section class="z-depth-3 NotificationArea">
                <div class="full-width center-align NotificationArea-title">Notifications <i class="zmdi zmdi-close btn-Notification"></i></div>
                <a href="#" class="waves-effect Notification">
                    <div class="Notification-icon"><i class="zmdi zmdi-accounts-alt bg-info"></i></div>
                    <div class="Notification-text">
                        <p>
                            <i class="zmdi zmdi-circle tooltipped" data-position="left" data-delay="50" data-tooltip="Notification as UnRead"></i>
                            <strong>New User Registration</strong>
                            <br>
                            <small>Just Now</small>
                        </p>
                    </div>
                </a>
                <a href="#" class="waves-effect Notification">
                    <div class="Notification-icon"><i class="zmdi zmdi-cloud-download bg-primary"></i></div>
                    <div class="Notification-text">
                        <p>
                            <i class="zmdi zmdi-circle-o tooltipped" data-position="left" data-delay="50" data-tooltip="Notification as Read"></i>
                            <strong>New Updates</strong>
                            <br>
                            <small>30 Mins Ago</small>
                        </p>
                    </div>
                </a>
                <a href="#" class="waves-effect Notification">
                    <div class="Notification-icon"><i class="zmdi zmdi-upload bg-success"></i></div>
                    <div class="Notification-text">
                        <p>
                            <i class="zmdi zmdi-circle tooltipped" data-position="left" data-delay="50" data-tooltip="Notification as UnRead"></i>
                            <strong>Archive uploaded</strong>
                            <br>
                            <small>31 Mins Ago</small>
                        </p>
                    </div>
                </a>
                <a href="#" class="waves-effect Notification">
                    <div class="Notification-icon"><i class="zmdi zmdi-mail-send bg-danger"></i></div>
                    <div class="Notification-text">
                        <p>
                            <i class="zmdi zmdi-circle-o tooltipped" data-position="left" data-delay="50" data-tooltip="Notification as Read"></i>
                            <strong>New Mail</strong>
                            <br>
                            <small>37 Mins Ago</small>
                        </p>
                    </div>
                </a>
                <a href="#" class="waves-effect Notification">
                    <div class="Notification-icon"><i class="zmdi zmdi-folder bg-primary"></i></div>
                    <div class="Notification-text">
                        <p>
                            <i class="zmdi zmdi-circle-o tooltipped" data-position="left" data-delay="50" data-tooltip="Notification as Read"></i>
                            <strong>Folder delete</strong>
                            <br>
                            <small>1 hours Ago</small>
                        </p>
                    </div>
                </a>
            </section> --> --}}


            <!-- Your code here -->
            <h4 class="center-align"></h4>
            {{-- <!-- Your code here --> --}}
            @yield('contenido')



            <!-- Footer -->
            {{-- <footer class="footer-MaterialDark">
                <div class="container">
                    <div class="row">
                        <div class="col l6 s12">
                            <h5 class="white-text">Footer Content</h5>
                            <p class="grey-text text-lighten-4">
                                To better support on CSS components and icons, please visit the official websites of the technologies used.
                                <br>
                                Para mejor soporte sobre los componentes CSS e iconos, por favor visite los sitios web oficiales de las tecnologias usadas
                            </p>
                        </div>
                        <div class="col l4 offset-l2 s12">
                            <h5 class="white-text">Technologies used</h5>
                            <ul>
                                <li><a class="grey-text text-lighten-3" href="http://materializecss.com/">Materialize</a></li>
                                <li><a class="grey-text text-lighten-3" href="http://zavoloklom.github.io/material-design-iconic-font/icons.html">Material Design Iconic Font</a></li>
                                <li><a class="grey-text text-lighten-3" href="http://t4t5.github.io/sweetalert/">Sweet Alert</a></li>
                                <li><a class="grey-text text-lighten-3" href="http://manos.malihu.gr/jquery-custom-content-scroller/">jQuery custom content scroller</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="NavLateralDivider"></div>
                <div class="footer-copyright">
                    <div class="container center-align">
                        © 2016 Carlos Eduardo Alfaro Orellana
                    </div>
                </div>
            </footer> --}}
        </section>



        @stack('scripts')
        {{--  <script src="js/jquery-3.3.1.min.js"></script>  --}}
        {{-- <!-- Sweet Alert JS --> --}}
        <script src="js/sweetalert.min.js"></script>
        <!-- <script src="js/sweetalert2.min.js"></script> -->
        {{-- <!-- jQuery --> --}}
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
        <script>window.jQuery || document.write('<script src="js/jquery-2.2.0.min.js"><\/script>')</script>

        {{-- <!-- Materialize JS --> --}}
        <script src="js/materialize.min.js"></script>

        {{-- <!-- Malihu jQuery custom content scroller JS --> --}}
        <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

        {{-- <!-- MaterialDark JS --> --}}
        <script src="js/main.js"></script>
        {{--  modal  --}}
        <script src="js/modal-materialize.js"></script>

    </body>
    </html>
