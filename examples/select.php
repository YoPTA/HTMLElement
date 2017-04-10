<?php
use HTMLElement\HTMLSelectElement;
use HTMLElement\HTMLSelectOptionElement;
use HTMLElement\HTMLSelectOptgroupElement;

/*
 * Подключаем элементы
 */
include_once dirname(__FILE__).'/../HTMLElementBase.php';
include_once dirname(__FILE__).'/../HTMLSelectElement.php';

$my_select = '';
if (isset($_POST['mySelect']))
{
    $my_select = htmlspecialchars($_POST['mySelect']);
}

echo $my_select;


$option[0] = new HTMLSelectOptionElement();
$option[0]->setValue(0);
$option[0]->setText('Привет 0');
($my_select == $option[0]->getValue())? $option[0]->setSelected(true):'';

$option[1] = new HTMLSelectOptionElement();
$option[1]->setValue(1);
$option[1]->setText('Привет 1');
($my_select == $option[1]->getValue())? $option[1]->setSelected(true):'';

$option[2] = new HTMLSelectOptionElement();
$option[2]->setValue(2);
$option[2]->setText('Привет 2');
($my_select == $option[2]->getValue())? $option[2]->setSelected(true):'';

$option[3] = new HTMLSelectOptionElement();
$option[3]->setValue(3);
$option[3]->setText('Привет 3');
$option[3]->setGroup(2);
($my_select == $option[3]->getValue())? $option[3]->setSelected(true):'';

$option[4] = new HTMLSelectOptionElement();
$option[4]->setValue(4);
$option[4]->setText('Привет 4');
$option[4]->setGroup(3);
($my_select == $option[4]->getValue())? $option[4]->setSelected(true):'';

$option[5] = new HTMLSelectOptionElement();
$option[5]->setValue(5);
$option[5]->setText('Привет 5');
($my_select == $option[5]->getValue())? $option[5]->setSelected(true):'';

$optgroup[1] = new HTMLSelectOptgroupElement();
$optgroup[1]->setLabel('Группа 1');

$optgroup[2] = new HTMLSelectOptgroupElement();
$optgroup[2]->setLabel('Группа 2');

$optgroup[3] = new HTMLSelectOptgroupElement();
$optgroup[3]->setLabel('Группа 3');

echo '<form method="POST">';

$select_object = new HTMLSelectElement();

$select_object->setCaption('Select element');
$select_object->setName('mySelect');
$select_object->setNecessarily(true);

$select_object->setConfig('onchange', 'this.form.submit();');
echo $select_object->render($option, $optgroup);

echo '</form>';