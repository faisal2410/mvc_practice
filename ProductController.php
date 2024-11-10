<?php
// Using the Service Layer in the Controller

class ProductController
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function purchaseProduct($productId, $userId)
    {
        try {
            return $this->productService->purchaseProduct($productId, $userId);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}


/*
// Controller without Service Layer

class ProductController
{
    public function purchaseProduct($productId, $userId)
    {
        // Business logic directly in the controller
        $product = ProductRepository::find($productId);

        if ($product->stock <= 0) {
            throw new Exception("Product out of stock");
        }
        
        // Deduct stock and update user purchase history
        $product->stock--;
        ProductRepository::update($product);
        UserRepository::addPurchase($userId, $productId);
        
        return "Purchase successful!";
    }
}

// Here, the controller is responsible for business logic, such as checking stock, updating the database, and managing user purchases. It’s clear that if we add more logic, the controller will quickly become difficult to manage.

*/ 

// Previous Example :
/*
class ProductController
{
    public function store($request)
    {
        $data = $request->get('product_form');

        // Validate using an external validator
        $validation = new ProductValidator($data);

        if (!$validation->passes()) {
            return View::render('product/create', ['errors' => $validation->errors()]);
        }

        // Save to the database
        $product = new ProductModel($data);
        $product->save();

        return View::redirect('/products');
    }
}


*/ 
/*
class ProductController
{
    // List all products
    public function index()
    {
        // Fetch products from the model
        $products = ProductModel::getAll();
        return View::render('product/index', ['products' => $products]);
    }

    // Show a single product
    public function show($id)
    {
        // Find a product by ID
        $product = ProductModel::find($id);
        if (!$product) {
            throw new NotFoundException("Product not found");
        }
        return View::render('product/show', ['product' => $product]);
    }

    // Create a new product
    public function create(array $data)
    {
        $product = new ProductModel($data);
        $product->save();
        return View::redirect('/products');
    }
}

*/ 