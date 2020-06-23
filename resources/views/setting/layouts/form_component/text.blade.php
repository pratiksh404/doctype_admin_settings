@if ($setting->setting_type == "Text")
<input type="text" name="string_value" id="setting_name" class="form-control" placeholder="{{$setting->setting_name}}"
    value="{{$setting->string_value ?? old($setting->setting_name)}}">
@endif