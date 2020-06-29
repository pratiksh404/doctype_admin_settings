@if ($setting->setting_type == "Select Dropdown")
@if (isset($setting->setting_custom->options))
<select name="integer_value" id="select_value {{$setting->setting_custom->id ?? ''}}"
    class="select2 {{$setting->setting_custom->class ?? ''}}" style="width: 100%; 
    @if($setting->setting_custom->style)
    @foreach ($setting->setting_custom->style as $style_name => $style_value)
    {{$style_name}} : {{$style_value}};
    @endforeach @endif">
    @foreach ($setting->setting_custom->options as $option_value => $option_name)
    <option value="{{$option_value}}"
        {{isset($setting->setting_custom->default) ? $option_value == $setting->setting_custom->default ? 'selected' : '' : ''}}>
        {{$option_name}}</option>
    @endforeach
</select>
@endif
@endif