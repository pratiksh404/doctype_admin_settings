@if ($setting->setting_type == "Checkbox")
<div class="icheck-primary d-inline">
    <label for="{{$setting->setting_name}}">{{$setting->setting_display_name()}}</label>
    <input type="hidden" name="integer_value" value="0">
    <input type="checkbox" name="integer_value" id="{{$setting->setting_name}}" value="1"
        {{$setting->integer_value == 1 ? 'checked' : ''}}>
</div>
@endif