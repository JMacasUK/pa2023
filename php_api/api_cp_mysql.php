<?php
    // Esta aplicación PHP es un API REST por lo que no tiene interfaz de usuario
    // Se puede probar con Postman o con el archivo index.html
    header("Content-Type: application/json; charset=UTF-8");

    if (!empty($_GET["cp"])) {
        $cp = $_GET["cp"];
        if (empty($cp))
        {
            response(100, NULL);
        }
        else{
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "codigos_postales";
            
            $connection = new mysqli($servername, $username, $password, $dbname);
            if ($connection->connect_error) {
                response(500, NULL);
            }
            
            $query = "SELECT colonia FROM codigos_postales WHERE cp = $cp";
            $result = $connection->query($query);
            
            if ($result->num_rows > 0) {
                $rows = array();
                while($row = mysqli_fetch_assoc($result)) {
                    $rows[] = $row["colonia"];
                }
                response(200, $rows);
            } else {
                response(300, NULL);
            }

            $connection->close();
        }
    } else {
        response(300, NULL);
    }

    
    function response($status, $data) {
        header("HTTP/1.1 " . $status);
        $response = array(
            "status" => $status,
            "data" => $data
        );
        echo json_encode($response);
    }
?>