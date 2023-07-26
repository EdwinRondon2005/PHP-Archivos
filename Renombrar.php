<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <title>Renombrar archivo</title>
        <link rel = "stylesheet" href = "Estilossss.css">
        <link rel = "stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><h1>Renombrar archivo</h1></li>
                </ul>
            </nav>
        </header>
        <section class = "contenido wrapper">
            <center>
                <form method = "post">
                    <label for = "nfle"><b><p>Ruta del archivo a renombrar:</p></b></label>
                    <input type = "text" name = "nfle" id = "nfle" autocomplete = "off">
                    <label for = "nflvno"><b><p>Nueva ruta del archivo modificado:</p></b></label>
                    <input type = "text" name = "nflvno" id = "nflvno" autocomplete = "off">
                    <p><button type = "submit">
                        <i class = "fas fa-edit"></i>  Cambiar nombre
                    </button></p>

                    <?php

                        if(!$_POST['nfle'] == "" && !$_POST['nflvno'] == "")
                        {
                            $nameFile = $_POST['nfle'];
                            $nameFilenovo = $_POST['nflvno'];

                            rename($nameFile, $nameFilenovo);

                            echo "<br><br><br>";
                            echo "<p>Archivo renombrado de manera exitosa.</p>";
                        }
                        else
                        {
                            echo "<p>Por favor seleccione un archivo.</p>";
                        }
                    ?>
                </form>
            </center>
        </section>
    </body>
</html>