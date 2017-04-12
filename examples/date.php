<?php
use HTMLElement\HTMLElementBase;
use HTMLElement\HTMLTextElement;
use HTMLElement\HTMLTextDateElement;

/*
 * Подключаем элементы
 */
include_once dirname(__FILE__).'/../HTMLElementBase.php';
include_once dirname(__FILE__).'/../HTMLTextElement.php';
include_once dirname(__FILE__).'/../HTMLTextDateElement.php';

$date_element = new HTMLTextDateElement();
$date_element->setValue('29.04.2016');
$date_element->setMin('30.03.2016');
$date_element->setMax('30.03.2016');
$date_element->setName('myDate');
$date_element->setId('myDate');
$date_element->setValueFromRequest();
//$date_element->setDateFormat('d.m.Y');
$date_element->check();


echo '<form method="POST">';
echo $date_element->render();

echo '<br /><br />';
echo '<input type="submit" >';

echo '</form>';