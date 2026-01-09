<?php

require_once __DIR__ . '/../config/database.php';

class Product
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getAll($search = '', $limit = 5, $offset = 0)
    {
        if ($search) {
            $stmt = $this->db->prepare(
                "SELECT * FROM products 
                 WHERE name LIKE :search 
                 LIMIT :limit OFFSET :offset"
            );
            $stmt->bindValue(':search', "%$search%");
        } else {
            $stmt = $this->db->prepare(
                "SELECT * FROM products 
                 LIMIT :limit OFFSET :offset"
            );
        }

        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countAll($search = '')
    {
        if ($search) {
            $stmt = $this->db->prepare(
                "SELECT COUNT(*) FROM products WHERE name LIKE :search"
            );
            $stmt->bindValue(':search', "%$search%");
        } else {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM products");
        }

        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $price, $description)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO products (name, price, description) 
             VALUES (:name, :price, :description)"
        );
        $stmt->execute(compact('name', 'price', 'description'));
    }

    public function update($id, $name, $price, $description)
    {
        $stmt = $this->db->prepare(
            "UPDATE products 
             SET name = :name, price = :price, description = :description 
             WHERE id = :id"
        );
        $stmt->execute(compact('id', 'name', 'price', 'description'));
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}
