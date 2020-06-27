@if ($setting->setting_type == "Select Dropdown")
<select name="integer_value" id="select_value" class="select2" style="width: 100%">
    {!! $setting->setting_custom !!}
</select>
@endif