<nav role="navigation" class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle"
                    type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <?php $menus = $this->menu->getMenu(); ?>
        <div id="idMenuApp" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                {% for index, menu in menus %}
                    <li class="dropdown">
                        <a title="" class="" href="{{ url(menu['Url']) }}" data-original-title="{{ menu['Nombre'] }}"
                           {% if menu['HasSubMenu'] %}{{ 'data-toggle="dropdown"' }}{% endif %}
                        >
                            <i class="{% if menu['Nombre'] %}{{ menu['Imagen'] }}{% endif %}"></i> {{ menu['Nombre'] }}
                        </a>
                        <ul class="dropdown-menu">
                        </ul>
                    </li>
                {% endfor %}

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-cogs"></i>
                        Configuración <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a title="" href="{{ url('admin/config/configuracion/general') }}"
                               data-original-title="Configuración general del sistema">
                                <i class="fa fa-cog"></i> Configuración general </a>
                        </li>
                        <li><a title="" href="{{ url('admin/config/menu/general') }}"
                               data-original-title="Gestión de menús del sistema">
                                <i class="fa fa-list-ul"></i> Gestión de menús </a>
                        </li>
                        <!--<li><a href="/admin/menu/index">Menú</a></li>
                        <li><a href="/auditoria">Auditoria</a></li>-->
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>