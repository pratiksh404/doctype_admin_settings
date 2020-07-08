@if ($setting->setting_type == "Rich Text Box")
<div class="d-flex justify-content-between">
    <label>{{$setting->setting_custom->label ?? $setting->setting_display_name()}}</label> @if($setting->setting_name)
    <span class="text-secondary">use
        @<code>setting('{{$setting->setting_name}}')</code>
    </span> @endif
</div>
<textarea class="textarea {{$setting->setting_custom->class ?? ''}}"
    id="{{$setting->setting_name}} {{$setting->setting_custom->id ?? ''}}"
    placeholder="{{$setting->setting_custom->placeholder ?? 'Place some text here'}}" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; @if(isset($setting->setting_custom->style))
    @foreach ($setting->setting_custom->style as $style_name => $style_value)
    {{$style_name}} : {{$style_value}};
@endforeach @endif" name="text_value">{{$setting->text_value ?? ''}}</textarea>
@endif