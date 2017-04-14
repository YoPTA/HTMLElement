<?php

use HTMLElement\HTMLTextDateTimeDateElement;

/*
 * Подключаем элементы
 */
include_once dirname(__FILE__).'/../HTMLElementBase.php';
include_once dirname(__FILE__).'/../HTMLTextElement.php';
include_once dirname(__FILE__).'/../HTMLTextDateTimeElement.php';
include_once dirname(__FILE__).'/../HTMLTextDateTimeDateElement.php';


$date = new HTMLTextDateTimeDateElement();
$date->setFormat('d.m.Y');
$date->setValue('30.03.2017');
$date->setMin('01.01.2017');
$date->setMax('31.01.2017');


$date->check();



echo '<form method="POST">';

echo $date->render();
echo '<br /><br />';
echo '<input type="submit" >';

echo '</form>';