<?php
// Example Router logic (simplified)
$url = $_SERVER['REQUEST_URI'];
if ($url === '/products') {
    $controller = new ProductController();
    $controller->index();
}
