<?php
use HTMLElement\HTMLElementBase;
use HTMLElement\HTMLTextElement;
use HTMLElement\HTMLTextStringElement;
use HTMLElement\HTMLSelectOptgroupElement;

/*
 * Подключаем элементы
 */
include_once dirname(__FILE__).'/HTMLElementBase.php';
include_once dirname(__FILE__).'/HTMLTextElement.php';
include_once dirname(__FILE__).'/HTMLTextStringElement.php';
include_once dirname(__FILE__).'/HTMLSelectOptgroupElement.php';



$base_object = new HTMLSelectOptgroupElement();

$base_object->setLabel('123');
echo $base_object->getLabel();