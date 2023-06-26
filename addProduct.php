<?php
    include_once('config.php');


   if(isset($_POST['submit']))
  {

      $sku = $_POST['sku'];
      $nameProduct = $_POST['name'];
      $price = $_POST['price'];
      $description = $_POST['description'];
      $quantity = $_POST['quantity'];
      $category = $_POST['category'];
      $imagem = $_FILES['imagem'];

      //Criação e de chave unica para cada imagem inserida
      $diretorio = "images/product/";
      $nomeArquivo = $imagem['name'];
      $newNomeArquivo = uniqid();
      $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
      $path = $diretorio . $newNomeArquivo . "." . $extensao;

    if($extensao != NULL){

      if($extensao != "jpg" && $extensao != "png")
        die("Tipo de arquivo não aceito");

      //Faz a criação do nome da imagem a ser salva
      $sucess = move_uploaded_file($imagem["tmp_name"], $diretorio . $newNomeArquivo . "." . $extensao); 
      
      if($sucess)

        //Mensagem de erro (alerta)
        if($imagem['error'])
          die("Falha ao enviar o arquivo");

      //Faz o insert no banco de dado no caso de houver imagens
      $result = mysqli_query($conexao, "INSERT INTO products(sku, nameProduct, price, description, quantity, category, path, nameImg) VALUES ('$sku', '$nameProduct', '$price', '$description', '$quantity', '$category', '$path', '$newNomeArquivo')");

    }else{

    $result = mysqli_query($conexao, "INSERT INTO products(sku, nameProduct, price, description, quantity, category) VALUES ('$sku', '$nameProduct', '$price', '$description', '$quantity', '$category')");

    //echo var_dump($result);
  }

  }
      //Requisição de informações de categoria para o cadastro do produto
      $sql = "SELECT * FROM category ORDER BY codeCategory DESC";
      $results = $conexao->query($sql);
?>

<!doctype html>
<html ⚡>
<head>
  <title>Arqmedes | Backend Test | Add Product</title>
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
    <h1 class="title new-item">New Product</h1>
    
    <form action="addProduct.php" method="POST" enctype="multipart/form-data">
      <div class="input-field">
        <label for="sku"  class="label">Product SKU</label>
        <input type="text" name="sku" id="sku" class="input-text" /> 
      </div>
      <div class="input-field">
        <label for="name"  class="label">Product Name</label>
        <input type="text" name="name" id="name" class="input-text" /> 
      </div>
      <div class="input-field">
        <label for="price"  class="label">Price</label>
        <input type="text" name="price" id="price" class="input-text" /> 
      </div>
      <div class="input-field">
        <label for="quantity"  class="label">Quantity</label>
        <input type="text" name="quantity" id="quantity" class="input-text" /> 
      </div>
            
      <div class="input-field">
        <label for="category"  class="label">Categories</label>
        <select multiple id="category" name="category" class="input-text">

        <!-- Exibição de categorias cadastradas para seleção na area produto -->
        <?php       
            while($user_data = mysqli_fetch_assoc($results)){
              echo "<option>".$user_data['nameCategory']."</option>";
            }
        ?>

        </select>
      </div>
      
      
      <div class="input-field">
        <label for="description"  class="label">Description</label>
        <textarea id="description" name="description" class="input-text"></textarea>
      </div>

          <div class="input-field">
          <input type='file' name='imagem' value='Cadastrar foto' class="input-text"> Cadastrar imagem</input>
          </div>

      <div class="actions-form">
        <a href="products.php" class="action back">Back</a>
        <input class="btn-submit btn-action" type="submit" name="submit" id="submit" value="Save Product" />
      </div>
      
    </form>
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
