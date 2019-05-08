@php
if (!is_array($attributes)) $attributes = [];
$config = FormBuilderHelper::setupDefaultConfig($name, $attributes);

$config['pluginOptions'] = array_merge([

	'todayBtn' => 'linked',
	'clearBtn' => true,
	'autoclose' => true,
	'todayHighlight' => true

], $config['pluginOptions'] ?? [])
@endphp

<div class="form-group {{ !$errors->has($name) ?: 'has-danger' }}">
	@if ($config['useLabel'])
	<div class="row">
		<div class="{{ $config['labelContainerClass'] }}">
			<label class="col-form-label">
				{!! $config['labelText'] !!}
			</label>
		</div>
		<div class="{{ $config['inputContainerClass'] }}">
	@endif
			@if (!empty($config['addonsConfig']))
			<div class="input-group">
				@if ($config['addonsConfig']['position'] === 'left')
				<span class="input-group-addon addon-left-side">{{ $config['addonsConfig']['text'] }}</span>
				@endif
			@endif

				{{ Form::text($name, $value, $config['elOptions']) }}

			@if (!empty($config['addonsConfig']))
				@if ($config['addonsConfig']['position'] === 'right')
				<span class="input-group-addon addon-right-side">{{ $config['addonsConfig']['text'] }}</span>
				@endif
			</div>
			@endif

			<div class="error-container">
				@if($errors->has($name))
	            <div class="form-control-feedback">{{ $errors->first($name) }}</div>
				@endif
			</div>

            {!! @$config['info'] !!}

	@if ($config['useLabel'])
		</div>
	</div>
	@endif
</div>

@push('additional-js')
	<script type="text/javascript">
		var datepicker_{{ $name }} = {!! json_encode($config['pluginOptions']) !!}
		$(document).ready(function() {
			$('#{{ $config['elOptions']['id'] }}').datepicker(datepicker_{{ $name }});
		});
	</script>
@endpush