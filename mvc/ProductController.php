<?php

class ProductController
{
    public function index()
    {
        // Interact with the Model to fetch products
        $products = ProductModel::getAllProducts();
        // Pass data to the View
        View::render('product_list', ['products' => $products]);
    }

    public function show($id)
    {
        $product = ProductModel::find($id);
        View::render('product_show', ['product' => $product]);
    }
}
