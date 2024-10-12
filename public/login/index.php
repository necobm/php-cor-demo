<?php
include __DIR__ . '/../index.php';

use App\Core\Server;
use App\Security\CheckAdminAccess;
use App\Security\CheckCredentials;

global $userRepository;
$middleware = new CheckCredentials($userRepository);
$middleware->linkWith(new CheckAdminAccess($userRepository));

$server = new Server($middleware);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($server->login($username, $password)) {
        echo "Welcome " . $username;
    }
}



?>

<html lang="en">
    <head>
        <title>Login</title>
    </head>
    <body>
        <form method="post">
            <label for="username">Email</label>
            <input id="username" type="email" name="username" />

            <label for="password">Email</label>
            <input id="password" type="password" name="password" />

            <button>Login</button>
        </form>
    </body>
</html>


