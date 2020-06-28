@if ($setting->setting_type == "Select Dropdown")
@if (isset($setting->setting_custom->options))
<select name="integer_value" id="select_value" class="select2" style="width: 100%">
    @foreach ($setting->setting_custom->options as $option_value => $option_name)
    <option value="{{$option_value}}"
        {{isset($setting->setting_custom->default) ? $option_value == $setting->setting_custom->default ? 'selected' : '' : ''}}>
        {{$option_name}}</option>
    @endforeach
</select>
@endif
@endif