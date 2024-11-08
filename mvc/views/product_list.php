<!-- product_list.php View file -->
<h1>Product List</h1>
<ul>
    <?php foreach ($products as $product): ?>
        <li><?php echo htmlspecialchars($product['name']); ?> - <?php echo htmlspecialchars($product['price']); ?></li>
    <?php endforeach; ?>
</ul>