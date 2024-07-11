<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>login page</h2>
        <form action="login.php" method="get">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process POST request
            $email = $_POST['email'];
            $password = $_POST['password'];
            echo "<h2>Submitted via POST</h2>";
            echo "<p>Email: $email</p>";
            echo "<p>password: $password</p>";
        } else if ($_SERVER["REQUEST_METHOD"] == "GET") {
            // Process GET request
            $email = $_GET['email'];
            $password = $_GET['password'];
            echo "<h2>Submitted via GET</h2>";
            echo "<p>Email: $email</p>";
            echo "<p>password: $password</p>";

        } else {
            // Invalid request
            echo "Invalid request method";
        }
        ?>

    </div>
</body>
</html>
