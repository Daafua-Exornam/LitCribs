<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Set the viewport for responsive web design. -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Link to an external CSS file for styling -->
    <link rel="stylesheet" href="./CSS/SignUp.css">
    <!-- Include a CSS stylesheet from a content delivery network (CDN) to apply Bootstrap styles....Done -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Include the jQuery library from a CDN. -->

    <title>Join Us</title>
    <!-- Set the title of the web page. -->
</head>
<body>
    <style> h1{text-align: center; } </style>
    <h1>Register Here</h1>
    <!-- Display a header with the title "Register Here". -->

    <div class="container">
        <!-- Create a container to center the content. -->

        <form method="POST" action="../Login/registerprocess.php">
            <!-- Create a form element that submits data to 'registerprocess.php' using the POST method. -->
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <!-- Label for the full name input field. -->
                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Full Name" pattern="[A-Za-z\s]+" required>
                <!-- Text input field for the full name with a pattern for alphabetical characters and spaces, and it's required. -->
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <!-- Label for the email input field. -->
                <input type="email" id="email" name="email" class="form-control" placeholder="example@gmail.com" required>
                <!-- Email input field with a placeholder and it's required. -->
            </div>
    
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="password">Create Password</label>
                    <!-- Label for the password input field. -->
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,}" title="must have a minimum of eight characters, a number, and both uppercase and lowercase letters." required>
                    <!-- Password input field with a pattern and a title for password strength requirements, and it's required. -->
                    <input type="password" id="confirm" name="confirm" class="form-control" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,}" title="must have a minimum of eight characters, a number, and both uppercase and lowercase letters." required>
                    <!-- Confirm password input field with similar pattern and title. -->
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="country">Country</label>
                    <!-- Label for the country input field. -->
                    <input type="text" id="country" name="country" class="form-control" pattern="[A-Za-z\s]+" required>
                    <!-- Text input field for the country with a pattern for alphabetical characters and spaces, and it's required. -->
                </div>

                <div class="form-group col-md-4">
                    <label for "city">City</label>
                    <!-- Label for the city input field. -->
                    <input type="text" id="city" name="city" class="form-control" pattern="[A-Za-z\s]+" required>
                    <!-- Text input field for the city with a pattern for alphabetical characters and spaces, and it's required. -->
                </div>

                <div class="form-group col-md-2">
                    <label for="contact">Contact</label>
                    <!-- Label for the contact input field. -->
                    <input type="tel" id="contact" name="contact" class="form-control" required>
                    <!-- Telephone input field for contact information and it's required. -->
                </div>
            </div>

            <div class="form-group">
                <label for="image">Add your Photo</label>
                <!-- Label for the file input field to upload an image. -->
                <input type="file" id="image" name="image" class="form-control" required>
                <!-- File input field for uploading an image, and it's required. -->
            </div>

            <input type="hidden" id="role" name="role" value=1>
            <!-- Hidden input field to set the user's role (presumably with a value of 1). -->

            <button type="submit" name="addCustomer">Register</button>
            <!-- Submit button to register the customer. -->
                    <div class="container">
            <!-- Tab buttons for Register, Login, and Admin -->
            <div class="tab">
                <!-- Button to navigate to the Login page -->
                <button class="tablinks" data-target="Login"><a href='login.php'>Already have an account? Login</a></button>
                <!-- Button to navigate to the Admin page -->
                <button class="tablinks" data-target="Admin"><a href='../Admin/adminlogin.php'>Are you an Admin</a></button>
            </div>
        </form>

    </div>

    </div>

    <script type="text/javascript" src="password_confirmation.js"></script>
    <!-- Include an external JavaScript file for password confirmation functionality. -->
</body>
