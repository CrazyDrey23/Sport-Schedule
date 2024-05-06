<?php
$error = ""; 


$valid_credentials = array(
    "admin" => "secret", 
    "drey" => "password123",
    "andre" => "andre123"
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = "Please fill in both fields.";
    } else {
        if (isset($valid_credentials[$username]) && $valid_credentials[$username] === $password) {
            echo '<script>alert("Log In Successful")</script>';
        } else {
            $error = "Wrong username or password.";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            font-family: Arial, sans-serif;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background: #2575fc;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #6a11cb;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        </form>
    </div>
</body>
</html>
