<?php

namespace app\core\form;
use app\core\Model;

class SelectField 
{
    public Model $model;
    public string $attribute;
    public string $label;
    public array $optionsValues = [];


    public function __construct($model, $attribute, $optionsValues = [])
    {
        $this->label = $attribute;
        $this->model = $model;
        $this->attribute = $attribute;
        $this->optionsValues = $optionsValues;
    }

    public function __toString()
    {
        return sprintf('
            <div class="form-groupe">
                <label class="%s">%s</label>
                <select class="form-control">
                    %s
                </select>
                <div class="invalid-feedback">%s</div>
            </div>
        ',
            $this->label,
            $this->attribute,
            $this->addOption(),
            $this->model->getFirstError($this->attribute)
        );
    }

    public function addOption(): string
    {
        $str = '';
        foreach($this->optionsValues as $value)
        {
            $str .= '<option value='.$value.'>' . $value . '</option>';
        }
        return $str;
    }
}