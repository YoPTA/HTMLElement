<?php

namespace HTMLElement;


class HTMLTextStringElement extends HTMLTextElement
{
    /**
     * Проводит необходимую проверку для текущего типа.
     */
    public function check()
    {
        if (parent::getMin() !== false)
        {
            if (strlen(parent::getValue()) < parent::getMin())
            {
                parent::setCheck(false);
                return;
            }
        }
        if (parent::getMax() !== false)
        {
            if (strlen(parent::getValue()) > parent::getMax())
            {
                parent::setCheck(false);
                return;
            }
        }
    }

    /**
     * Отрисовывает html элемент.
     * @return string
     */
    public function render()
    {
        $el_attributes = '';

        if (parent::getType() == self::HTML_E_TYPE_TEXT_STRING)
        {
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
                    : '').'>'.parent::getCaption().':'
                . ((parent::getMin() !== false)? ' *':'').'</label><br>'
                :'')
            . '<input '
            .$el_attributes
            . ((parent::getDisabled() === true)? 'disabled ' : '')
            .'  />';
        }
        else
        {
            return '<span>No element</span>';
        }
    }
}