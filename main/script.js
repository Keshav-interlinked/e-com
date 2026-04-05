// Sample Product Data
const products = [
  {
    id: 1,
    name: "Samsung Galaxy S25 Ultra",
    price: 124999,
    image: "https://source.unsplash.com/random/300x300/?smartphone",
  },
  {
    id: 2,
    name: "Sony WH-1000XM5 Headphones",
    price: 24999,
    image: "https://source.unsplash.com/random/300x300/?headphones",
  },
  {
    id: 3,
    name: "Nike Air Max Sneakers",
    price: 8499,
    image: "https://source.unsplash.com/random/300x300/?sneakers",
  },
  {
    id: 4,
    name: "MacBook Air M3",
    price: 109999,
    image: "https://source.unsplash.com/random/300x300/?laptop",
  },
];

// Render Products
function renderProducts() {
  const productsContainer = document.getElementById("products");

  products.forEach((product) => {
    const productHTML = `
            <div class="product-card">
                <img src="${product.image}" alt="${product.name}">
                <div class="product-info">
                    <h3>${product.name}</h3>
                    <p class="price">₹${product.price.toLocaleString("en-IN")}</p>
                    <button class="add-to-cart" data-id="${product.id}">Add to Cart</button>
                </div>
            </div>
        `;
    productsContainer.innerHTML += productHTML;
  });
}

// Add to Cart Functionality
let cartCount = 0;

function addToCart(productId) {
  cartCount++;
  document.getElementById("cartCount").textContent = cartCount;
  alert("✅ Product added to cart!");
}

// Event Listeners
document.addEventListener("DOMContentLoaded", () => {
  // Render products on page load
  renderProducts();

  // Add to cart buttons
  document.addEventListener("click", (e) => {
    if (e.target.classList.contains("add-to-cart")) {
      const productId = parseInt(e.target.getAttribute("data-id"));
      addToCart(productId);
    }
  });

  // Optional: Search functionality (basic)
  const searchInput = document.getElementById("searchInput");
  searchInput.addEventListener("keyup", (e) => {
    if (e.key === "Enter") {
      alert(`Searching for: ${searchInput.value}`);
      // You can implement actual search filtering here later
    }
  });
});
