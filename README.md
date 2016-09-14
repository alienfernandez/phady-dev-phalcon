## Phady Dev Phalcon

This repository provide an example how you can use the [Phady framework](https://github.com/alienfernandez/phady) in your projects

## Run the Phalcon Application with Phady Framework:
```php
// This is the file file/index.php

use Phady\Core\KernelMvc;
try {
    $modules = [[
        "common" => ["className" => "App\\Common\\Module", "path" => __DIR__ . "/../src/common/Module.php"]
       ]
    ];
    $environment = "dev"; //dev or prod
    $mode = "mvc"; //mvc or cli
    $appCore = new KernelMvc($environment, false, $mode, $modules);
    //Handle the request
    echo $appCore->getApplication()->handle()->getContent();
} catch (Phalcon\Exception $e) {
    echo $e->getMessage();
} catch (PDOException $e) {
    echo $e->getMessage();
}

```


## Login with Phady Framework:
In the controller that you are going to create the login functionality you need to create the following actions

```php
// Your LoginController.php

namespace App\Common\Controllers;
class LoginController extends ControllerBase
{
    public function loginAction(){}
    public function login_checkAction(){}
    public function logoutAction(){}
    public function access_deniedAction(){}
}

```

Here an example of your login form 
```html
<!-- If you are using volt (login.volt) or (login.phtml) -->

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
```
### License
