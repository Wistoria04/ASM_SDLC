<?php
include "connect.php";

$username = $password = "";
$username_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username)) {
        $username_err = "Please enter your username.";
    }
    if (empty($password)) {
        $password_err = "Please enter your password.";
    }

    if (empty($username_err) && empty($password_err)) {
        $sql = "SELECT UserID, Name, password FROM User WHERE Name = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $username, $stored_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        
                        if ($password === $stored_password) {
                            session_start();
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            header("location: main.php");
                            exit();
                        } else {
                            $password_err = "Invalid username or password.";
                        }
                    }
                } else {
                    $username_err = "Invalid username or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    /* Thiết lập màu nền với gradient */
    /* body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-image: linear-gradient(135deg, #f8c6d8, #ff80ab, #ff4081, #f50057);
        background-size: 200% 200%;
        animation: gradientAnimation 10s ease infinite;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Hiệu ứng chuyển động của gradient */
    @keyframes gradientAnimation {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    /* Định dạng container */
    .container {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        max-width: 400px;
        width: 100%;
    }

    /* Tiêu đề */
    h2.text-center {
        font-size: 24px;
        color: #f50057;
        margin-bottom: 20px;
    }

    /* Form label */
    label {
        font-weight: bold;
        color: #333;
    }

    /* Input fields */
    input.form-control {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        transition: border-color 0.3s ease;
    }

    /* Hover và focus cho input */
    input.form-control:focus {
        border-color: #f50057;
        box-shadow: 0 0 5px rgba(245, 0, 87, 0.5);
        outline: none;
    }

    /* Checkbox */
    .form-check-label {
        color: #555;
    }

    /* Button */
    button.btn-primary {
        background-color: #f50057;
        border: none;
        padding: 10px;
        border-radius: 5px;
        font-size: 16px;
        color: #fff;
        transition: background-color 0.3s ease;
    }

    button.btn-primary:hover {
        background-color: #d4004c;
        cursor: pointer;
    }

    /* Liên kết đăng ký */
    p.text-center a {
        color: #f50057;
        text-decoration: none;
        font-weight: bold;
    }

    p.text-center a:hover {
        text-decoration: underline;
    }

    /* Thông báo lỗi */
    .text-danger {
        font-size: 14px;
        color: #d9534f;
    }
    </style> */
</head>

<body>
    <div class="container mt-3">
        <h2 class="text-center">Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="mb-3 mt-3">
                <label for="username">User Name:</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your user name"
                    value="<?php echo htmlspecialchars($username); ?>">
                <span class="text-danger"><?php echo $username_err; ?></span>
            </div>
            <div class="mb-3">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                <span class="text-danger"><?php echo $password_err; ?></span>
            </div>
            <div class="form-check mb-3">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <p class="text-center">Don't have an account? <a href="Signup.php">Sign Up</a></p>
            <button type="submit" class="btn btn-primary form-control">Submit</button>
        </form>
    </div>
    <!-- <div class="login-container">
        <h2>Login</h2>
        <form>
            <label for="username">User Name</label>
            value="<?php echo htmlspecialchars($username); ?>">
            <input type="text" id="username" name="username" placeholder="Enter your user name : "
                value="<?php echo htmlspecialchars($username); ?>">
            <span class="text-danger"><?php echo $username_err; ?></span>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password :"
                value="<?php echo htmlspecialchars($password); ?>">
            <span class="text-danger"><?php echo $password_err; ?></span>
            <div class="remember-me">
                <input type="checkbox" id="remember-me" name="remember-me">
                <label for="remember-me">Remember me</label>
            </div>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
        <div class="register-link">
            Don’t have an account ? <a href="#">Register</a>
        </div>
    </div> -->

</body>

</html>