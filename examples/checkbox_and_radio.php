<?php
use HTMLElement\HTMLCheckboxAndRadioCheckboxElement;
use HTMLElement\HTMLCheckboxAndRadioRadioElement;

/*
 * Подключаем элементы
 */
include_once dirname(__FILE__).'/../HTMLElementBase.php';
include_once dirname(__FILE__).'/../HTMLCheckboxAndRadio.php';
include_once dirname(__FILE__).'/../HTMLCheckboxAndRadioCheckboxElement.php';
include_once dirname(__FILE__).'/../HTMLCheckboxAndRadioRadioElement.php';



$radio_element['one'] = new HTMLCheckboxAndRadioRadioElement(HTMLCheckboxAndRadioRadioElement::HTML_E_TYPE_CHECKBOXANDRADIO_RADIO);

$radio_element['one']->setId('123');
$radio_element['one']->setName('radio');
$radio_element['one']->setValue('Какое-то радио');
$radio_element['one']->setCaption('Какое-то радио');
//$radio_element['one']->setDisabled(true);
//$radio_element['one']->setChecked(true);

$radio_element['two'] = new HTMLCheckboxAndRadioRadioElement(HTMLCheckboxAndRadioRadioElement::HTML_E_TYPE_CHECKBOXANDRADIO_RADIO);

$radio_element['two']->setId('124');
$radio_element['two']->setName('radio');
$radio_element['two']->setValue('Другое какое-то радио');
$radio_element['two']->setCaption('Другое какое-то радио');
//$radio_element['two']->setDisabled(true);


$checkbox_elements = [];
if (isset($_POST['execute']))
{
    echo 'Вы выбрали: '. $_POST['radio'];
    foreach ($radio_element as $bo)
    {
        if ($bo->getValue() == $_POST['radio'])
        {
            $bo->setChecked(true);
        }
    }
    echo '<br><br><br>';
    if (isset($_POST['checkboxes']))
    {
        $checkbox_elements = $_POST['checkboxes'];
    }
    foreach ($checkbox_elements as $item) echo "$item<br />";

    echo '<br><br><br>';
}




$checkbox_element['one'] = new HTMLCheckboxAndRadioCheckboxElement(HTMLCheckboxAndRadioCheckboxElement::HTML_E_TYPE_CHECKBOXANDRADIO_CHECKBOX);
$checkbox_element['one']->setName('checkboxes[a]');
$checkbox_element['one']->setValue('a-value');
$checkbox_element['one']->setCaption('Значение a');
$checkbox_element['one']->setConfig('class', 'cl');
$checkbox_element['one']->addStyleClass('myClass1');
$checkbox_element['one']->addStyleClass('myClass2');
(is_array($checkbox_elements) && array_key_exists('a', $checkbox_elements))? $checkbox_element['one']->setChecked(true):'';


$checkbox_element['two'] = new HTMLCheckboxAndRadioCheckboxElement(HTMLCheckboxAndRadioCheckboxElement::HTML_E_TYPE_CHECKBOXANDRADIO_CHECKBOX);
$checkbox_element['two']->setName('checkboxes[b]');
$checkbox_element['two']->setValue('b-value');
$checkbox_element['two']->setCaption('Значение b');
(is_array($checkbox_elements) && array_key_exists('b', $checkbox_elements))? $checkbox_element['two']->setChecked(true):'';

$checkbox_element['three'] = new HTMLCheckboxAndRadioCheckboxElement(HTMLCheckboxAndRadioCheckboxElement::HTML_E_TYPE_CHECKBOXANDRADIO_CHECKBOX);
$checkbox_element['three']->setName('checkboxes[c]');
$checkbox_element['three']->setValue('c-value');
$checkbox_element['three']->setCaption('Значение c');
(is_array($checkbox_elements) && array_key_exists('c', $checkbox_elements))? $checkbox_element['three']->setChecked(true):'';




echo '<form method="POST">';

echo $radio_element['one']->render();
echo $radio_element['two']->render();

echo '<br><br><br>';
echo $checkbox_element['one']->render().'<br>';
echo $checkbox_element['two']->render().'<br>';
echo $checkbox_element['three']->render().'<br>';

echo '<br><br><input type="submit" name="execute" value="Выолнить">';

echo '</form>';