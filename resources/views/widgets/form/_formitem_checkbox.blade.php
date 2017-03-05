<?php
/**
 * Created by PhpStorm.
 * User: LOR08
 * Date: 03.09.2016
 * Time: 13:30
 */ ?>
<?php
if (!isset($value)) $value = null;
if (!isset($checked)) $checked = null;
if (!isset($title)) $title = null;
?>
<div class="form-group{!! $errors->has($name) ? 'has-error' : null !!}">
    <label for="{!! $name !!}">{{ $title }}</label>
    {!! Form::checkbox($name, $value, $checked) !!}
    <p class="help-block">{!! $errors->first($name) !!}</p>
</div>