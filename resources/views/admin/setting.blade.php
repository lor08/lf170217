<?php
/**
 * Created by PhpStorm.
 * User: szhih
 * Date: 02.03.17
 * Time: 14:05
 */
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<a href="{{ route('admin.setting') }}" class="btn btn-primary">
			<i class="fa fa-plus"></i> Добавить
		</a>
	</div>
	{!! Form::open(array('route' => 'admin.setting', 'class' => 'panel panel-default')) !!}
	<div class="form-elements">
		<div class="panel-body">
			<div class="form-elements">
				@foreach ($config as $name => $value)
					<div class="form-group form-element-text ">
						{!! Form::label($name, $name, array('class' => "control-label")) !!}
						{!! Form::text($name, $value, array('placeholder' => $name, 'class' => "form-control")) !!}
					</div>
				@endforeach
			</div>
		</div>
		<div class="form-buttons panel-footer">
			{!! Form::button('<i class="fa fa-check"></i> Обновить', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}
		</div>
	</div>
	{!! Form::close() !!}
</div>