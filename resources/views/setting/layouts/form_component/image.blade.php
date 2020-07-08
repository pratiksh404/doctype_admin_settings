@if ($setting->setting_type == "Image")
@if ($setting->string_value)
<img src="{{asset('/storage').'/'.$setting->string_value}}" width="300">
@endif

<div class="d-flex justify-content-between">
    <label>{{$setting->setting_custom->label ?? $setting->setting_display_name()}}</label> @if($setting->setting_name)
    <span class="text-secondary">use
        @<code>setting('{{$setting->setting_name}}')</code>
    </span> @endif
</div>

<div class="custom-file">
    <input type="file" name="string_value" class="custom-file-input" id="string_value">
    <label class="custom-file-label" for="string_value">Choose Image</label>
</div>

@endif