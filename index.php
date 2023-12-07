<!DOCTYPE html>
<html>

<head>
    <!-- Meta tag for responsive design -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link to an external CSS file for styling -->
    <link rel="stylesheet" href="./CSS/index_test.css">
    <!-- Link to jQuery library for handling tab clicks -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <style> 
a{
  text-decoration: none;
  color: #e6f7ff; 

}</style>
    <!-- Page Title -->
    <h2>Shop With Us</h2>
    
<!-- May not be needed for this screen -->
    <!-- Menu Section -->
    <!-- <div class="menu">
        <!-- Menu items -->
        <!-- <a href="../Login/register.php">Register</a>
        <a href="../View/all_products.php">All Products</a>
        <a href="View/cart.php">Cart</a>
    </div> --> 

    <!-- Container for tab buttons -->
    <div class="container">
        <!-- Tab buttons for Register, Login, and Admin -->
        <div class="tab">
            <!-- Button to navigate to the Registration page -->
            <button class="tablinks" data-target="Register"><a href='./Login/register.php'>Register</a></button>
            <!-- Button to navigate to the Login page -->
            <button class="tablinks" data-target="Login"><a href='./Login/login.php'>Login</a></button>
            <!-- Button to navigate to the Admin page -->
            <button class="tablinks" data-target="Admin"><a href='./Admin/adminlogin.php'>Are you an Admin</a></button>
        </div>
    </div>

    <!-- Welcome Tab -->
    <div id="Welcome" class="tabcontent">
        <!-- Welcome message for users landing on the page -->
        <p>Welcome to LitCribs</p>
        <!-- Instructions to find Registration and Login Forms -->
        <p>Explore the menu to find either the Registration Form or the Login Form.</p>
    </div>

    <!-- Register Tab -->
    <div id="Register" class="tabcontent" style="display: none; justify-content:center; text-align:center; align-items:center;;">
        <!-- Container for the iFrame displaying the Registration Form -->
        <div class="i-frame">
            <!-- iFrame settings for Registration Form -->
            <iframe width="560" height="315" src="./Login/register.php" title="Registration Form"
                frameborder="10" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
        </div>
    </div>

    <!-- Login Tab -->
    <div id="Login" class="tabcontent" style="display: none; justify-content:center; text-align:center; align-items:center;;">
        <!-- Container for the iFrame displaying the Login Form -->
        <div class="i-frame">
            <!-- iFrame settings for Login Form -->
            <iframe width="560" height="315" src="./Login/login.php" title="Login Form"
                frameborder="10" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
        </div>
    </div>

    <!-- Admin Tab -->
    <div id="Admin" class="tabcontent" style="display: none; justify-content:center; text-align:center; align-items:center;">
        <!-- Content for the Admin tab -->
        <p>If you are an admin, you can access the admin features here.</p>
        <a aria-current="page" href="./Admin/adminlogin.php">Admin Login</a>
    </div>

    <!-- JavaScript script for form display -->
    <script type="text/javascript" src="./JS/FormDisplay.js"></script>
    <script type="text/javascript">
        // Function to handle tab button clicks
        $('.tablinks').on('click', function () {
            $('.tabcontent').hide();
            $('#' + $(this).data('target')).show();
        });
    </script>
</body>

</html>
