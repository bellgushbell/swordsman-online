<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .wrapper {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background: #007bff;
            color: #fff;
            padding: 10px;
            border-radius: 5px 5px 0 0;
        }
        .card-body {
            padding: 20px;
        }
        .card-body div {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="button"] {
            background: #6c757d;
            color: #fff;
        }
        button[type="submit"] {
            background: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
<?php include('header.php'); ?>

<div class="wrapper">
    <!-- Navbar -->
    <?php include('navbar.php'); ?>
    <div class="main-content">
        <div class="card-header">
            <h3>Add New User</h3>
        </div>
        <div class="card-body">
            <form action="../../database/save_add_user.php" method="POST">
                <div>
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
            
                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div>
                    <label for="username">First name:</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div>
                    <label for="username">Last name:</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
                <div class="button-container">
                    <button type="button" onclick="window.location.href='content_management.php'">Cancel</button>
                    <button type="submit">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
