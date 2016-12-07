<?php
class Mercadoria{
    // database connection and table name
    private $conn;
    private $table_name = "mercadoria";

    // object properties
    public $codigoMercadoria;
    public $tipoMercadoria;
    public $nomeMercadoria;
    public $quantidade;
    public $preco;
    public $tipoNegocio;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create mercadoria
    function create(){

        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    codigoMercadoria=:codigoMercadoria, tipoMercadoria=:tipoMercadoria, nomeMercadoria=:nomeMercadoria, quantidade=:quantidade, preco=:preco, tipoNegocio=:tipoNegocio";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // posted values
        $this->tipoMercadoria=htmlspecialchars(strip_tags($this->tipoMercadoria));
        $this->nomeMercadoria=htmlspecialchars(strip_tags($this->nomeMercadoria));
        $this->quantidade=htmlspecialchars(strip_tags($this->quantidade));
        $this->preco=htmlspecialchars(strip_tags($this->preco));
        $this->tipoNegocio=htmlspecialchars(strip_tags($this->tipoNegocio));

        // bind values
        $stmt->bindParam(":codigoMercadoria", $this->codigoMercadoria);
        $stmt->bindParam(":tipoMercadoria", $this->tipoMercadoria);
        $stmt->bindParam(":nomeMercadoria", $this->nomeMercadoria);
        $stmt->bindParam(":quantidade", $this->quantidade);
        $stmt->bindParam(":preco", $this->preco);
        $stmt->bindParam(":tipoNegocio", $this->tipoNegocio);

        // execute query
        if($stmt->execute()){
            return true;
        }else{
            echo "<pre>";
                print_r($stmt->errorInfo());
            echo "</pre>";

            return false;
        }
    }

    // read mercadorias
    function readAll(){

        // select all query
        $query = "SELECT
                    codigoMercadoria, tipoMercadoria, nomeMercadoria, quantidade, preco, tipoNegocio
                FROM
                    " . $this->table_name . "
                ORDER BY
                    codigoMercadoria DESC";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // execute query
        $stmt->execute();

        return $stmt;
    }

}
?>
