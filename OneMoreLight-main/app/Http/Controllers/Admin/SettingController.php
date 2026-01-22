<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    protected $jsonPath = 'cms/settings.json';

    protected function getSettings()
    {
        $content = Storage::get($this->jsonPath);
        return json_decode($content, true) ?? [];
    }

    protected function saveSettings($settings)
    {
        Storage::put($this->jsonPath, json_encode($settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public function index()
    {
        $settings = $this->getSettings();
        return view('admin.pages.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_since' => 'required|string|max:10',
            'company_tagline' => 'required|string',
            'vision' => 'required|string',
            'mission_intro' => 'required|string',
            'mission_items' => 'required|string',
            'vision_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_profile_pdf' => 'nullable|mimes:pdf|max:10240',
        ]);

        $settings = $this->getSettings();
        
        $settings['company_name'] = $request->company_name;
        $settings['company_since'] = $request->company_since;
        $settings['company_tagline'] = $request->company_tagline;
        $settings['vision'] = $request->vision;
        $settings['mission_intro'] = $request->mission_intro;
        $settings['mission_items'] = array_map('trim', explode("\n", $request->mission_items));

        // Handle vision image upload
        if ($request->hasFile('vision_image')) {
            if (isset($settings['vision_image']) && str_starts_with($settings['vision_image'], 'uploads/')) {
                $oldPath = public_path($settings['vision_image']);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            
            $file = $request->file('vision_image');
            $filename = 'vision_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/settings'), $filename);
            $settings['vision_image'] = 'uploads/settings/' . $filename;
        }

        // Handle PDF upload
        if ($request->hasFile('company_profile_pdf')) {
            if (isset($settings['company_profile_pdf']) && str_starts_with($settings['company_profile_pdf'], 'uploads/')) {
                $oldPath = public_path($settings['company_profile_pdf']);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            
            $file = $request->file('company_profile_pdf');
            $filename = 'company_profile_' . time() . '.pdf';
            $file->move(public_path('uploads/settings'), $filename);
            $settings['company_profile_pdf'] = 'uploads/settings/' . $filename;
        }

        $this->saveSettings($settings);

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan berhasil disimpan!');
    }
}
