<?php
require_once __DIR__ . '/../models/Product.php';

class ProductController {
    private Product $product;

    public function __construct(PDO $db) {
        $this->product = new Product($db);
    }

    public function handleGet(?int $id): void {
        header("Content-Type: application/json; charset=UTF-8");

        if ($id !== null) {
            $item = $this->product->getById($id);
            if ($item) {
                http_response_code(200);
                echo json_encode($item);
            } else {
                http_response_code(404);
                echo json_encode(["message" => "Produit introuvable."]);
            }
        } else {
            $items = $this->product->getAll();
            http_response_code(200);
            echo json_encode($items);
        }
    }
}
