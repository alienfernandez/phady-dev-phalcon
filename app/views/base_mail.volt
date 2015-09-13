{% set btn = "display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: normal;line-height: 1.428571429;text-align: center;white-space: nowrap;vertical-align: middle;cursor: pointer;background-image: none;border: 1px solid transparent;border-radius: 4px;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;-o-user-select: none;user-select: none;text-decoration: none;" %}
{% set btn_info = "color: #ffffff;background-color: #5bc0de;border-color: #46b8da;" %}
{% set btn_success = "color: #ffffff;background-color: #5cb85c;border-color: #4cae4c;" %}
{% set btn_danger = "color: #ffffff;background-color: #d9534f;border-color: #d43f3a;" %}
{% set btn_primary = "color: #ffffff;background-color: #428bca;border-color: #357ebd;" %}
{% set btn_warning = "color: #ffffff;background-color: #f0ad4e;border-color: #eea236;" %}

<meta charset="UTF-8"/>
<div style="text-align: center;width: 740px">
    <div style="width: 740px;border-radius: 5px;font-size: 1.3em;padding-top: 15px;padding-left: 15px;padding-bottom: 15px;color: #000;">
        <img src="{{ request_protocol~'://'~http_host~'/img/secretaria_gestion_politica2.png' }}"><br>
        <a href="{{ request_protocol~'://'~http_host }}" title="Inicio"
           style="outline: 0;text-decoration: none;color: #000;">
            <strong>SISTEMA UNIFICADO DE INFORMACIÓN DE ORGANIZACIONES SOCIALES</strong></a><br><br/>
        <img width="740" height="19" src="{{ request_protocol~'://'~http_host~'/img/lineshadow.png' }}"><br/>
    </div>

    <br/><br/>

    <!-- Bloque de contenido -->
    <div style="position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;">
        {% block content %}{% endblock %}
    </div>

    <br/><br/><br/>

    <footer style="width: 740px;border-radius: 5px;font-size: 1.0em;padding-top: 15px;padding-left: 15px;padding-bottom: 15px;color: #000;">
        <img width="740" height="19" src="{{ request_protocol~'://'~http_host~'/img/lineshadow.png' }}"><br/>
        <br/>
        ¿Preguntas?
        Por favor contáctenos usando nuestro correo: <a href="mailto:sociedadcivil@politica.gob.ec">sociedadcivil@politica.gob.ec</a>.
        <br>

        Gracias,
        <p>&copy;2014 SUIOS - REGISTRO ÚNICO DE ORGANIZACIONES SOCIALES</p>
    </footer>
</div>
