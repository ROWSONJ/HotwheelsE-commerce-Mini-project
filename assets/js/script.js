/**
 * *  SEARCH PRODUCTS
*/
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

/*
  Border Search Display
*/
// Get references to the search input and search results container
// Get references to the search input and search results container
const searchInput = document.getElementById('search');
const searchResults = document.getElementById('search-results');
let timer;

// Add an event listener to show results when the search input is focused
searchInput.addEventListener('focus', () => {
  searchResults.style.display = 'block';
  clearTimeout(timer); // Clear any previous timers
});

// Add an event listener to hide results when the mouse leaves search results
searchResults.addEventListener('mouseleave', () => {
  timer = setTimeout(() => {
    searchResults.style.display = 'none';
  }, 1000); // 1000 milliseconds (1 second)
});

// Add an event listener to hide results when the search input loses focus
searchInput.addEventListener('blur', () => {
  timer = setTimeout(() => {
    searchResults.style.display = 'none';
  }, 1000); // 1000 milliseconds (1 second)
});





/**
 * *  Filter products in index.php
*/
$(document).ready(function () {
  // Add a click event listener to the filter buttons
  $('.filter-btn').click(function () {
      // Get the selected carbrand_name from the data attribute
      var carbrandName = $(this).data('carbrand');
      console.log('carbrandName:', carbrandName);

      if (carbrandName === 'All') {
          // If "All" is selected, clear the filter and display the default product list
          displayDefaultProducts();
      } else {
          // Send an AJAX request to retrieve filtered products
          sendFilterRequest(carbrandName);
      }
  });

  function displayDefaultProducts() {
      // Use AJAX to fetch and display the default product list
      $.ajax({
          type: 'POST',
          url: 'default_products.php', // Create a new PHP file to handle the default product list
          success: function (data) {
              // Update the product list with the default products
              $('#product-list').html(data);
          }
      });
  }

  function sendFilterRequest(carbrandName) {
      // Send an AJAX request to retrieve filtered products
      $.ajax({
          type: 'POST',
          url: 'filter_products.php', // Create a new PHP file to handle filtered products
          data: { carbrand: carbrandName },
          success: function (data) {
              // Update the product list with the filtered products
              $('#product-list').html(data);
          }
      });
  }
});

/**
 * Display cart items
 */

document.addEventListener("DOMContentLoaded", function () {
  const cartIcon = document.getElementById("cart-icon");
  const cart = document.querySelector(".cart");
  const pageOverlay = document.querySelector(".page__overlay");

  // Function to open the cart and show the page overlay
  function openCart() {
    cart.classList.add("cart--open");
    pageOverlay.classList.add("page__overlay--open");
  }

  // Function to close the cart and hide the page overlay
  function closeCart() {
    cart.classList.remove("cart--open");
    pageOverlay.classList.remove("page__overlay--open");
  }

  // Toggle cart visibility when the cart icon is clicked
  cartIcon.addEventListener("click", function () {
    if (cart.classList.contains("cart--open")) {
      closeCart();
    } else {
      openCart();
    }
  });

  // Close the cart and page overlay when the page overlay is clicked
  pageOverlay.addEventListener("click", function () {
    closeCart();
  });
});


/**
 * Display products based on release date
 */

document.addEventListener('DOMContentLoaded', function () {
  var productItems = document.querySelectorAll('.product-item');
  var currentDate = new Date(); // Get the current date

  productItems.forEach(function (productItem) {
    var releaseDateStr = productItem.getAttribute('release-date');

    // Convert releaseDateStr to a Date object
    var releaseDate = new Date(releaseDateStr);

    console.log("This is releaseDate: ", releaseDate);

    // Subtract 30 minutes from the releaseDate
    releaseDate.setMinutes(releaseDate.getMinutes() + 30);

    console.log("This is releaseDate + 30: ", releaseDate);
    console.log("This is currentDate: ", currentDate);
    if (currentDate >= releaseDate) {
      productItem.style.display = 'block';
    } else {
      productItem.style.display = 'none';
    }
  });
});

/**
 * CHECK USER LOGIN BEFORE ADDING TO CART
 *  */

document.addEventListener("DOMContentLoaded", function() {
  const addToCartButton = document.getElementById("add-to-cart");
  const sellProductButton = document.getElementById("sell-product");

  if (addToCartButton && sellProductButton) {
    console.log("Both buttons found");
  } else {
    console.log("At least one button not found");
  }

  function handleLoginForAction(button, actionMessage) {
    if (!userIsLoggedIn) {
      const confirmation = window.confirm(`Please login before ${actionMessage}. Do you want to go to the login page?`);
      if (confirmation) {
        window.location.href = "http://localhost/mini-project-yrs3/mini-project/views/login.php";
      }
    }
  }

  if (addToCartButton) {
    addToCartButton.addEventListener("click", function() {
      handleLoginForAction(addToCartButton, "adding to cart");
    });
  }

  if (sellProductButton) {
    sellProductButton.addEventListener("click", function() {
      handleLoginForAction(sellProductButton, "selling this product");
    });
  }
});


// Other JavaScript functions and logic here



/**
 * COPYRIGHT
 *  */
document.getElementById("currentRightYear").textContent = new Date().getFullYear();
console.log(textContent);

'use strict';



/**
 * navbar toggle
 */

const overlay = document.querySelector("[data-overlay]");
const navOpenBtn = document.querySelector("[data-nav-open-btn]");
const navbar = document.querySelector("[data-navbar]");
const navCloseBtn = document.querySelector("[data-nav-close-btn]");

const navElems = [overlay, navOpenBtn, navCloseBtn];

for (let i = 0; i < navElems.length; i++) {
  navElems[i].addEventListener("click", function () {
    navbar.classList.toggle("active");
    overlay.classList.toggle("active");
  });
}



/**
 * header & go top btn active on page scroll
 */

const header = document.querySelector("[data-header]");
const goTopBtn = document.querySelector("[data-go-top]");

window.addEventListener("scroll", function () {
  if (window.scrollY >= 80) {
    header.classList.add("active");
    goTopBtn.classList.add("active");
  } else {
    header.classList.remove("active");
    goTopBtn.classList.remove("active");
  }
});







