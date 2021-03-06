<!-- Your login.volt -->
<form method="post" class="smart-form client-form" id="login-form" action="/login_check" novalidate="novalidate">
    <header>Log In</header>
    <fieldset>
        <input type="hidden" name="<?php echo $this->security->getTokenKey() ?>"
               value="<?php echo $this->security->getToken() ?>"/>
        <section>
            <label class="label">Username</label>
            <label class="input state-success"> <i class="icon-append fa fa-user"></i>
                <input type="email" value="" name="_username" class="valid">
                <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i>
                    Please enter your email / username </b></label>
        </section>

        <section>
            <label class="label">Password</label>
            <label class="input"> <i class="icon-append fa fa-lock"></i>
                <input type="password" name="_password">
                <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i>
                    Enter your password </b> </label>

            <div class="note">
                <a href="#">Forgot your password?</a>
            </div>
        </section>

        <section>
            <label class="checkbox">
                <input type="checkbox" checked="" name="remember">
                <i></i>Remember password</label>
        </section>
    </fieldset>
    <footer>
        <button class="btn btn-primary" type="submit">Sign In</button>
    </footer>
</form>