<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <title>Borrar archivo</title>
        <link rel = "stylesheet" href = "CSS.css">
        <link rel = "stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><h1>Borrar archivo</h1></li>
                </ul>
            </nav>
        </header>
        <section class = "contenido wrapper">
            <center>
                <form method = "post" action = "Borrar.php">
                    <label for = "nfle"><b>Ruta del archivo a eliminar:</b></label>
                    <input type = "text" name = "nfle" id = "nfle" autocomplete = "off">
                    <button type = "submit">
                        <i class = "fas fa-trash-alt"></i>  Borrar
                    </button>

                    <?php

                        if(!$_POST['nfle'] == '')
                        {
                            $nameFile = $_POST['nfle'];

                            unlink($nameFile);

                            echo "<br><br><br>";
                            echo "<p>La operación se ha realizado de manera exitosa.</p>";
                        }
                        else
                        {
                            echo "<br><br><br>";
                            echo "<p>Por favor seleccione un archivo.</p>";
                        }
                    ?>
                </form>
            </center>
        </section>
    </body>
</html>