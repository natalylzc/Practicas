<?php
header('Content-Type: application/json; charset=utf-8');

require_once(__DIR__ . "/connection.php");
$db = new Conexion();
$pdo = $db->getConexion();

$requestMethod = $_SERVER['REQUEST_METHOD'];
$response = array();

switch ($requestMethod) {
    case 'GET':

        try {
            $query = "SELECT * FROM postulantes";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $postulantes = $stmt->fetchAll();

            $response["status"] = "success";
            $response["data"] = $postulantes;
        } catch (PDOException $e) {
            http_response_code(500);
            $response["status"] = "error";
            $response["message"] = "Error al obtener los postulantes.";
        }

        echo json_encode($response);
        break;
    case 'POST':
        $response["data"] = "PETICIÓN POST";
        echo json_encode($response);
        break;
    case 'PUT':
        $response["data"] = "PETICIÓN PUT";
        echo json_encode($response);
        break;
    case 'DELETE':
        $response["data"] = "PETICIÓN DELETE";
        echo json_encode($response);
        break;
    default:
        $response["data"] = "TIPO DE PETICIÓN DESCONOCIDA";
        echo json_encode($response);
        break;
}
