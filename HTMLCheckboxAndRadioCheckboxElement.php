<?php

namespace HTMLElement;


class HTMLCheckboxAndRadioCheckboxElement extends HTMLCheckboxAndRadio
{

    public function render()
    {
        $el_attributes = '';

        if (parent::getType() == self::HTML_E_TYPE_CHECKBOXANDRADIO_CHECKBOX
            && parent::getCaption() != false)
        {
            $el_attributes .= ' type="checkbox"';
            /*if (parent::getCheck() === false)
            {
                $this->setStyle('border: 1px solid red;');
            }*/

            $full_config = parent::getFullConfig();

            foreach ($full_config as $key => $val)
            {
                if ($val !== false)
                {
                    if ($el_attributes != '') $el_attributes .= ' ';

                    $el_attributes .= $key .'="'.$val.'"';
                }
            }

            if (parent::getChecked() === true)
            {
                $el_attributes .= ' checked';
            }

            return '<label'
                . ((parent::getId() != '' && parent::getId() != false)
                ? ' for="'.parent::getId().'"' : '')
                .'><input '. $el_attributes
                .((parent::getDisabled() === true)? ' disabled ' : '').'/>'
                . parent::getCaption() .'</label>';
        }
        else
        {
            return parent::getNoElement();
        }
    }
}