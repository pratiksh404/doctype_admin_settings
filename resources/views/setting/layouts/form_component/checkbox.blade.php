@if ($setting->setting_type == 'Checkbox')
<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
    <input type="hidden" name="boolean_value">
    <input type="checkbox" class="custom-control-input {{$setting->setting_custom->class ?? ''}}"
        id="{{$setting->setting_name}} {{$setting->setting_custom->id ?? ''}}" name="boolean_value" value="true"
        {{$setting->boolean_value ? 'checked' : ''}}>
    <label class="custom-control-label"
        for="{{$setting->setting_name}}">{{$setting->setting_custom->label ?? $setting->setting_display_name()}}</label>
</div>
@endif