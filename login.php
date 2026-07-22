<?php
session_start();
include "connection.php";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // -------------------------
    // 1. CHECK ADMIN TABLE
    // -------------------------
    $admin = $conn->prepare("SELECT * FROM admins WHERE username = ? AND password = ?");
    $admin->bind_param("ss", $username, $password);
    $admin->execute();
    $result = $admin->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['admin'] = $username;
        header("Location: admindashboard.php");
        exit();
    }

    // -------------------------
    // 2. CHECK USER TABLE
    // -------------------------
    $user = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $user->bind_param("ss", $username, $password);
    $user->execute();
    $result = $user->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['user'] = $username;
        header("Location: userdashboard.php");
        exit();
    }

    // -------------------------
    // 3. INVALID LOGIN
    // -------------------------
    $error = "Invalid username or password!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<style>
body {
    margin:0;
    font-family: Arial;
    background: linear-gradient(120deg, #141e30, #243b55);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.box {
    width:320px;
    padding:30px;
    border-radius:15px;
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(10px);
    color:white;
}

input {
    width:100%;
    padding:10px;
    margin:10px 0;
    border:none;
    border-radius:8px;
}

button {
    width:100%;
    padding:10px;
    background:#00c6ff;
    border:none;
    border-radius:8px;
    color:white;
    cursor:pointer;
}

button:hover {
    background:#0072ff;
}

.error {
    color:#ff8080;
    text-align:center;
}
</style>

</head>
<body>

<div class="box">

    <h2 style="text-align:center;">Login</h2>

    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>

    <p style="text-align:center; margin-top:10px;">
        <a href="register.php" style="color:white;">Create Account</a>
    </p>

</div>

</body>
</html>