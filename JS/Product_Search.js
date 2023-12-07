$(document).ready(function() {
    // This code block runs when the document is fully loaded and ready.

    // Define the search form and search input field
    var searchForm = $("#search-form");
    var searchInput = $("#search-input");
    var searchResultsContainer = $("#search-results");

    // Handle form submission
    searchForm.submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Get the search query from the input field
        var searchQuery = searchInput.val();

        // Perform an AJAX request to fetch search results
        $.ajax({
            type: "GET", // Use a GET request to retrieve data
            url: "../Controllers/product_search.php", // The URL to send the request
            data: { search: searchQuery }, // Send the search query as a parameter
            dataType: "json", // Expect JSON response

            success: function(response) {
                // This function is called when the AJAX request is successful.

                // Clear any previous search results
                searchResultsContainer.empty();

                if (response.length > 0) {
                    // If there are matching products, display them.

                    // Loop through the response array (list of products)
                    response.forEach(function(product) {
                        // Create HTML for displaying each product
                        var productCard = `
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <img src="../Images/Products/${product.product_image}" class="card-img-top" alt="${product.product_title}">
                                    <div class="card-body">
                                        <h5 class="card-title">${product.product_title}</h5>
                                        <p class="card-text">GHC: ${product.product_price}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="../View/single_product.php?id=${product.product_id}" class="btn btn-sm btn-outline-secondary">View More</a>
                                                <a href="../Controllers/cart_controller.php?id=${product.product_id}" class="btn btn-sm btn-outline-primary">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

                        // Append the productCard HTML to the search results container
                        searchResultsContainer.append(productCard);
                    });
                } else {
                    // If there are no matching products, display a message.
                    searchResultsContainer.html('<div class="col-md-12 text-center"><p>No products found for your search query.</p></div>');
                }
            },

            error: function(xhr, status, error) {
                // This function is called when there is an error in the AJAX request.

                // Handle the error, e.g., display an error message.
                var errorMessage = `Error: ${xhr.status} - ${xhr.statusText}`;
                searchResultsContainer.html(`<div class="col-md-12 text-center"><p>${errorMessage}</p></div>`);
            }
        });
    });
});
