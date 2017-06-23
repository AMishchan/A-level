<?php

session_start();
require_once '/Openserver/vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('templ');
$twig = new Twig_Environment($loader, array(
    'auto_reload' => true,
        //   'cache'=>'cache'
        ));
$title = "page name";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $pass = $_POST['pass'];

    $credentials = array('login' => 'vasya',
        'password' => 1);

    if (!empty($name) && !empty($pass)) {
        if ($name == ($credentials['login']) && $pass == ($credentials['password'])) {
            $_SESSION['sucsess_log'] = true;
            $connection = new PDO('mysql:host=localhost;dbname=forma;charset=utf8', 'zayander', '');
            $connection->exec("INSERT INTO fo  set user_name = '$name'");
            echo 'Hello ' . $name . '!';
        } else {
            echo 'name = ' . ($credentials['login']);
        }
    } else {
        echo 'type name and pass';
    }
    if (isset($_POST['logout'])) {
        unset($_POST);
    }
}

if (isset($_POST['info'])) {
    $connection = new PDO('mysql:host=localhost;dbname=forma;charset=utf8', 'zayander', '');
    $res = $connection->query('SELECT * FROM fo');
    while ($row = $res->fetchObject()) {
        $data[] = $row;
    }
}
echo $twig->render('template.html', array(
    'title' => $title,
    'data' => $data
));
