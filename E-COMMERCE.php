<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Mini Boutique Connectée</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0; padding: 0;
    background: #f5f5f5;
  }
  header {
    background: #25d366;
    color: white;
    padding: 15px;
    text-align: center;
  }
  h1 {
    margin: 0;
    font-weight: normal;
  }
  .container {
    max-width: 960px;
    margin: 20px auto;
    padding: 0 10px;
  }
  .products {
    display: grid;
    grid-template-columns: repeat(auto-fill,minmax(220px,1fr));
    gap: 15px;
  }
  .product {
    background: white;
    border-radius: 8px;
    padding: 15px;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  .product img {
    max-width: 100%;
    border-radius: 6px;
  }
  .product-name {
    font-weight: bold;
    margin: 10px 0 5px;
  }
  .price {
    color: #e74c3c;
    font-weight: bold;
    font-size: 1.1em;
  }
  button {
    margin-top: 10px;
    padding: 10px;
    background: #25d366;
    border: none;
    color: white;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
  }
  button:hover {
    background: #1ebe57;
  }
  #cart {
    background: white;
    padding: 15px;
    border-radius: 8px;
    margin-top: 30px;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
  }
  #cart h2 {
    margin-top: 0;
  }
  .cart-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
  }
  .cart-item button {
    background: #e74c3c;
    padding: 4px 8px;
    font-size: 0.9em;
  }
  #total {
    font-weight: bold;
    margin-top: 10px;
    text-align: right;
  }
  #orderBtn {
    margin-top: 15px;
    width: 100%;
    background: #075e54;
  }
  #orderBtn:hover {
    background: #0b785f;
  }
  footer {
    text-align: center;
    color: #777;
    margin: 40px 0 20px;
  }
</style>
</head>
<body>

<header>
  <h1>ABLETTOVIH BOUTIQUE Connectée</h1>
</header>

<div class="container">

  <div class="products" id="products">
    <!-- Les produits seront injectés ici -->
  </div>

  <div id="cart">
    <h2>Panier</h2>
    <div id="cart-items"></div>
    <div id="total">Total : 0 FCFA</div>
    <button id="orderBtn" disabled>Commander via WhatsApp</button>
  </div>

</div>

<footer>
  © 2025 MEGADIS Distribution - Tous droits réservés
</footer>

<script>
  // Liste des produits
  const products = [
    {id: 1, name: "Montre Connectée", price: 7500, img: "https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=400&q=80"},
    {id: 2, name: "Ecouteurs Bluetooth", price: 5000, img: "https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?auto=format&fit=crop&w=400&q=80"},
    {id: 3, name: "Power Bank 10000mAh", price: 6000, img: "https://images.unsplash.com/photo-1504805572947-34fad45aed93?auto=format&fit=crop&w=400&q=80"},
    {id: 4, name: "Smartphone Basique", price: 35000, img: "https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=400&q=80"},
    {id: 5, name: "Clé USB 64Go", price: 3000, img: "https://images.unsplash.com/photo-1583241505867-77b7387c6af2?auto=format&fit=crop&w=400&q=80"},
    {id: 6, name: "Enceinte Bluetooth", price: 7000, img: "https://images.unsplash.com/photo-1509395176047-4a66953fd231?auto=format&fit=crop&w=400&q=80"},
    {id: 7, name: "Chargeur Rapide", price: 2500, img: "https://images.unsplash.com/photo-1561079795-e17d4c3ea1a3?auto=format&fit=crop&w=400&q=80"},
    {id: 8, name: "Casque Audio", price: 9000, img: "https://images.unsplash.com/photo-1519985176271-adb1088fa94c?auto=format&fit=crop&w=400&q=80"},
  ];

  const cart = {};

  function renderProducts() {
    const productsDiv = document.getElementById("products");
    products.forEach(p => {
      const productEl = document.createElement("div");
      productEl.classList.add("product");
      productEl.innerHTML = `
        <img src="${p.img}" alt="${p.name}">
        <div class="product-name">${p.name}</div>
        <div class="price">${p.price.toLocaleString()} FCFA</div>
        <button onclick="addToCart(${p.id})">Ajouter au panier</button>
      `;
      productsDiv.appendChild(productEl);
    });
  }

  function addToCart(id) {
    if(cart[id]) {
      cart[id]++;
    } else {
      cart[id] = 1;
    }
    renderCart();
  }

  function removeFromCart(id) {
    if(cart[id]) {
      cart[id]--;
      if(cart[id] === 0) {
        delete cart[id];
      }
    }
    renderCart();
  }

  function renderCart() {
    const cartItemsDiv = document.getElementById("cart-items");
    cartItemsDiv.innerHTML = "";
    let total = 0;
    for (const id in cart) {
      const product = products.find(p => p.id == id);
      const qty = cart[id];
      const itemTotal = product.price * qty;
      total += itemTotal;

      const itemEl = document.createElement("div");
      itemEl.classList.add("cart-item");
      itemEl.innerHTML = `
        ${product.name} x ${qty} : ${itemTotal.toLocaleString()} FCFA 
        <button onclick="removeFromCart(${id})">-</button>
      `;
      cartItemsDiv.appendChild(itemEl);
    }
    document.getElementById("total").innerText = `Total : ${total.toLocaleString()} FCFA`;

    const orderBtn = document.getElementById("orderBtn");
    orderBtn.disabled = total === 0;

    orderBtn.onclick = () => {
      let message = "Bonjour, je souhaite commander :%0A";
      for (const id in cart) {
        const product = products.find(p => p.id == id);
        const qty = cart[id];
        message += `- ${product.name} x${qty}%0A`;
      }
      message += `Total : ${total.toLocaleString()} FCFA`;
      // Numéros WhatsApp (modifie si besoin)
      const phone = "2250713278690";
      const url = `https://wa.me/${phone}?text=${message}`;
      window.open(url, "_blank");
    };
  }

  renderProducts();
  renderCart();
</script>

</body>
</html>
