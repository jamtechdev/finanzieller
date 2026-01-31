<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'site_name' => Setting::get('site_name', config('app.name')),
            'site_logo' => Setting::get('site_logo'),
            'site_favicon' => Setting::get('site_favicon'),
            'contact_email' => Setting::get('contact_email'),
            'contact_phone' => Setting::get('contact_phone'),
            'contact_address' => Setting::get('contact_address'),
            'social_facebook' => Setting::get('social_facebook'),
            'social_instagram' => Setting::get('social_instagram'),
            'social_linkedin' => Setting::get('social_linkedin'),
            'footer_text' => Setting::get('footer_text'),
        ];

        return view('admin.pages.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:50',
            'contact_address' => 'nullable|string|max:500',
            'social_facebook' => 'nullable|url|max:255',
            'social_instagram' => 'nullable|url|max:255',
            'social_linkedin' => 'nullable|url|max:255',
            'footer_text' => 'nullable|string|max:1000',
            'site_logo' => 'nullable|image|max:2048',
            'site_favicon' => 'nullable|image|max:512',
        ]);

        $textSettings = ['site_name', 'contact_email', 'contact_phone', 'contact_address', 
                        'social_facebook', 'social_instagram', 'social_linkedin', 'footer_text'];

        foreach ($textSettings as $key) {
            if ($request->has($key)) {
                Setting::set($key, $request->input($key), 'text', 'general');
            }
        }

        // Handle logo upload
        if ($request->hasFile('site_logo')) {
            $oldLogo = Setting::get('site_logo');
            if ($oldLogo) {
                Storage::disk('public')->delete($oldLogo);
            }
            $file = $request->file('site_logo');
            $path = $file->storeAs('uploads/settings', 'logo.' . $file->getClientOriginalExtension(), 'public');
            Setting::set('site_logo', $path, 'image', 'general');
        }

        // Handle favicon upload
        if ($request->hasFile('site_favicon')) {
            $oldFavicon = Setting::get('site_favicon');
            if ($oldFavicon) {
                Storage::disk('public')->delete($oldFavicon);
            }
            $file = $request->file('site_favicon');
            $path = $file->storeAs('uploads/settings', 'favicon.' . $file->getClientOriginalExtension(), 'public');
            Setting::set('site_favicon', $path, 'image', 'general');
        }

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->update(['password' => Hash::make($request->password)]);

        return redirect()->back()->with('success', 'Password changed successfully!');
    }
}
