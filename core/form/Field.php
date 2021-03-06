<?php
namespace app\core\form;

use app\core\Model;

class Field{
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';
    public const TYPE_DATE = 'date';
    public const TYPE_HIDDEN = 'hidden';
    public const LABEL_HIDDEN = 'd-none';
    
    public Model $model;
    public string $attribute;
    public string $type;
    public function __construct(Model $model,string $attribute){
        $this->model = $model;
        $this->attribute = $attribute;
        $this->type = self::TYPE_TEXT;
    }
   public function __toString(){
       return sprintf('
        <div class="form-group">
                    <div class="mb-3">
                        <label class="form-label">%s</label>
                        <input type="%s" name="%s" value="%s" class="form-control %s">
                        <div class="invalid-feedback">
                            %s
                        </div>
                    </div>
                </div>
        ',
            $this->model->getLabel($this->attribute),
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute)?' is-invalid' : '',
            $this->model->getFirstError($this->attribute)
        );
    }
    public function passwordField(){
        $this->type=self::TYPE_PASSWORD;
        return $this;
    }
    public function hiddenField()
    {
        $this->type = self::TYPE_HIDDEN;
        $this->label = self::LABEL_HIDDEN;

        return $this;
    }
    public function dateField()
    {
        $this->type = self::TYPE_DATE;
        return $this;
    }
    public function numberField()
    {
        $this->type = self::TYPE_NUMBER;
        return $this;
    }
}