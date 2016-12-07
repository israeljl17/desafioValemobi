<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  // include database and object files
  include_once 'db/Database.php';
  include_once 'model/Mercadoria.php';

  // instantiate database and mercadoria object
  $database = new Database();
  $db = $database->getConnection();

  // initialize object
  $mercadoria = new Mercadoria($db);

  // query mercadorias
  $stmt = $mercadoria->readAll();
  $num = $stmt->rowCount();

  $data="";

  // check if more than 0 record found
  if($num>0){

      $x=1;

      // retrieve our table contents
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          // extract row
          // this will make $row['name'] to
          // just $name only
          extract($row);

          $data .= '{';
              $data .= '"codigoMercadoria":"'  . $codigoMercadoria . '",';
              $data .= '"tipoMercadoria":"' . $tipoMercadoria . '",';
              $data .= '"nomeMercadoria":"' . $nomeMercadoria . '",';
              $data .= '"quantidade":"' . $quantidade . '",';
              $data .= '"preco":"' . $preco . '",';
              $data .= '"tipoNegocio":"' . $tipoNegocio . '"';
          $data .= '}';

          $data .= $x<$num ? ',' : ''; $x++; }
  }

  // json format output
  echo '{"records":[' . $data . ']}';
?>
