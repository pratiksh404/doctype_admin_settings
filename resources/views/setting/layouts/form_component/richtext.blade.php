@if ($setting->setting_type == "Rich Text Box")
<label>{{$setting->setting_display_name()}}</label>
<textarea class="textarea {{$setting->setting_custom->class ?? ''}}"
    id="{{$setting->setting_name}} {{$setting->setting_custom->id ?? ''}}"
    placeholder="{{$setting->setting_custom->placeholder ?? 'Place some text here'}}" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; @if($setting->setting_custom->style)
    @foreach ($setting->setting_custom->style as $style_name => $style_value)
    {{$style_name}} : {{$style_value}};
    @endforeach @endif"></textarea>
@endif