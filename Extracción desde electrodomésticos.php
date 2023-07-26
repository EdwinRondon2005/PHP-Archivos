<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset="UTF-8">
        <link rel = "stylesheet" href = "BSS.css">
        <link rel = "stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
        <title>Extracción desde la base de datos</title>
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><h1>Generación de archivos (JSON, CSV, TXT)</h1></li>
                </ul>
            </nav>
        </header>
        <section class = "contenido wrapper">
            <center>
                <form method = "post">
                    <input type = "radio" name = "tpyfil" value = "json" id = "json_tpy">
                    <label for = "json_tpy">Exportar como JSON.</label>
                    <br><br>
                    <input type = "radio" name = "tpyfil" value = "csv" id = "csv_tpy">
                    <label for = "csv_tpy">Exportar como CSV.</label>
                    <br><br>
                    <input type = "radio" name = "tpyfil" value = "txt" id = "txt_tpy">
                    <label for = "txt_tpy">Exportar como archivo de texto (TXT).</label>
                    <p><button type = "submit">
                        <i class = "fas fa-file-export"></i>  Exportar
                    </button></p>

                    <?php

                        $conn = mysqli_connect("localhost", "root", "", "electrodomesticos");

                        if(mysqli_connect_errno())
                        {
                            echo "<p>No se pudo conectar a la base de datos.</p>" . mysqli_connect_error();

                            exit();
                        }

                        $conn->set_charset("utf8mb4");

                        $query = "SELECT * FROM datos";

                        $results = mysqli_query($conn, $query) or die (mysqli_error($conn));

                        $datos = array();

                        while($fila = mysqli_fetch_assoc($results))
                        {
                            $datos[] = $fila;
                        }

                        $conn = null;

                        $file_tpy = $_POST['tpyfil'];

                        if($file_tpy == 'json')
                        {
                            header('Content-Type: application/json');
                            header('Content-Disposition: attachment, filename = "datos.json"');

                            echo json_encode($datos);
                        }
                        else
                        {
                            if($file_tpy == 'csv')
                            {
                                header('Content-Type: text/csv');
                                header('Content-Disposition: attachment, filename = "datos.csv"');

                                $exit = fopen('php://output', 'w');

                                foreach($datos as $fila)
                                {
                                    fputcsv($exit, $fila);
                                }

                                fclose($exit);
                            }
                            else
                            {
                                if($file_tpy == 'txt')
                                {
                                    header('Content-Type: text/plain');
                                    header('Content-Disposition: attachment, filename = "datos.txt"');

                                    echo "codigo\tnombre\tprecio\tdescripcion\tproveedor" . PHP_EOL;

                                    foreach($datos as $fila)
                                    {
                                        echo $fila['codigo'] . "\t" . $fila['nombre'] . "\t" . $fila['precio'] . "\t" . $fila['descripcion'] . "\t" . $fila['proveedor'] . PHP_EOL;
                                    }
                                }
                                else
                                {
                                    echo "<p>Archivo no válido.</p>";
                                }
                            }
                        }
                    ?>
                </form>
            </center>
        </section>
    </body>
</html>