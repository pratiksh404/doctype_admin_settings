<?php

namespace doctype_admin\Settings\Models;


use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];

    public function getSettingTypeAttribute($attribute)
    {
        return [
            1 => 'Text',
            2 => 'Rich Text Box',
            3 => 'Image/File',
            4 => 'Checkbox',
            5 => 'Select Dropdown',
            6 => 'Radio',
        ][$attribute];
    }
}
