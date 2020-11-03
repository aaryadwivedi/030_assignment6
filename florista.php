<?php

class product {
    public $id = null;
    public $price = null;
    public $name = null;

    private $table_name = "florista";
    private $conn = null;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getRecords() {
        $sql = "SELECT * FROM {$this->table_name} ORDER BY flower_name";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function getByID() {
        $sql = "SELECT * FROM {$this->table_name} WHERE id like ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        return $stmt;
    }

     public function add() {
        $sql = "INSERT INTO {$this->table_name} VALUES (:id,:name,:price)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id',$this->id);
        $stmt->bindParam(':name',$this->name);
        $stmt->bindParam(':price',$this->price);


        $stmt->execute();
        print_r($stmt->errorInfo());
        return $stmt->rowCount();
        
    }
    public function update() {
        $sql = "UPDATE
                    {$this->table_name}
                SET
                    flower_name = :name,
                    price = :price
                WHERE
                    id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id',$this->id);
        $stmt->bindParam(':name',$this->name);
        $stmt->bindParam(':price',$this->price);
        $stmt->execute();
        return $stmt->rowCount();
        
    }

    function delete() {
        $sql = "DELETE FROM {$this->table_name} WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $this->id = htmlspecialchars($this->id);
        // echo $this->prn;
        $stmt->bindParam(1,$this->id);

        // echo $stmt->q
        $stmt->execute();
        return $stmt->rowCount();
    }



}
?>