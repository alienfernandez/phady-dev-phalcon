{% extends "../../../app/views/layouts/base.volt" %}
{# Reescribir el bloque de hojas de estilo del sistema #}
{% block stylesheets %}
    {{ super() }}
{% endblock %}

{% block breadcumb_home %}{% endblock %}
{% block breadcumb %}{% endblock %}

{# Reescribir el bloque de contenido del sistema #}
{% block content %}
    {{ super() }}
    <div class="container">
        <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 margin-top-50">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">Iniciar sesión
                        <small class="pull-right"><a href="{{ url('seguridad/notificacion_clave') }}"
                                                     class="text-white">¿Has olvidado tu contraseña?</a>
                        </small>
                    </div>

                </div>
                <div style="padding-top:30px" class="panel-body">
                    <!--<div style="display:none" class="alert alert-danger col-sm-12"></div>-->
                    <div class="col-sm-12">
                        <?php echo $this->flash->output(); ?>
                    </div>

                    <div class="text-center padding-bottom-20"><img src="img/secretaria_gestion_politica.png">
                    </div>
                    <form id="idFrmLogin" method="post" class="form-horizontal" role="form" action="/seguridad/login">
                        <input type="hidden" name="<?php echo $this->security->getTokenKey(); ?>"
                               value="<?php echo $this->security->getToken(); ?>"/>

                        <div class="input-group margin-bottom-20">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" name="NombreUsuario"
                                   placeholder="Nombre de usuario o correo electrónico"
                                   required data-bv-notempty="true" data-bv-notempty-message="Complete este campo"
                                   maxlength="30" data-bv-stringlength-max="30"
                                   data-bv-stringlength-message="Longitud máxima: 30 caracteres"
                                   pattern="^([a-zA-Z0-9\_\-\.\@]{2,30})*$"
                                   data-bv-regexp-message="Ingrese mínimo 2 caracteres alfabéticos">
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" name="Clave" placeholder="Clave"
                                   required data-bv-notempty="true" data-bv-notempty-message="Complete este campo">
                        </div>

                        <div class="col-lg-5">
                            <div class="input-group">
                                <div class="checkbox">
                                    <label>
                                        <input id="login-remember" type="checkbox" name="remember" value="1"> Recordar
                                        clave
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <!-- Button -->
                                <div class="col-sm-12 controls">
                                    <button type="submit" id="idBtnLogin1" class="btn btn-success">
                                        <i class="fa fa-sign-in"></i> Iniciar sesión
                                    </button>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid #888888; padding-top:15px; font-size:85%">
                                    ¿Todavía no tiene una cuenta?
                                    <a href="{{ url('seguridad/registro') }}">¡Regístrese Aquí!</a>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>

    </div>
{% endblock %}


{# Reescribir el bloque de javascripts del sistema #}
{% block javascripts %}
    {{ super() }}
    {{ javascript_include('js/modules/seguridad/views/autenticacion-view.js') }}
    {{ javascript_include('js/modules/seguridad/app-autenticacion.js') }}
{% endblock %}

