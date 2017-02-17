<div class="form-group">
	<?=Form::label('source_type', 'Тип источника');?>
	<?=Form::select('source_type', [
		'1' => 'http://gooool.org/',
		'2' => 'http://goal-online.pro/',
		'3' => 'Чампионат, новости'
	], null, ['placeholder' => 'Выбрать тип источника...', 'class' => 'form-control']);?>
</div>

<div class="form-group">
	<?=Form::label('source', 'Источник');?>
	<?=Form::text('source', '', ['placeholder' => 'сюда ссыль', 'class' => 'form-control']);?>
</div>

<div class="form-group">
	<?=Form::label('result', 'Результат');?>
	<?=Form::textarea('result', '', ['placeholder' => 'Тут будет результат работы скрипта', 'class' => 'form-control']);?>
</div>

<div class="form-group">
	<?=Form::button('Спиздить', ['id' => 'btnGrabber', 'class' => 'btn btn-primary']);?>
</div>
<script type="text/javascript">
	$(document).on('click', '#btnGrabber', function (e) {
		var source_type = $('[name=source_type]').val();
		var source = $('[name=source]').val();
		if (source_type) {
			var msg = "source=" + source;
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '/grabber/' + source_type,
				data: msg,
				beforeSend: function (request) {
					return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
				},
				success: function (response) {
					console.info(response);
					$('[name=result]').val(response.content);
				},
				error: function (response) {
					console.error(response);
				}
			});
		}
		;
	});
</script>