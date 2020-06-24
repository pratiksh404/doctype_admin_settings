@if ($setting->setting_type == "Rich Text Box")
<label>{{$setting->setting_display_name()}}</label>
<textarea class="textarea" id="{{$setting->setting_name}}" placeholder="Place some text here"
    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
@endif