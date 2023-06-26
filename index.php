<?php



include_once('config.php');

$sql = "SELECT * FROM products ORDER BY quantity DESC";
$result = $conexao->query($sql);

//print_r($result);
?>

<!doctype html>
<html ⚡>
<head>
  <title>Arqmedes | Backend Test | Dashboard</title>
  <meta charset="utf-8">

<link  rel="stylesheet" type="text/css"  media="all" href="css/style.css" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
<meta name="viewport" content="width=device-width,minimum-scale=1">
<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
<script async src="https://cdn.ampproject.org/v0.js"></script>
<script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script></head>
  <!-- Header -->
<amp-sidebar id="sidebar" class="sample-sidebar" layout="nodisplay" side="left">
  <div class="close-menu">
    <a on="tap:sidebar.toggle">
      <img src="images/bt-close.png" alt="Close Menu" width="24" height="24" />
    </a>
  </div>
  <a href="index.php"><img src="images/arqmedes_logo-nova.jpg" alt="Welcome" width="200" height="43" /></a>
  <div>
    <ul>
      <li><a href="categories.php" class="link-menu">Categorias</a></li>
      <li><a href="products.php" class="link-menu">Produtos</a></li>
    </ul>
  </div>
</amp-sidebar>
<header>
  <div class="go-menu">
    <a on="tap:sidebar.toggle">☰</a>
    <a href="index.php" class="link-logo"><img src="images/php.png" alt="Welcome" width="69" height="430" /></a>
  </div>
  <div class="right-box">
    <span class="go-title">Administration Panel</span>
  </div>    
</header>  
<!-- Header -->
  <!-- Main Content -->
  <main class="content">
    <div class="header-list-page">
      <h1 class="title">Dashboard</h1>
    </div>
    <div class="infor">
      <!-- You have 4 products added on this store: <a href="addProduct.php" class="btn-action">Add new Product</a> -->
    </div>
    <ul class="product-list">
    
    <!-- Exibe os produto na dashboard e suas respectivas informações -->
<?php
      
    while($user_data = mysqli_fetch_assoc($result))
    {
      echo "<li>";
      echo "<div class='product-image'>";
      
      if(!empty($user_data['path'])){
        echo "<img src=".$user_data['path']." layout='responsive' width='164' height='145' alt='Tênis Runner Bolt' />";
      }else{
        echo "<img src='images/product/nulo.jpg' layout='responsive' width='164' height='145' alt='Tênis Runner Bolt' />";
      }

      
      echo "</div>";
      echo "<div class='product-info'>";
      echo "<div class='product-name'><span>". $user_data['nameProduct']."</span></div>";
      echo "<div class='product-price'><span class='special-price'>".$user_data['quantity']." disponíveis</span> <span>".$user_data['price']."</span></div>";
      echo "</div>";
      echo "</li>";
    }
?>   


    <!-- <li>
        <div class="product-image">
          <img src="images/product/tenis-runner-bolt.png" layout="responsive" width="164" height="145" alt="Tênis Runner Bolt" />
        </div>
        <div class="product-info">
          <div class="product-name"><span>Tênis Runner Bolt</span></div>
          <div class="product-price"><span class="special-price">9 available</span> <span>R$459,99</span></div>
        </div>
      </li> -->

    </ul>
  </main>
  <!-- Main Content -->

  <!-- Footer -->
<footer>
	<div class="footer-image">
	  <img src="images/arqmedes_logo-nova.jpg" width="119" height="26" alt="Go Jumpers" />
	</div>
	<div class="email-content">
	  <span>ecio@arqmedesconsultoria.com.br</span>
	</div>
</footer>
 <!-- Footer --></body>
</html>
