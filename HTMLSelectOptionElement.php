<?php

namespace HTMLElement;


class HTMLSelectOptionElement
{
    /*******************************************************
     ********************* Поля класса *********************
     *******************************************************/

    const HTML_E_CONFIG_VALUE_NAME = 'value';

    /**
     * Текущее поле хранит в себе конфигурацию
     * HTML элемента (набор атрибутов) с их значением
     * в паре ключ=>значение.
     * Пример: name='someName', value='someValue' и т.п.
     * @var array
     */
    private $element_config = [];

    /**
     * Текст элемента.
     * @var string
     */
    private $text = false;

    /**
     * Значение элемента.
     * @var string
     */
    private $value = false;

    /**
     * Группа элемента.
     * @var string
     */
    private $group = false;

    /*******************************************************
     ******************** Методы класса ********************
     *******************************************************/

    /**
     * Устанавливает значение атрибута элемента.
     * @param $key string
     * @param $value string
     */
    public function setConfig($key, $value)
    {
        __setConfig($this->element_config, $key, $value);
    }

    /**
     * Возвращает значение атрибута по ключу.
     * @param $key string - ключ
     * @return bool OR string
     */
    public function getConfig($key)
    {
        if (!isset($this->element_config[$key]))
        {
            return false;
        }
        return $this->element_config[$key];
    }

    /**
     * Возвращает конфигурацию элемента.
     * @return array
     */
    public function getFullConfig()
    {
        return $this->element_config;
    }


    public function setValue($value)
    {
        $this->setConfig(self::HTML_E_CONFIG_VALUE_NAME, $value);
    }

}