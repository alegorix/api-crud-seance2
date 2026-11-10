<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/controllers/ProductController.php';

$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$parts = explode('/', trim($path, '/'));

$apiIndex = array_search('api', $parts);

if ($apiIndex !== false && isset($parts[$apiIndex + 1]) && $parts[$apiIndex + 1] === 'products') {
    $id = isset($parts[$apiIndex + 2]) && is_numeric($parts[$apiIndex + 2]) ? (int)$parts[$apiIndex + 2] : null;

    $database = new Database();
    $db = $database->getConnection();
    $controller = new ProductController($db);

    if ($method === 'GET') {
        $controller->handleGet($id);
        exit;
    }

    http_response_code(405);
    header("Allow: GET");
    echo json_encode(["message" => "Méthode {$method} non supportée pour l'instant (Séance 2)."]);
    exit;
}

http_response_code(404);
echo json_encode(["message" => "Endpoint non trouvé."]);
