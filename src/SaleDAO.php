<?php
class SaleDAO {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function createSale($user_id, $total) {
        $stmt = $this->pdo->prepare("INSERT INTO sales (user_id,total) VALUES (?,?)");
        $stmt->execute([$user_id,$total]);
        return $this->pdo->lastInsertId();
    }

    public function addSaleDetail($sale_id, $product_id, $quantity, $unit_price) {
        $stmt = $this->pdo->prepare("INSERT INTO sales_details (sale_id,product_id,quantity,unit_price) VALUES (?,?,?,?)");
        $stmt->execute([$sale_id,$product_id,$quantity,$unit_price]);
    }
}
