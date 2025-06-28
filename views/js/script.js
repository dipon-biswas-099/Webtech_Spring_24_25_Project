function valForm() {
  const fullName = document.getElementById("fullName").value.trim();
  const email = document.getElementById("email").value.trim();
  const phone = document.getElementById("phone").value.trim();
  const password = document.getElementById("password").value.trim();

  const fullNameError = document.getElementById("fullNameError");
  const emailError = document.getElementById("emailError");
  const phoneError = document.getElementById("phoneError");
  const passwordError = document.getElementById("passwordError");

  fullNameError.innerHTML = "";
  emailError.innerHTML = "";
  phoneError.innerHTML = "";
  passwordError.innerHTML = "";

  let isValid = true;
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const phonePattern = /^\d{10,15}$/;

  if (fullName === "") {
    fullNameError.innerHTML = "<span>* Full Name is required</span>";
    isValid = false;
  }

  if (!emailPattern.test(email)) {
    emailError.innerHTML = "<span>* Enter a valid email address</span>";
    isValid = false;
  }

  if (!phonePattern.test(phone)) {
    phoneError.innerHTML = "<span>* Enter a valid phone number (10-15 digits)</span>";
    isValid = false;
  }

  if (password.length < 6) {
    passwordError.innerHTML = "<span>* Password must be at least 6 characters long</span>";
    isValid = false;
  }

  return isValid;
}

const cartItems = [];

function updateCart() {
  const cartBody = document.getElementById("cart-items");
  const cartTotal = document.getElementById("cart-total");
  const cartCount = document.getElementById("cart-count");

  cartBody.innerHTML = "";
  let total = 0;

  cartItems.forEach((item, index) => {
    const row = document.createElement("tr");
    const rowTotal = item.price * item.qty;
    total += rowTotal;

    row.innerHTML = `
      <td><img src="${item.img}" alt="food"></td>
      <td>${item.name}</td>
      <td>${item.price}tk</td>
      <td>${item.qty}</td>
      <td>${rowTotal}tk</td>
      <td><a href="#" class="btn-delete" onclick="removeItem(${index})">&times;</a></td>
    `;

    cartBody.appendChild(row);
  });

  cartTotal.textContent = `${total}tk`;
  cartCount.textContent = cartItems.length;
}

function removeItem(index) {
  cartItems.splice(index, 1);
  updateCart();
}

document.addEventListener('DOMContentLoaded', function () {
  const cartIcon = document.getElementById('shopping-cart');
  const cartContent = document.getElementById('cart-content');

  if (cartIcon && cartContent) {
    cartIcon.addEventListener('click', function (e) {
      e.preventDefault();
      cartContent.style.display =
        cartContent.style.display === 'none' || cartContent.style.display === ''
          ? 'block'
          : 'none';
    });

    document.addEventListener('click', function (e) {
      if (!cartIcon.contains(e.target) && !cartContent.contains(e.target)) {
        cartContent.style.display = 'none';
      }
    });
  }

  document.getElementById('confirm-order-form').addEventListener('submit', function(e) {
  if (cartItems.length === 0) {
    e.preventDefault();
    alert("Your cart is empty!");
    return;
  }
  document.getElementById('cart_data').value = JSON.stringify(cartItems);
});


  document.querySelectorAll(".add-to-cart").forEach((btn) => {
    btn.addEventListener("click", function () {
      const parent = btn.closest(".food-menu-box");
      const name = parent.dataset.name;
      const price = parseInt(parent.dataset.price);
      const img = parent.dataset.img;
      const qty = parseInt(parent.querySelector(".qty").value);

      cartItems.push({ name, price, img, qty });
      updateCart();
    });
  });
});
