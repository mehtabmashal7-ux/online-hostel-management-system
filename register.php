<?php
include "connection.php";

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // SIMPLE PASSWORD (NO HASH)

    $check = $conn->prepare("SELECT id FROM users WHERE username=?");
    $check->bind_param("s", $username);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $error = "Username already exists!";
    } else {

        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);
        $stmt->execute();

        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<style>
body {
    margin:0;
    font-family: Arial;
    background: linear-gradient(120deg,#1e3c72,#2a5298);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.box {
    background: rgba(255,255,255,0.12);
    padding:30px;
    border-radius:15px;
    backdrop-filter: blur(10px);
    width:320px;
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

button:hover { background:#0072ff; }

.error { color: #ffb3b3; }
</style>
</head>
<body>

<div class="box">
    <h2>Register</h2>

    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register">Create Account</button>
    </form>

    <p style="text-align:center;">
        <a href="login.php" style="color:#fff;">Already have account? Login</a>
    </p>
</div>

</body>
</html>