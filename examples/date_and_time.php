<?php

use HTMLElement\HTMLTextDateTimeDateElement;
use HTMLElement\HTMLTextDateTimeTimeElement;

/*
 * Подключаем элементы
 */
include_once dirname(__FILE__).'/../HTMLElementBase.php';
include_once dirname(__FILE__).'/../HTMLTextElement.php';
include_once dirname(__FILE__).'/../HTMLTextDateTimeElement.php';
include_once dirname(__FILE__).'/../HTMLTextDateTimeDateElement.php';
include_once dirname(__FILE__).'/../HTMLTextDateTimeTimeElement.php';


$date = new HTMLTextDateTimeDateElement();
$date->setFormat('d.m.Y');
$date->setValue('30.03.2017');
$date->setMin('01.01.2017');
$date->setMax('31.01.2017');
$date->check();

$time = new HTMLTextDateTimeTimeElement();
$time->setFormat('H:i:s');
$time->setValue('12:00:05');
$time->setMin('08:00:00');
$time->setMax('18:00:00');
$time->check();

echo '<form method="POST">';

echo $date->render();
echo '<br /><br />';
echo $time->render();
echo '<br /><br />';
echo '<input type="submit" >';

echo '</form>';