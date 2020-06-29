<?php

namespace doctype_admin\Settings\Models;


use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];

    public function getSettingTypeAttribute($attribute)
    {
        return [
            1 => 'Text',
            2 => 'Rich Text Box',
            3 => 'Image',
            4 => 'Select Dropdown',
            5 => 'Radio',
            6 => 'Checkbox',
        ][$attribute];
    }

    public function setting_display_name()
    {
        return str_replace("_", " ", Str::upper($this->setting_name));
    }
}
