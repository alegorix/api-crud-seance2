<?php
class Product {
    private PDO $conn;
    private string $table = "products";

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function getAll(): array {
        $query = "SELECT id, name, price, created_at FROM {$this->table} ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById(int $id): ?array {
        $query = "SELECT id, name, price, created_at FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row ?: null;
    }
}
