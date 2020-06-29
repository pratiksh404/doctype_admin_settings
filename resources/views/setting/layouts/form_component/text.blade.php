@if ($setting->setting_type == "Text")
<label>{{$setting->setting_custom->label ?? $setting->setting_display_name()}}</label>
<input type="text" name="string_value" id="{{$setting->setting_name}} {{$setting->setting_custom->id ?? ''}}"
    class="form-control {{$setting->setting_custom->class ?? ''}}"
    placeholder="{{$setting->setting_custom->placeholder ?? $setting->setting_display_name()}}"
    value="{{$setting->string_value ?? $setting->setting_custom->value ?? ''}}" style="@if($setting->setting_custom->style) 
     @foreach ($setting->setting_custom->style as $style_name => $style_value)
      {{$style_name}} : {{$style_value}};
       @endforeach @endif">
@endif