<?php 

$ingredients = $_GET['ingredients'];

echo json_encode([
    'recipe' => 'Frango com batata', 
    'ingredients' => $ingredients
]);