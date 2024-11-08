<?php
class View
{
    /**
     * Render a view file with data
     *
     * @param string $viewName The name of the view file (without extension)
     * @param array $data Associative array of data to pass to the view
     */
    public static function render($viewName, $data = [])
    {
        // Convert array keys into variables for the view
        extract($data);

        // Path to the view file
        $viewFile = __DIR__ . "/views/{$viewName}.php";

        // Check if the view file exists
        if (file_exists($viewFile)) {
            // Include the view file, which will have access to the extracted variables
            include $viewFile;
        } else {
            // Display an error message if the view file is not found
            echo "View file '{$viewName}.php' not found!";
        }
    }
}
