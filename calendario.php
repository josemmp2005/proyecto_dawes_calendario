<!-- 5. Dado el mes y año almacenados en variables, escribir un programa que muestre el
calendario mensual correspondiente. Marcar el día actual en verde y los festivos
en rojo.
Author: José María Mayén Pérez
Date: 28/09/2024 -->
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
    <table>
        <h1>Calendario</h1>
        <?php
        $mes = 9;
        $ano = 2024;
        $cont_dias = 1;

        $fecha = new DateTime("$ano-$mes-01");
        $fecha->modify('first day of this month');
        $dia_semana = $fecha->format('N');
        $dias_mes = $fecha->format('t');

        for ($i = 1; $i < $dia_semana; $i++) {
            echo "<td></td>";
        }

        while ($cont_dias <= $dias_mes) {
            if ($cont_dias == date("j") && $mes == date("n") && $ano == date("Y")) {
                echo "<td style='background-color: green;'>$cont_dias</td>";
            }else{
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