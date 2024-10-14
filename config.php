<?php
/**
 * 
 * Autor: José María Mayén Pérez
 */
$cont_dias = 1;

// Obtener mes y año actuales
$mes_actual = date("n"); // Mes actual (1-12)
$ano_actual = date("Y");  // Año actual (ej. 2024)

$a_meses_años = array(
    "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", 
    "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
);

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

$dias_festivos_comunidad = array('2-28'); // Dia de Andalucía

$dias_festivos_locales = array(
    '9-8', // Virgen de la Fuensanta
    '5-3' // Día de la Cruz
);
?>