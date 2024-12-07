<?php
include "connect.php";

$hoten = $password = $confirm = $email = $dob = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!empty($_POST['name'])) {
        $hoten = htmlspecialchars($_POST['name']);
    }
    if (!empty($_POST['pwd'])) {
        $password = htmlspecialchars($_POST['pwd']);
    }
    if (!empty($_POST['confirm'])) {
        $confirm = htmlspecialchars($_POST['confirm']);
    }
    if (!empty($_POST['email'])) {
        $email = htmlspecialchars($_POST['email']);
    }
    if (!empty($_POST['dob'])) {
        $dob = htmlspecialchars($_POST['dob']);
    }

    if ($password === $confirm) {
        $sql = "INSERT INTO User (Name, password, Email, DoB) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssss", $hoten, $password, $email, $dob);

            if (mysqli_stmt_execute($stmt)) {
                header('Location: login.php');
                exit();
            } else {
                echo "Error: Could not execute query: " . mysqli_error($conn);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Error: Could not prepare query: " . mysqli_error($conn);
        }
    } else {
        echo "Passwords do not match.";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <style>
    body {
        /* background-color: #f8c6d8; */
        background-image: linear-gradient(45deg, #f8c6d8, #ff80ab, #ff4081, #f50057);
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        background-color: #d0e7f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 80%;
        height: 80%;
    }

    .container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #000;
    }

    .container label {
        display: block;
        margin-bottom: 5px;
        color: #000;
    }

    .container input[type="text"],
    .container input[type="password"],
    .container input[type="email"],
    .container input[type="date"] {
        width: 95%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .container input[type="checkbox"] {
        margin-right: 10px;
    }

    .container .checkbox-label {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .container button {
        width: 100%;
        padding: 10px;
        background-color: #8ab6d6;
        border: none;
        border-radius: 5px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
    }

    .container button:hover {
        background-color: #6a9ecb;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2 style="text-align: center;">Sign Up</h2><br>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
            </div>
            <div class="form-group">
                <label for="dob">Dob:</label>
                <input type="date" class="form-control" id="dob" placeholder="Enter dob" name="dob" required>
            </div>
            <div class="form-group">
                <label for="confirm">Confirm password:</label>
                <input type="password" class="form-control" id="confirm" placeholder="Enter password" name="confirm"
                    required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default form-control">Register</button>
        </form>
    </div>
</body>

</html>