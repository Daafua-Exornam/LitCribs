<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Set the viewport for responsive web design. -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Link to an external CSS file for styling -->
    <link rel="stylesheet" href="./CSS/SignUp.css">

    <!-- Include a CSS stylesheet from a content delivery network (CDN) to apply Bootstrap styles...Done -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Include the jQuery library from a CDN. -->
</head>

<body>
    <style> h1{text-align: center; } </style>
    <title>Welcome Back!</title>
    <!-- Set the title of the web page. -->
    <h1>Login To Access Your Account</h1>
    <!-- Display a header with a login instruction. -->

    <div class="container">
        <!-- Create a container to center the content. -->

        <form method="POST" action="loginprocess.php">
            <!-- Create a form element that submits data to 'loginprocess.php' using the POST method. -->
            <div class="form-group">
                <label for="inputEmail">Enter Email</label>
                <!-- Label for the email input field. -->
                <input type="text" id="loginEmail" name="loginEmail" class="form-control" placeholder="Registration Email" required>
                <!-- Text input field for the email with a placeholder and it's required. -->
            </div>

            <div class="form-group">
                <label for="inputPassword">Enter Password</label>
                <!-- Label for the password input field. -->
                <input type="password" id="loginPass" name="loginPass" minlength="4" class="form-control" required>
                <!-- Password input field with a minimum length requirement and it's required. -->
            </div>

            <button type="submit" name="loginButton">Login</button>
            <!-- Submit button to initiate the login process. -->
            <div class="container">
        <!-- Tab buttons for Register, Login, and Admin -->
        <div class="tab">
            <!-- Button to navigate to the Registration page -->
            <button class="tablinks" data-target="Register"><a href='register.php'>Don't have an account? Register</a></button>
            <!-- Button to navigate to the Admin page -->
            <button class="tablinks" data-target="Admin"><a href='../Admin/adminlogin.php'>Are you an Admin</a></button>
        </div>
    </div>

        </form>
    </div>
</body>

</html>
