<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>{% block title %} SUIOS - Registro Único de Organizaciones Sociales {% endblock %}</title>

    <!-- Bloque de hojas de estilo general del sistema -->
    {% block stylesheets %}
        <!-- Librerias generales del sistema css bootstrap -->
        {{ stylesheet_link('css/bootstrap/css/bootstrap.min.css') }}
        {{ stylesheet_link('css/bootstrapValidator/bootstrapValidator.min.css') }}
        {{ stylesheet_link('css/font-awesome/css/font-awesome.css') }}
        {{ stylesheet_link('css/plugins/social-buttons.css') }}
        {{ stylesheet_link('css/app.css') }}
        {{ stylesheet_link('css/loader/prettyLoader.css') }}
        {{ stylesheet_link('css/chosen/jquery.chosen.css') }}
        {{ stylesheet_link('css/bootstrap-select/bootstrap-select.min.css') }}
        {{ stylesheet_link('css/icheck/skins/all.css') }}
        {{ stylesheet_link('css/data-tables/jquery.dataTables.min.css') }}
        {{ stylesheet_link('css/datetimepicker/bootstrap-datetimepicker.min.css') }}
        {{ stylesheet_link('css/daterangepicker/daterangepicker-bs3.css') }}
        {{ stylesheet_link('css/jquery.datepick/smoothness.datepick.css') }}
        {{ stylesheet_link('css/jquery.datepick/ui-black-tie.datepick.css') }}
        {{ stylesheet_link('css/daterangepicker/daterangepicker-bs3.css') }}
        {{ stylesheet_link('css/file/fileinput.css') }}

        {{ stylesheet_link('css/jquery.autocomplete.css') }}
    {% endblock %}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Registro Único de Organizaciones Sociales">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="{{ 'favicon.ico' }}"/>

    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-57948377-1', 'auto');
        ga('send', 'pageview');
    </script>
</head>
<body class="with-3d-shadow with-transitions">
<div class="navbar" id="main-nav"><!--navbar-fixed-top-->
    <div class="container">
        <div class="navbar-header">
            <button data-target="#site-nav" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>

            <!-- SISTEMA UNIFICADO DE ORGANIZACIONES SOCIALES ======= LOGO ========-->
            <a href="{{ url('') }}" class="navbar-brand scrollto">
                <span class="logo-small"><img alt="" src="/img/secretaria_gestion_politica2.png"></span>
            </a>

        </div>
        <?php $identity = $this->auth->getIdentity(); ?>
        <?php $rutaInicial = $this->auth->getDataRoles()[0]['RutaInicial']; ?>
        <div class="navbar-collapse collapse" id="site-nav">
            <ul class="nav navbar-nav navbar-right">
                <li class="active" data-role="home">
                    <a class="scrollto" href="{{ url('') }}" data-toggle="tooltip" data-placement="bottom"
                       data-original-title="Página de Inicio"><i class="fa fa-home fa-2x"></i> </a>
                </li>
                <li class="" data-role="directory">
                    <a class="scrollto" href="{{ url("directorio") }}" data-toggle="tooltip" data-placement="bottom"
                       data-original-title="Directorio de Organizaciones"><i class="fa fa-list-alt fa-2x"></i> </a>
                </li>
                <!-- Si existe una identidad de un usuario -->
                {% if identity AND identity.NombreUsuario != 'invitado' %}

                    <?php if($this->auth->verifyGestorDocumentalRol()) {?>
                    <li class="" data-role="seguimieto-organizaciones">
                        <a class="scrollto" href="{{ url( rutaInicial ) }}" data-toggle="tooltip"
                           data-placement="bottom"
                           data-original-title="Seguimiento de Organizaciones"><i
                                    class="fa fa-th-list fa-2x"></i> </a>
                    </li>
                    <?php } ?>
                    <li data-role="messages" class="dropdown">
                        <a data-original-title="Notificaciones" rel="tooltip" href="#" class="dropdown-toggle user-menu"
                           data-toggle="dropdown" data-placement="bottom">
                            <i class="fa fa-bell fa-2x"></i> <b class="caret fa-2x"></b></a>
                        <ul data-rol="list-notification" style="z-index: 10000" class="dropdown-menu message-dropdown">
                            <!-- Notificaciones -->
                            <li class="message-footer">
                                <div style="margin-top: 5px;margin-left: 10px;" class="row">No hay ninguna
                                    notificación.
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li class="message-footer"><a href="{{ url('notificaciones') }}"><span><i
                                                class="fa fa-bell-o"></i> Ver todas las notificaciones </span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle user-menu"
                           data-original-title="Opciones de Usuario" rel="tooltip" data-placement="bottom">
                            <i class="fa fa-user fa-2x"></i>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('usuario/perfil') }}"><i class="dropdown-icon fa fa-user"></i> Perfil de
                                    usuario</a></li>
                            <li><a href="{{ url('seguridad/cambiar_clave') }}"><i class="dropdown-icon fa fa-lock"></i>
                                    Cambiar clave</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('seguridad/logoff') }}"><i class="dropdown-icon fa fa-power-off"></i>
                                    Cerrar sesión </a></li>
                        </ul>

                    </li>
                {% else %}
                    <li class="" data-role="login">
                        <a class="scrollto" href="{{ url("login") }}" data-toggle="tooltip" data-placement="bottom"
                           data-original-title="Iniciar Sesión"><i class="fa fa-sign-in fa-2x"></i> </a>
                    </li>
                {% endif %}

            </ul>
        </div>
        <!--End navbar-collapse -->

    </div>
    <!--End container -->
</div>
<!-- Barra de menus de la aplicacion -->

<?php $menus = $this->menu->getMenu(); ?>
<!-- Si existe el menu se crea la barra -->
{% if menus %}
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" data-target="#idMenuApp" data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div id="idMenuApp" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    {% if menus['left'] %}
                        {% for index, menu in menus['left'] %}
                            <li class="dropdown">
                                <a title="" class="" href="{{ url(menu['Url']) }}"
                                   data-original-title="{{ menu['Nombre'] }}"
                                   {% if menu['HasSubMenu'] == '1' %}data-toggle="dropdown" {% endif %}
                                        >
                                    <i class="{% if menu['Nombre'] %}{{ menu['Imagen'] }}{% endif %}"></i> {{ menu['Nombre'] }}
                                    {% if menu['HasSubMenu'] == '1' %}<b class="caret"></b>{% endif %}
                                </a>
                                <ul class="dropdown-menu">
                                    {% for key, submenu in menu['SubMenu'] %}
                                        <li><a href="{{ url(submenu['Url']) }}"
                                               title="{{ submenu['Titulo'] }}">
                                                <i class="{{ submenu['Imagen'] }}"></i> {{ submenu['Nombre'] }}
                                            </a>
                                        </li>
                                    {% endfor %}
                                </ul>
                            </li>
                        {% endfor %}
                    {% endif %}
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    {% if menus['right'] %}
                        {% for index, menu in menus['right'] %}
                            <li class="dropdown">
                                <a title="" class="" href="{{ url(menu['Url']) }}"
                                   data-original-title="{{ menu['Nombre'] }}"
                                   {% if menu['HasSubMenu'] == '1' %}data-toggle="dropdown" {% endif %}
                                        >
                                    <i class="{% if menu['Nombre'] %}{{ menu['Imagen'] }}{% endif %}"></i> {{ menu['Nombre'] }}
                                    {% if menu['HasSubMenu'] == '1' %}<b class="caret"></b>{% endif %}
                                </a>
                                <ul class="dropdown-menu">
                                    {% for key, submenu in menu['SubMenu'] %}
                                        <li><a href="{{ url(submenu['Url']) }}"
                                               title="{{ submenu['Titulo'] }}">
                                                <i class="{{ submenu['Imagen'] }}"></i> {{ submenu['Nombre'] }}
                                            </a>
                                        </li>
                                    {% endfor %}
                                </ul>
                            </li>
                        {% endfor %}
                    {% endif %}
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
{% endif %}


<div class="container">
    <!-- Bloque de breacumb -->
    <div class="col-lg-12 margin-top-20">
        <div class="btn-group btn-breadcrumb">
            {% block breadcumb_home %}<a href="{{ url('') }}" class="btn btn-info">
                    <i class="glyphicon glyphicon-home"></i> RUOS </a>{% endblock %}
            {% block breadcumb %}{% endblock %}
        </div>
    </div>
    <!-- Bloque de contenido del sistema -->
    {% block content %}
        {{ content() }}
    {% endblock %}
</div>

<!-- Bloque de javascripts del sistema -->
{% block javascripts %}
    <!-- Librerias generales del sistema jquery + bootstrap -->
    {{ javascript_include('js/jquery/jquery-1.10.2.min.js') }}
    {{ javascript_include('js/bootstrap/bootstrap.js') }}

    <!-- Librerias generales del sistema underscore + backbone -->
    {{ javascript_include('js/backbone/underscore-min.js') }}
    {{ javascript_include('js/backbone/underscore-string.js') }}
    {{ javascript_include('js/backbone/backbone-min.js') }}

    {{ javascript_include('js/moment/moment-with-locales.js') }}
    <!-- Librerias del sistema plugins jquery -->
    {{ javascript_include('js/jquery/plugins/bootstrapValidator/bootstrapValidator.js') }}
    {{ javascript_include('js/jquery/plugins/jquery.prettyLoader.js') }}
    {{ javascript_include('js/jquery/plugins/jquery.autocomplete.js') }}
    {{ javascript_include('js/jquery/plugins/icheck/icheck.min.js') }}
    {{ javascript_include('js/jquery/plugins/jquery.onoff.min.js') }}
    {{ javascript_include('js/jquery/plugins/data-tables/jquery.dataTables.min.js') }}
    {{ javascript_include('js/jquery/plugins/file/bootstrap-filestyle.min.js') }}
    {{ javascript_include('js/jquery/plugins/file/fileinput.js') }}
    {{ javascript_include('js/jquery/plugins/bootstrap-select/bootstrap-select.js') }}
    {{ javascript_include('js/jquery/plugins/bootstrap-select/i18n/defaults-es_CL.js') }}
    {{ javascript_include('js/jquery/plugins/cascading-dropdown/jquery.cascadingdropdown.js') }}
    {{ javascript_include('js/jquery/plugins/datetimepicker/bootstrap-datetimepicker.js') }}
    {{ javascript_include('js/jquery/plugins/daterangepicker/moment.js') }}
    {{ javascript_include('js/jquery/plugins/daterangepicker/daterangepicker.js') }}

    {{ javascript_include('js/jquery/plugins/jquery.datepick/jquery.plugin.js') }}
    {{ javascript_include('js/jquery/plugins/jquery.datepick/jquery.datepick.js') }}

    {{ javascript_include('js/jquery/plugins/sparkline/jquery.sparkline.min.js') }}
    {{ javascript_include('js/jquery/plugins/paginator/jquery.twbsPagination.min.js') }}

    {{ javascript_include('js/common/util/util.js') }}
    {{ javascript_include('js/common/util/GraficasUtil.js') }}
    {{ javascript_include('js/common/validations/validation.js') }}
    {{ javascript_include('js/common/views/common-view.js') }}

    <!-- Nvd3 core JS -->
    {{ javascript_include('js/nvd3/lib/d3.v3.js') }}
    {{ javascript_include('js/nvd3/nv.d3.js') }}
    {{ javascript_include('js/nvd3/src/core.js') }}
    {{ javascript_include('js/nvd3/src/tooltip.js') }}
    {{ javascript_include('js/nvd3/src/utils.js') }}
    {{ javascript_include('js/nvd3/src/interactiveLayer.js') }}
    {{ javascript_include('js/nvd3/src/models/legend.js') }}
    {{ javascript_include('js/nvd3/src/models/pie.js') }}
    {{ javascript_include('js/nvd3/src/models/pieChart.js') }}
    {{ javascript_include('js/nvd3/src/models/pieChartTotal.js') }}
    {{ javascript_include('js/nvd3/src/models/axis.js') }}
    {{ javascript_include('js/nvd3/src/models/line.js') }}
    {{ javascript_include('js/nvd3/src/models/scatter.js') }}
    {{ javascript_include('js/nvd3/src/models/lineChart.js') }}
    {{ javascript_include('js/nvd3/src/models/stackedArea.js') }}
    {{ javascript_include('js/nvd3/src/models/stackedAreaChart.js') }}
    {{ javascript_include('js/nvd3/src/models/linePlusBarChart.js') }}
    {{ javascript_include('js/nvd3/src/models/linePlusBarWithFocusChart.js') }}
    {{ javascript_include('js/nvd3/stream_layers.js') }}
    {{ javascript_include('js/nvd3/src/models/multiBar.js') }}
    {{ javascript_include('js/nvd3/src/models/multiBarChart.js') }}


{% endblock %}
<footer class="color-bg light-typo margin-top-30" id="main-footer">
    <div class="container text-center">
        <ul class="social-links">
            {#<li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
            <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
            <li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
            <li><a href="#link"><i class="fa fa-dribbble fa-fw"></i></a></li>
            <li><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>#}
        </ul>
        <p>&copy;2014 SUIOS - REGISTRO ÚNICO DE ORGANIZACIONES SOCIALES</p>
    </div>
</footer>
</body>
</html>
