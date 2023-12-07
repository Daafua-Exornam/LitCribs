<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Include Font Awesome for icons -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="adminlogin.css">
    <!-- Link to an external CSS file for styling -->
    <title>Login Page</title>
</head>

<body>
    <form action="AdminValidate.php" method="post">
        <!-- Login form starts here -->
        <div class="login-box">
            <!-- Login box container -->
            <h1>Login</h1>
            <!-- Login heading -->
 
            <div class="textbox">
                <!-- Username input box with an icon -->
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Username" name="username" value="">
                <!-- Username input field -->
            </div>
 
            <div class="textbox">
                <!-- Password input box with an icon -->
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password" name="password" value="">
                <!-- Password input field -->
            </div>
 
            <input class="button" type="submit" name="login" value="Sign In">
            <!-- Sign-in button -->
        </div>
        <!-- End of login box container -->
    </form>
    <!-- End of login form -->
</body>

</html>


<!-- Admin Username: Daafua
Password: 1234@abcdA -->