<?php
include '../include/db.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<script> alert('User already exists!'); </script>";
    } else {
        $insert_query = "INSERT INTO admin (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
        $run_query = mysqli_query($conn, $insert_query);
        if ($run_query) {
            echo "
            <script> 
                alert('Registration Successful!'); 
                window.location.href = '../login';
            </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Estate</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        /* Register Page Styles */
        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f4f4f4;
        }

        .register-form {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        .register-form h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .input-group {
            display: flex;
            align-items: center;
            background: #f4f4f4;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
        }

        .input-group i {
            color: #00B98E;
            margin-right: 10px;
        }

        .input-group input {
            border: none;
            outline: none;
            background: none;
            width: 100%;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #00B98E;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: 0.3s;
        }

        button:hover {
            background: #008f6b;
        }

        .login-link {
            margin-top: 10px;
            font-size: 14px;
        }

        .login-link a {
            color: #00B98E;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 500px) {
            .register-form {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="register-container">
        <form class="register-form" action="" method="post">
            <h2>Register</h2>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="name" placeholder="Full Name" required>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Confirm Password" required>
            </div>
            <button type="submit">Register</button>
            <p class="login-link">Already have an account? <a href="../login/">Login</a></p>
        </form>
    </div>
</body>

</html>