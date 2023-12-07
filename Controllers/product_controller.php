<?php

// Include the Product class file to use its methods
require '../Classes/product_class.php';

//--INSERT--//

// Insert a new product into the database using the Product class instance
function addProductCtrlr($prodTitle, $prodCat, $prodBrand, $prodPrice, $prodDesc, $prodImage, $prodKeyW)
{
    $productInstance = new Product();
    return $productInstance->addProduct($prodTitle, $prodCat, $prodBrand, $prodPrice, $prodDesc, $prodImage, $prodKeyW);
}

// Insert a new brand into the database using the Product class instance
function addBrandCtrlr($brandName)
{
    $brandInstance = new Product();
    return $brandInstance->addBrand($brandName);
}

// Insert a new category into the database using the Product class instance
function addCatergoryCtrlr($categName)
{
    $categorInstance = new Product();
    return $categorInstance->addCategory($categName);
}

//--SELECT--//

// Retrieve all categories from the database using the Product class instance
function selectAllCategoriesCtrlr()
{
    $categorInstance = new Product();
    return $categorInstance->selectAllCategories();
}

// Retrieve a specific category by its ID from the database using the Product class instance
function selectOneCategoryCtrlr($categId)
{
    $categorInstance = new Product();
    return $categorInstance->selectOneCategory($categId);
}

// Retrieve all products from the database using the Product class instance
function selectAllProductCtrlr()
{
    $productInstance = new Product();
    return $productInstance->selectAllProducts();
}

// Retrieve a specific product by its ID from the database using the Product class instance
function selectOneProductCtrlr($prodId)
{
    $productInstance = new Product();
    return $productInstance->selectOneProduct($prodId);
}

// Retrieve all brands from the database using the Product class instance
function selectAllBrandsCtrlr()
{
    $brandInstance = new Product();
    return $brandInstance->selectAllBrands();
}

// Retrieve a specific brand by its ID from the database using the Product class instance
function selectOneBrandCtrlr($brandId)
{
    $brandInstance = new Product();
    return $brandInstance->selectOneBrand($brandId);
}

//--UPDATE--//

// Update a category in the database using the Product class instance
function updateCategoryCtr($categId, $categName)
{
    $categorInstance = new Product();
    return $categorInstance->updateOneCategory($categId, $categName);
}

// Update a product in the database using the Product class instance
function updateProductCtrlr($prodId, $prodTitle, $prodCat, $prodBrand, $prodPrice, $prodDesc, $prodImage, $prodKeyW)
{
    $productInstance = new Product();
    return $productInstance->updateOneProduct($prodId, $prodTitle, $prodCat, $prodBrand, $prodPrice, $prodDesc, $prodImage, $prodKeyW);
}

// Update a brand in the database using the Product class instance
function updateBrandCtrlr($brandId, $brandName)
{
    $brandInstance = new Product();
    return $brandInstance->updateOneBrand($brandId, $brandName);
}

//--DELETE--//

// Delete a category from the database using the Product class instance
function deleteCategoryCtrlr($categId)
{
    $categorInstance = new Product();
    return $categorInstance->deleteOneCategory($categId);
}

// Delete a product from the database using the Product class instance
function deleteProductCtrlr($prodId)
{
    $productInstance = new Product();
    return $productInstance->deleteOneProduct($prodId);
}

// Delete a brand from the database using the Product class instance
function deleteBrandCtrlr($brandId)
{
    $productInstance = new Product();
    return $productInstance->deleteOneBrand($brandId);
}

?>
