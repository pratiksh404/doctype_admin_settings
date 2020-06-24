@if ($setting->setting_type == "Text")
<label>{{$setting->setting_display_name()}}</label>
<input type="text" name="string_value" id="{{$setting->setting_name}}" class="form-control"
    placeholder="{{$setting->setting_display_name()}}" value="{{$setting->string_value ?? ''}}">
@endif