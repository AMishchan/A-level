<?php

session_start();
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
?>
<center>
    <div>
        <form action="index.php" method="post">
            name:<input type="text" name="name">
            </br>
            </br>
            pass:<input type="text" name="pass">
            </br>
            <input type="submit" value="submit" name="submit"><br>
            <input type="submit" value="kill" name="logout"><br>
            <input type="submit" value="info" name="info"><br>
        </form>
    </div>
</center>
<?php

if (isset($_POST['info'])) {
    $connection = new PDO('mysql:host=localhost;dbname=forma;charset=utf8', 'zayander', '');
    echo '<table border="1">';
    foreach ($connection->query('SELECT * FROM fo') as $row) {
        echo'<tr>';
        echo '<td>' . $row['user_name'] . '</td>  <td>' . $row['time'] . '</td>';
        echo'</tr>';
    }
}
echo '</table>';
