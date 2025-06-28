  <?php
    $controller = 'UserController';
    $method = 'login';

    require_once "controllers/$controller.php";

    $obj = new $controller();
    $obj->$method();
    ?>