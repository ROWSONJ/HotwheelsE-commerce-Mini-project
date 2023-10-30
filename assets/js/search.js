document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("search");
    const searchResults = document.getElementById("search-results");

    searchInput.addEventListener("input", function () {
        const query = searchInput.value;

        if (query === "") {
            searchResults.innerHTML = "";
            return;
        }

        // Create an XMLHttpRequest object
        const xhr = new XMLHttpRequest();

        // Configure the request
        xhr.open("GET", "search.php?q=" + query, true);

        // Define the request headers
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        // Handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                searchResults.innerHTML = xhr.responseText;
            }
        };

        // Send the request
        xhr.send();
    });
});
