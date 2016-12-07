<?php
  // get database connection
  include_once 'db/Database.php';
  $database = new Database();
  $db = $database->getConnection();

  // instantiate mercadoria object
  include_once 'model/Mercadoria.php';
  $mercadoria = new Mercadoria($db);

  // get posted data
  $data = json_decode(file_get_contents("php://input"));

  // set mercadoria property values
  $mercadoria->tipoMercadoria = $data->tipoMercadoria;
  $mercadoria->nomeMercadoria = $data->nomeMercadoria;
  $mercadoria->quantidade = $data->quantidade;
  $mercadoria->preco = $data->preco;
  $mercadoria->tipoNegocio = $data->tipoNegocio;

  // create the mercadoria
  if($mercadoria->create()){
      echo "Mercadoria was created.";
  }

  // if unable to create the mercadoria, tell the user
  else{
      echo "Unable to create mercadoria.";
  }
?>
