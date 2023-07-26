<?php

    $nameFile = $_POST['nfle'];
    $nameFilenovo = $_POST['nflvno'];
    $action = $_POST['action'];

    if($action == 'copiar')
    {
        copy($nameFile, $nameFilenovo);

        echo "La acción se ha realizado correctamente (copiar archivo).";
    }
    else
    {
        if($action == 'renombrar')
        {
            rename($nameFile, $nameFilenovo);

            echo "La acción se ha realizado correctamente (renombrar archivo).";
        }
        else
        {
            if($action == 'borrar')
            {
                unlink($nameFile);

                echo "La acción se ha realizado correctamente (borrar archivo).";
            }
            else
            {
                echo "Acción no válida, intente de nuevo.";
            }
        }
    }
?>