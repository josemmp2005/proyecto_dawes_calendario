        <!-- VISTA -->

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Calendario</title>
    </head>

    <body>
        <h1>Calendario</h1>
        <?php
        include("config.php");

        // Verificar si se ha pasado una fecha como parámetro en la URL y mostrar la fecha seleccionada
        
        if (isset($_GET['fecha'])) {
            $fecha = htmlspecialchars($_GET['fecha']);
            echo "<h1>$fecha</h1>";
        } else {
            // Mostrar el calendario
            echo "<form action='' method='post'>
                    <select name='mes' required>";

            // Opciones de meses
            foreach ($a_meses_años as $key => $value) {
                echo '<option value="' . ($key + 1) . '"';
                if ($key + 1 == $mes_actual) {
                    echo ' selected';
                }
                echo '>' . $value . '</option>';
            }
            echo "</select>";

            // Entrada para el año
            echo "<input type='number' name='ano' value='" . $ano_actual . "' required>";
            echo "<input type='submit' name='cargar' value='Cargar'>";
            echo "</form>";
            ?>
            <br>
            <br>  
            <table>
                <tr>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miércoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                    <th>Sábado</th>
                    <th>Domingo</th>
                </tr>
                <?php
                // Obtener mes y año actuales o seleccionados
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $mes = htmlspecialchars($_POST['mes']);
                    $ano = htmlspecialchars($_POST['ano']);
                } else {
                    $mes = $mes_actual;
                    $ano = $ano_actual;
                }

                // Obtener primeros datos para el calendario
                $fecha = new DateTime("$ano-$mes-01");
                $dia_semana = $fecha->format('N');
                $dias_mes = $fecha->format('t');
                $cont_dias = 1;
                

                // Espacios en blanco antes del primer día
                echo "<tr>";
                for ($i = 1; $i < $dia_semana; $i++) {
                    echo "<td></td>";
                }

                $ano_actual = date("Y");

                while ($cont_dias <= $dias_mes) {
                    // Obtener el mes y día de la fecha actual
                    $fecha_actual = "$ano-$mes-$cont_dias";
                    $fecha_dia = new DateTime($fecha_actual);
                    $dia_semana = $fecha_dia->format('N');

                    // Extraer mes y día para comparación
                    $mes_dia = "$mes-$cont_dias";

                    // Comprobando si el mes-día está en el array de días festivos
                    if (in_array($mes_dia, $dias_festivos_nacionales)) {
                        echo "<td class='nacionales'><a href='?fecha=$fecha_actual' target='_blank'>$cont_dias</a></td>";
                    } elseif ($cont_dias == date("j") && $mes == date("n") && $ano == date("Y")) {
                        echo "<td class='actual'><a href='?fecha=$fecha_actual' target='_blank'>$cont_dias</a></td>";
                    } elseif (in_array($mes_dia, $dias_festivos_comunidad)) {
                        echo "<td class='comunidad'><a href='?fecha=$fecha_actual' target='_blank'>$cont_dias</a></td>";
                    } elseif (in_array($mes_dia, $dias_festivos_locales)) {
                        echo "<td class='local'><a href='?fecha=$fecha_actual' target='_blank'>$cont_dias</a></td>";
                    } elseif ($dia_semana == 7) {
                        echo "<td class='domingo'><a href='?fecha=$fecha_actual' target='_blank'>$cont_dias</a></td>";
                    } else {
                        echo "<td><a href='?fecha=$fecha_actual' target='_blank'>$cont_dias</a></td>";
                    }

                    // Salto de línea para el final de la semana
                    if ($dia_semana == 7) {
                        echo "</tr><tr>";
                    }

                    $cont_dias++;
}
                // Relleno de la fila final si es necesario
                if ($dia_semana < 7) {
                    for ($i = $dia_semana; $i < 7; $i++) {
                        echo "<td></td>";
                    }
                }
                echo "</tr>";
                echo "</table>";
        }
        ?>
    </body>

    </html>