<?php

function date_str_($date)
{

	$date = substr($date, 0, 10);

	$numeroDia = date('d', strtotime($date));
	$dia = date('l', strtotime($date));
	$mes = date('F', strtotime($date));
	$anio = date('Y', strtotime($date));
	$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
	$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
	$nombredia = str_replace($dias_EN, $dias_ES, $dia);
	$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	$nombreMes = str_replace($meses_EN, $meses_ES, $mes);

	return $nombredia . " " . $numeroDia . " de " . $nombreMes . " de " . $anio;
}

function date_()
{
	date_default_timezone_set('America/Lima');
	return date('Y-m-d H:i:s');
}

function is_item($item)
{
	if (isset($item) && !empty($item)):
		return true;
	else:
		return false;
	endif;
}
