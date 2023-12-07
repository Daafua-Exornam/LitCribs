<?php
require('../Settings/core.php');
require('../Controllers/product_controller.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Brand Management</title>
    <link href="../CSS/indexPage.css" rel="stylesheet">
</head>

<body>
    <h2>BRAND MANAGEMENT</h2>
    <!-- Navigation bar with Go Back button and links -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="click" id="click">
            <button onclick="history.back()">Go Back</button>
        </div>
        <div class="topnav" id="navbarSupportedContent">
            <a aria-current="page" href="../Admin/CategoryPage.php">Add Category</a>
            <a aria-current="page" href="../Admin/ProductPage.php">Add Product</a>
            <a aria-current="page" href="../Settings/logout.php">Logout</a>
        </div>
    </nav>

    <br><br><br><br>

    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Brand Name</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <!-- Form for adding a new brand -->
            <form method="POST" action="../Actions/Brandprocess.php" id="form">
                <tr>
                    <td>
                        <input type='hidden' name='brandId' value="<?php echo $x['brand_id'] ?>">
                    </td>
                    <!-- Input field for entering a new brand name -->
                    <td>
                        <input class="form-control" type="text" placeholder="Brand Name" name='bname' id='bname'>
                    </td>
                    <!-- Button to add a new brand -->
                    <td class="click" id="click">
                        <button type="submit" name="addBrandBttn">Add Brand</button><br>
                    </td>
                </tr>
            </form>

            <?php
            // Loop through the list of brands
            $brandsList = selectAllBrandsCtrlr();
            foreach ($brandsList as $x) {
            ?>
                <!-- Form for updating and deleting existing brands -->
                <form method="GET" action="../Actions/Brandprocess.php" id="form">
                    <tr>
                        <td>
                            <input type='hidden' name='brandId' value="<?php echo $x['brand_id'] ?>">
                        </td>
                        <!-- Display existing brand names for editing -->
                        <td>
                            <input type='text' name='brandName' value="<?php echo $x['brand_name'] ?>">
                        </td>
                        <!-- Buttons for updating and deleting brands -->
                        <td class="click" id="click">
                            <button type="submit" name="updateBrandBttn">Update</button>
                        </td>
                        <td class="click" id="click">
                            <button type="submit" name="deleteBrandBttn">Delete</button>
                        </td>
                    </tr>
                </form>
            <?php
            }
            ?>

        </tbody>
    </table>
</body>

</html>
