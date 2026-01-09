<?php

require_once __DIR__ . '/../models/Product.php';

class ProductController
{
    private $productModel;

    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /project_uas/auth/login');
            exit;
        }

        $this->productModel = new Product();
    }

    public function index()
    {
        $search = $_GET['search'] ?? '';
        $page   = $_GET['page'] ?? 1;
        $limit  = 5;
        $offset = ($page - 1) * $limit;

        $products = $this->productModel->getAll($search, $limit, $offset);
        $total    = $this->productModel->countAll($search);
        $pages    = ceil($total / $limit);

        require __DIR__ . '/../views/products/index.php';
    }

    public function add()
    {
        if ($_SESSION['role'] !== 'admin') {
            header('Location: /project_uas/product/index');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->productModel->create(
                $_POST['name'],
                $_POST['price'],
                $_POST['description']
            );
            header('Location: /project_uas/product/index');
            exit;
        }

        require __DIR__ . '/../views/products/add.php';
    }

    public function edit($id)
    {
        if ($_SESSION['role'] !== 'admin') {
            header('Location: /project_uas/product/index');
            exit;
        }

        $product = $this->productModel->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->productModel->update(
                $id,
                $_POST['name'],
                $_POST['price'],
                $_POST['description']
            );
            header('Location: /project_uas/product/index');
            exit;
        }

        require __DIR__ . '/../views/products/edit.php';
    }

    public function delete($id)
    {
        if ($_SESSION['role'] !== 'admin') {
            header('Location: /project_uas/product/index');
            exit;
        }

        $this->productModel->delete($id);
        header('Location: /project_uas/product/index');
        exit;
    }
}
