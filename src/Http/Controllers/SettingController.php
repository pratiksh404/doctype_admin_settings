<?php

namespace doctype_admin\Settings\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use doctype_admin\Settings\Models\Setting;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Image;
use RealRashid\SweetAlert\Facades\Alert as Alert;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all(); /* Setting::all(); */
        return view('setting::setting.index', compact('settings'));
    }

    public function store(Request $request)
    {
        Setting::create($this->data());
        Alert::success("Setting Created", "Success");
        return redirect(config('setting.prefix', 'admin') . '/' . 'setting');
    }

    public function edit(Setting $setting)
    {
        return view('setting:setting.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $setting->update([
            "string_value" => $request->string_value ?? null,
            "text_value" => $request->text_value ?? null,
            "integer_value" => $request->integer_value ?? null

        ]);
        $this->uploadImage($setting);
        Alert::success("Setting Stored", "Success");
        return redirect(config('setting.prefix', 'admin') . '/' . 'setting');
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();
        Alert::error("Setting Deleted", "Success");
        return redirect(config('setting.prefix', 'admin') . '/' . 'setting');
    }

    public function validateData()
    {
        return request()->validate([
            'setting_name' => 'required|max:255|unique:settings',
            'setting_type' => 'required|numeric',
            'setting_custom' => 'sometimes'
        ]);
    }

    public function data()
    {
        $data = $this->validateData();
        $setting_name = $data['setting_name'];
        $valid_setting_name = str_replace(" ", "_", Str::lower($setting_name));
        $data['setting_name'] = $valid_setting_name;
        return $data;
    }

    public function uploadImage($setting)
    {
        if (request()->has('string_value') && $setting->setting_type == "Image") {
            $setting->update([
                "string_value" => request()->file('string_value')->store('uploads/setting', 'public')
            ]);

            $image = Image::make(request()->file('string_value')->getRealPath())->fit(800, 800);
            $image->save(public_path('storage/' . $setting->string_value), 80);
        }
    }
}
