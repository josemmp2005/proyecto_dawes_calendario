<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
        border: 1px solid black;
        text-align: center;
    }

    th {
        background-color: lightgray;
    }
</style>

<body>
    <h1>Calendario</h1>

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
        $mes = 10 ;
        $ano = 2024;
        $cont_dias = 1;

        $fecha = new DateTime("$ano-$mes-01");
        $fecha->modify('first day of this month');
        $dia_semana = $fecha->format('N');
        $dias_mes = $fecha->format('t');

        $dias_festivos_nacionales = array(
            '1-1',    // Año Nuevo
            '1-6',    // Día de Reyes
            '5-1',    // Día del Trabajador
            '10-12',  // Día de la Hispanidad
            '11-1',   // Día de Todos los Santos
            '12-24',  // Nochebuena
            '12-25',  // Navidad
            '12-31'   // Nochevieja
        );

        $dias_festivos_comunidad = array('2-28'); //Dia de Andalucía
        
        $dias_festivos_locales = array(
            '9-8', // Virgen de la Fuensanta
            '5-3' // Día de la Cruz
        );

        for ($i = 1; $i < $dia_semana; $i++) {
            echo "<td></td>";
        }

        while ($cont_dias <= $dias_mes) {
            $fecha_actual = "$mes-$cont_dias";

            if (in_array($fecha_actual, $dias_festivos_nacionales)) {
                echo "<td style='background-color: lightcoral;'>$cont_dias</td>";
            } elseif ($cont_dias == date("j") && $mes == date("n") && $ano == date("Y")) {
                echo "<td style='background-color: lightgreen;'>$cont_dias</td>";
            } elseif (in_array($fecha_actual, $dias_festivos_comunidad)) {
                echo "<td style='background-color: lightblue;'>$cont_dias</td>";
            } elseif (in_array($fecha_actual, $dias_festivos_locales)) {
                echo "<td style='background-color: lightcoral;'>$cont_dias</td>";
            } else{
                echo "<td>$cont_dias</td>";
            }
            if (($dia_semana + $cont_dias - 1) % 7 == 0) {
                echo "</tr><tr>";
            }
            $cont_dias++;
        }

        for ($i = 1; $i < $dia_semana; $i++) {
            echo "<td></td>";
        }
        ?>
    </table>
</body>

</html>