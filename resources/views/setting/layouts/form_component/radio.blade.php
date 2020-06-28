@if ($setting->setting_type == "Radio" && isset($setting->setting_custom->options))
<?php 
if(isset($setting->setting_custom->type))
{
    if(trim($setting->setting_custom->type) == "integer") {$radio_name = "integer_value";}   
    if(trim($setting->setting_custom->type) == "string") {$radio_name = "string_value";} 
    if(trim($setting->setting_custom->type) == "boolean") {$radio_name = "boolean_value";}
}else{$radio_name = "integer_value";}
    ?>

@foreach ($setting->setting_custom->options as $option_value => $option_name)


<input type="radio"
    name="{{isset($setting->setting_custom->type) && isset($radio_name) ? $radio_name : 'integer_value' }}"
    value="{{$option_value}}"
    {{$setting->$radio_name == $option_value ? 'checked' : isset($setting->setting_custom->checked) && $setting->setting_custom->checked == $option_value ? 'checked' : ''}}>
<label>{{$option_name}}</label>
<br>

@endforeach

@endif