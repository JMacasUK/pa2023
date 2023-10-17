<?php
    // Esta aplicación PHP es un API REST por lo que no tiene interfaz de usuario
    // Se puede probar con Postman o con el archivo index.html
    header("Content-Type: application/json; charset=UTF-8");

    if (!empty($_GET["x"]) && !empty($_GET["y"])) {
        $x = $_GET["x"];
        $y = $_GET["y"];
        if (empty($x) || empty($y))
        {
            response(100, NULL);
        }
        else{
            response(200, $x + $y);
        }
    } else {
        response(300, NULL);
    }

    // if ( empty($_GET['action']) ) {
    //     $response = array(
    //         "status" => "error",
    //         "message" => "No action provided"
    //     );
    //     http_response_code(400);
    //     echo json_encode($response);
    //     exit;
    // }

    // if ( $_GET['action'] == 'get' ) {
    //     $response = array(
    //         "status" => "success",
    //         "message" => "GET action executed"
    //     );
    //     http_response_code(500);
    //     echo json_encode($response);
    //     exit;
    // }

    function response($status, $data) {
        header("HTTP/1.1 " . $status);
        $response = array(
            "status" => $status,
            "data" => $data
        );
        echo json_encode($response);
    }
?>