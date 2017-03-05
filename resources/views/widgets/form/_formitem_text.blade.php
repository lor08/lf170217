<?php
/**
 * Created by PhpStorm.
 * User: LOR08
 * Date: 03.09.2016
 * Time: 13:29
 */ ?>
<?php if (!isset($value)) $value = null ?>
<div class="form-group{!! $errors->has($name) ? 'has-error' : null !!}">
    <label for="{!! $name !!}">{{ $title }}</label>
    {!! Form::text($name, $value, array('placeholder' =>  $placeholder, 'class' => 'form-control', 'id' => $name, 'required' => $required, 'data-msg-required' => "Поле $title обязательно для заполнения")) !!}
    <p class="help-block">{!! $errors->first($name) !!}</p>
</div>