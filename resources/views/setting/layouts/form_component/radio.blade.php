@if ($setting->setting_type == "Radio")
<div class="icheck-primary d-inline">
    <input type="radio" id="radioPrimary1" name="r1" checked>
    <label for="radioPrimary1">
    </label>
</div>
<div class="icheck-primary d-inline">
    <input type="radio" id="radioPrimary2" name="r1">
    <label for="radioPrimary2">
    </label>
</div>
<div class="icheck-primary d-inline">
    <input type="radio" id="radioPrimary3" name="r1" disabled>
    <label for="radioPrimary3">
        Primary radio
    </label>
</div>
@endif