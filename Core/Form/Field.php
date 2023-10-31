<?php

namespace App\Core\Form;

use App\Core\Model;

class Field extends BaseField {

    public string $type;
    public Model $model;
    public string $attribute;

    public function __construct(Model $model, $attribute, $type = 'text')
    {
        parent::__construct($model, $attribute);
        $this->type = $type;
    }

    public function renderInput(): string
    {
        return sprintf('<input type="%s" name="%s" value="%s" class="form-control %s">',
        $this->type,
        $this->model->hasError($this->attribute) ? ' is-invalid' : '',
        $this->attribute,
        $this->model->{$this->attribute},
        );
    }
}


?>