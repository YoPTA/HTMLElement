<?php

namespace HTMLElement;


class HTMLTextDateElement extends HTMLTextElement
{
    /*******************************************************
     ********************* Поля класса *********************
     *******************************************************/

    /**
     * Обязательный ли к выбору элемент.
     * @var bool
     */
    private $necessarily = false;

    // Установки конфигурации даты
    const HTML_E_CONFIG_DATE_DATE_FORMAT_1 = 'd.m.Y';
    const HTML_E_CONFIG_DATE_DATE_FORMAT_2 = 'Y-m-d';
    const HTML_E_CONFIG_DATE_DATE_FORMAT_3 = 'd/m/Y';

    private $date_format_formates = [
        self::HTML_E_CONFIG_DATE_DATE_FORMAT_1 => true,
        self::HTML_E_CONFIG_DATE_DATE_FORMAT_2 => true,
        self::HTML_E_CONFIG_DATE_DATE_FORMAT_3 => true,
    ];

    /**
     * Формат даты.
     * Необходимо обязательно установить формат.
     * 1 - ДД.ММ.ГГГГ.
     * 2 - ГГГГ-ММ-ДД.
     * @var int
     */
    private $date_format = self::HTML_E_CONFIG_DATE_DATE_FORMAT_1;

    private $min = false;
    private $max = false;

    /*******************************************************
     ******************** Методы класса ********************
     *******************************************************/

    /**
     * Устанавливает минимальное значение.
     * @param $value value - минимальное значение
     */
    public function setMin($value)
    {
        $date_array = $this->dateSplit($value);
        $is_date = checkdate($date_array['month'], $date_array['day'], $date_array['year']);
        if ($is_date)
        {
            $this->min = $value;
        }
    }

    /**
     * Возвращает минимальное значение типа.
     * @return bool OR value
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * Устанавливает максимальное значение.
     * @param $value value - максимальное значение
     */
    public function setMax($value)
    {
        $date_array = $this->dateSplit($value);
        $is_date = checkdate($date_array['month'], $date_array['day'], $date_array['year']);
        if ($is_date)
        {
            $this->max = $value;
        }
    }

    /**
     * Возвращает максимальное значение.
     * @return bool OR value
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * Устанавилвает минимальное и максимальное значения.
     * @param $min value - минимальное значение
     * @param $max value - максимальное значение
     */
    public function setMinMax($min, $max)
    {
        $this->setMin($min);
        $this->setMax($max);
    }

    /**
     * Устанавливает обязательно ли выбирать элемент.
     * @param $value bool
     */
    public function setNecessarily($value)
    {
        if (is_bool($value))
        {
            $this->necessarily = $value;
        }
    }

    /**
     * Возвращает обязатнольно ли выбирать элемент.
     * @return bool
     */
    public function getNecessarily()
    {
        return $this->necessarily;
    }

    /**
     * Устанавливает формат даты.
     * @param $value int - формат даты.
     * @return bool
     */
    public function setDateFormat($value)
    {
        if (empty($value))
        {
            return false;
        }
        if (!isset($this->date_format_formates[$value]))
        {
            return false;
        }
        $this->date_format = $value;
    }

    /**
     * Возращает формат даты.
     * @return int
     */
    public function getDateFormat()
    {
        return $this->date_format;
    }

    /*
     * Разбивает дату в массив (число, месяц, год)
     * @var $date string - дата
     * return array()
     */
    private function dateSplit($date)
    {
        $date_array['day'] = 0;
        $date_array['month'] = 0;
        $date_array['year'] = 0;

        if ($this->getDateFormat() == self::HTML_E_CONFIG_DATE_DATE_FORMAT_1)
        {
            $segments = explode('.', $date);
            if (count($segments) == 3)
            {
                $date_array['day'] = (int)$segments[0];
                $date_array['month'] = (int)$segments[1];
                $date_array['year'] = (int)$segments[2];
            }
        }

        if ($this->getDateFormat() == self::HTML_E_CONFIG_DATE_DATE_FORMAT_2)
        {
            $segments = explode('-', $date);
            if (count($segments) == 3)
            {
                $date_array['day'] = (int)$segments[2];
                $date_array['month'] = (int)$segments[1];
                $date_array['year'] = (int)$segments[0];
            }
        }

        if ($this->getDateFormat() == self::HTML_E_CONFIG_DATE_DATE_FORMAT_3)
        {
            $segments = explode('/', $date);
            if (count($segments) == 3)
            {
                $date_array['day'] = (int)$segments[0];
                $date_array['month'] = (int)$segments[1];
                $date_array['year'] = (int)$segments[2];
            }
        }

        return $date_array;
    }

    public function check()
    {
        $date_array = $this->dateSplit(parent::getValue());
        $is_date = checkdate($date_array['month'], $date_array['day'], $date_array['year']);
        if (!$is_date)
        {
            parent::setCheck(false);
            return false;
        }

        if ($this->getMin() !== false)
        {
            $value_date = \DateTime::createFromFormat($this->getDateFormat(), $this->getValue());
            $value_min = \DateTime::createFromFormat($this->getDateFormat(), $this->getMin());

            if ($value_date < $value_min)
            {
                parent::setCheck(false);
                return false;
            }
        }

        if ($this->getMax() !== false)
        {
            $value_date = \DateTime::createFromFormat($this->getDateFormat(), $this->getValue());
            $value_max = \DateTime::createFromFormat($this->getDateFormat(), $this->getMax());

            if ($value_date > $value_max)
            {
                parent::setCheck(false);
                return false;
            }
        }
    }

    /**
     * Отрисовывет html элемент.
     * @return string
     */
    public function render()
    {
        $el_attributes = '';

        $el_attributes .= ' type="text"';
        parent::setStyle('width: 250px;');
        if (parent::getCheck() === false)
        {
            $this->setStyle('border: 1px solid red;');
        }

        $full_config = parent::getFullConfig();

        foreach ($full_config as $key => $val)
        {
            if ($val !== false)
            {
                if ($el_attributes != '') $el_attributes .= ' ';

                $el_attributes .= $key .'="'.$val.'"';
            }
        }

        return ((parent::getCaption() != '')
            ? '<label'.
            ((parent::getId() != '' && parent::getId() != false)
                ? ' for="'. parent::getId().'"'
                : '').'>'.$this->getCaption().':'
            . (($this->getNecessarily() !== false)? ' *':'').'</label><br>'
            :'')
        . '<input '
        .$el_attributes
        . (($this->getDisabled() === true)? 'disabled ' : '')
        .'  />';
    }
}