<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:manage-cms', ['except' => []]);
    }

    public function index()
    {
        $settings = Settings::all()->pluck('value', 'key')->toArray();
        return view('admin.cms.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string|max:1000',
            'home_hero_headline' => 'nullable|string|max:255',
            'home_hero_subtext' => 'nullable|string|max:1000',
            'home_hero_primary_cta_text' => 'nullable|string|max:100',
            'home_hero_primary_cta_link' => 'nullable|string|max:255',
            'home_hero_secondary_cta_text' => 'nullable|string|max:100',
            'home_hero_secondary_cta_link' => 'nullable|string|max:255',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string',
            'site_address' => 'nullable|string',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'items_per_page' => 'required|integer|min:5|max:100',
            'enable_comments' => 'nullable|boolean',
            'show_home_hero' => 'nullable|boolean',
            'show_home_posts' => 'nullable|boolean',
            'show_home_announcements' => 'nullable|boolean',
            'show_home_testimonials' => 'nullable|boolean',
            'show_home_explore' => 'nullable|boolean'
        ]);

        $settings = [
            'site_name' => $request->site_name,
            'site_description' => $request->site_description,
            'home_hero_headline' => $request->home_hero_headline,
            'home_hero_subtext' => $request->home_hero_subtext,
            'home_hero_primary_cta_text' => $request->home_hero_primary_cta_text,
            'home_hero_primary_cta_link' => $request->home_hero_primary_cta_link,
            'home_hero_secondary_cta_text' => $request->home_hero_secondary_cta_text,
            'home_hero_secondary_cta_link' => $request->home_hero_secondary_cta_link,
            'contact_email' => $request->contact_email,
            'contact_phone' => $request->contact_phone,
            'site_address' => $request->site_address,
            'contact_address' => $request->site_address,
            'facebook_url' => $request->facebook_url,
            'twitter_url' => $request->twitter_url,
            'instagram_url' => $request->instagram_url,
            'youtube_url' => $request->youtube_url,
            'social_facebook' => $request->facebook_url,
            'social_twitter' => $request->twitter_url,
            'social_instagram' => $request->instagram_url,
            'social_youtube' => $request->youtube_url,
            'items_per_page' => $request->items_per_page,
            'enable_comments' => $request->has('enable_comments') ? 1 : 0,
            'show_home_hero' => $request->has('show_home_hero') ? 1 : 0,
            'show_home_posts' => $request->has('show_home_posts') ? 1 : 0,
            'show_home_announcements' => $request->has('show_home_announcements') ? 1 : 0,
            'show_home_testimonials' => $request->has('show_home_testimonials') ? 1 : 0,
            'show_home_explore' => $request->has('show_home_explore') ? 1 : 0
        ];

        $booleanKeys = [
            'enable_comments',
            'show_home_hero',
            'show_home_posts',
            'show_home_announcements',
            'show_home_testimonials',
            'show_home_explore',
        ];

        $textKeys = [
            'site_description',
            'home_hero_subtext',
            'site_address',
            'contact_address',
        ];

        foreach ($settings as $key => $value) {
            $type = 'string';

            if (in_array($key, $booleanKeys, true)) {
                $type = 'boolean';
            } elseif (in_array($key, $textKeys, true)) {
                $type = 'text';
            }

            Settings::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'type' => $type]
            );
        }

        if ($request->hasFile('site_logo')) {
            $logo = $request->file('site_logo')->store('logo', 'public');
            Settings::updateOrCreate(
                ['key' => 'site_logo'],
                ['value' => $logo, 'type' => 'string']
            );
        }

        if ($request->hasFile('home_hero_image')) {
            $heroImage = $request->file('home_hero_image')->store('hero', 'public');
            Settings::updateOrCreate(
                ['key' => 'home_hero_image'],
                ['value' => $heroImage, 'type' => 'string']
            );
        }

        return redirect()->route('admin.cms.settings.index')->with('success', 'Settings updated successfully');
    }
}
