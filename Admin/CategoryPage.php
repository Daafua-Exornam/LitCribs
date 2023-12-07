<?php
require('../Settings/core.php');
require('../Controllers/product_controller.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Managet Categories</title>
    <link href="../CSS/indexPage.css" rel="stylesheet">
</head>

<body>
    <h2>MANAGE CATEGORIES</h2>

    <!-- NAVIGATION BAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Go back button -->
        <div class="click" id="click">
            <button onclick="history.back()">Go Back</button>
        </div>
        <!-- Navigation links -->
        <div class="topnav" id="navbarSupportedContent">
            <a aria-current="page" href="../Admin/BrandPage.php">Add Brand</a>
            <a aria-current="page" href="../Admin/ProductPage.php">Add Product</a>
            <a aria-current="page" href="../Settings/logout.php">Logout</a>
        </div>
    </nav>

    <br><br><br><br>

    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Category Name</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <form method="POST" action="../Actions/CategoryProcess.php" id="form">
                <tr>
                    <td>
                        <input type='hidden' name='brandId' value="<?php echo $x['brand_id'] ?>">
                    </td>
                    <!-- Input field for entering a new category name -->
                    <td>
                        <input class="form-control" type="text" placeholder="Category Name" name='cname' id='cname'>
                    </td>
                    <!-- Button to add a new category -->
                    <td class="click" id="click">
                        <button type="submit" name="addCaterBttn">Add Category</button><br>
                    </td>
                </tr>
            </form>

            <?php
            // Loop through the list of categories
            $categoryList = selectAllCategoriesCtrlr();
            foreach ($categoryList as $x) {
            ?>
                <form method="GET" action="../Actions/CategoryProcess.php" id="form">
                    <tr>
                        <td>
                            <input type='hidden' name='categId' value="<?php echo $x['cat_id'] ?>">
                        </td>
                        <!-- Display existing category names -->
                        <td>
                            <input type='text' name='categName' value="<?php echo $x['cat_name'] ?>">
                        </td>
                        <!-- Buttons for updating and deleting categories -->
                        <td class="click" id="click">
                            <button type="submit" name="updateCategoryBttn">Update</button>
                        </td>
                        <td class="click" id="click">
                            <button type="submit" name="deleteCategoryBttn">Delete</button>
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
