<form method="post" class="smart-form client-form" id="login-form" action="/login_check" novalidate="novalidate">
    <header>Iniciar Sesion</header>
    <fieldset>
        <input type="hidden" value="394raL2QoAFl0AZRsQ3oCxTWKXFwpaU0M-LWTChBXQY" name="_csrf_token">
         <input type="hidden" name="<?php echo $this->security->getTokenKey() ?>"
                value="<?php echo $this->security->getToken() ?>"/>
        <section>
            <label class="label">Usuario</label>
            <label class="input state-success"> <i class="icon-append fa fa-user"></i>
                <input type="email" value="" name="_username" class="valid">
                <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i>
                    Por favor introduzca su correo / nombre de usuario</b></label>
        </section>

        <section>
            <label class="label">Clave</label>
            <label class="input"> <i class="icon-append fa fa-lock"></i>
                <input type="password" name="_password">
                <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i>
                    Ingrese su clave</b> </label>

            <div class="note">
                <a href="#">Olvidaste tu clave?</a>
            </div>
        </section>

        <section>
            <label class="checkbox">
                <input type="checkbox" checked="" name="remember">
                <i></i>Recordar clave</label>
        </section>
    </fieldset>
    <footer>
        <button class="btn btn-primary" type="submit">
            Iniciar sesion
        </button>
    </footer>
</form>