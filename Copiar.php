<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <title>Copiar archivo</title>
        <link rel = "stylesheet" href = "CCS.css">
        <link rel = "stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><h1>Copiar archivo</h1></li>
                </ul>
            </nav>
        </header>
        <section class = "contenido wrapper">
            <center>
                <form method = "post">
                    <label for = "nfle"><b>Ruta del archivo a copiar:</b></label>
                    <input type = "text" name = "nfle" id = "nfle" autocomplete = "off">
                    <br><br><br>
                    <label for = "nflvno"><b>Ruta de la copia del archivo:</b></label>
                    <input type = "text" name = "nflvno" id = "nflvno" autocomplete = "off">
                    <p><button type = "submit">
                        <i class = "fas fa-copy"></i>  Copiar
                    </button></p>

                    <?php

                        if(!$_POST['nfle'] == "" && !$_POST['nflvno'] == "")
                        {
                            $nameFile = $_POST['nfle'];
                            $nameFilenovo = $_POST['nflvno'];

                            copy($nameFile, $nameFilenovo);

                            echo "<br><br><br>";
                            echo "<p>La operación se ha realizado de manera exitosa.</p>";
                        }
                        else
                        {
                            echo "<p>Por favor seleccione un archivo para copiarlo.</p>";
                        }
                    ?>
                </form>
            </center>
        </section>
    </body>
</html>