
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
</body>



