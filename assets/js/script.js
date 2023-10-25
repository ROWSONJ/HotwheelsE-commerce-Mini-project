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
 * Display products based on release date
 */

document.addEventListener('DOMContentLoaded', function () {
  var productItems = document.querySelectorAll('.product-item');
  var currentDate = new Date(); // Get the current date

  productItems.forEach(function (productItem) {
    var releaseDateStr = productItem.getAttribute('release-date');
    
    // Convert releaseDateStr to a Date object
    var releaseDate = new Date(releaseDateStr);
console.log(releaseDate);
console.log(currentDate);
    if (currentDate >= releaseDate) {
      productItem.style.display = 'block';
    } else {
      productItem.style.display = 'none';
    }
  });
});


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







