<?php

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