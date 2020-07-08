@if ($setting->setting_type == "Radio" && isset($setting->setting_custom->options))
<?php 
if(isset($setting->setting_custom->type))
{
    if(trim($setting->setting_custom->type) == "integer") {$radio_name = "integer_value";}   
    elseif(trim($setting->setting_custom->type) == "string") {$radio_name = "string_value";} 
    elseif(trim($setting->setting_custom->type) == "boolean") {$radio_name = "boolean_value";}
}else{$radio_name = "integer_value";}
    ?>
<div class="d-flex justify-content-between">
    <label>{{$setting->setting_custom->label ?? $setting->setting_display_name()}}</label> @if($setting->setting_name)
    <span class="text-secondary">use
        @<code>setting('{{$setting->setting_name}}')</code>
    </span> @endif
</div>

@foreach ($setting->setting_custom->options as $option_value => $option_name)

<input type="radio"
    name="{{isset($setting->setting_custom->type) && isset($radio_name) ? $radio_name : 'integer_value' }}"
    value="{{$option_value}}"
    {{$setting->$radio_name == $option_value ? 'checked' : isset($setting->setting_custom->checked) && $setting->setting_custom->checked == $option_value ? 'checked' : ''}}
    class="{{$setting->setting_custom->class ?? ''}}" id="{{$setting->setting_custom->id ?? ''}}" style="@if(isset($setting->setting_custom->style))
    @foreach ($setting->setting_custom->style as $style_name => $style_value)
    {{$style_name}} : {{$style_value}};
    @endforeach @endif">
<label>{{$option_name}}</label>
<br>

@endforeach

@endif