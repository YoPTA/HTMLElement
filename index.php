<?php
use HTMLElement\HTMLElementBase;
use HTMLElement\HTMLTextElement;
use HTMLElement\HTMLTextStringElement;

/*
 * Подключаем элементы
 */
include_once dirname(__FILE__).'/HTMLElementBase.php';
include_once dirname(__FILE__).'/HTMLTextElement.php';
include_once dirname(__FILE__).'/HTMLTextStringElement.php';



$base_object = new HTMLTextStringElement(HTMLTextStringElement::HTML_E_TYPE_STRING);

$base_object->setValue('123');
echo $base_object->getValue();


