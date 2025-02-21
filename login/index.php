<?php
// starting the session
session_start();

// including the database connection file
include '../include/db.php';

// login feature
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $query = "SELECT * FROM admin WHERE email = '$email'";
    $run_query = mysqli_query($conn, $query);
    if (mysqli_num_rows($run_query) > 0) {
        $row = mysqli_fetch_assoc($run_query);
        if (password_verify($password, $row['password'])) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['type'] = $row['type'];
            if ($_SESSION['type'] == 1) {
                header('Location: ../admin');
            } else {
                echo '
                <script> 
                    alert("User dashboard coming soon");
                    window.location.href = "./"; 
                </script>';
            }
            exit();
        } else {
            echo "<script>alert('Invalid Password');</script>";
        }
    } else {
        echo "<script>alert('User not found');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Estate</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        /* Login Page Styles */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f4f4f4;
        }

        .login-form {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        .login-form h2 {
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

        .register-link {
            margin-top: 10px;
            font-size: 14px;
        }

        .register-link a {
            color: #00B98E;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 500px) {
            .login-form {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <form class="login-form" action="" method="post">
            <h2>Login</h2>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit">Login</button>
            <p class="register-link">Don't have an account? <a href="../register/">Register</a></p>
        </form>
    </div>
</body>

</html>