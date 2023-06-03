<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

use Intervention\Image\ImageManager;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('index');
    }

    public function siteSettings(Request $request)
    {
        if ($request->isMethod('put')) {
            $request->validate([
                'site_name' => 'required|string',
                'site_header_logo' => 'nullable|image',
                'site_footer_logo' => 'nullable|image',
                'site_favicon' => 'nullable|image',
                'site_email' => 'required|email',
                'site_description' => 'nullable|string',
                'site_keywords' => 'nullable|string',
                'site_url' => 'nullable|string',
                'site_currency' => 'required|string',
                'site_address' => 'nullable|string',
                'site_postcode' => 'nullable|string',
            ]);

            $site_settings = SiteSetting::first() ?? new SiteSetting();

            if ($request->hasFile('site_header_logo')) {
                $file = $request->file('site_header_logo');

                // delete old logo
                if ($site_settings->site_header_logo) {
                    unlink(storage_path('app/public/logo/' . $site_settings->site_header_logo));
                }

                $file_name = 'site_header_logo.' . $file->getClientOriginalExtension();
                $file->storeAs('public/logo', $file_name);

                $site_settings->site_header_logo = $file_name;
            }

            if ($request->hasFile('site_footer_logo')) {
                $file = $request->file('site_footer_logo');

                // delete old logo
                if ($site_settings->site_footer_logo) {
                    unlink(storage_path('app/public/logo/' . $site_settings->site_footer_logo));
                }

                $file_name = 'site_footer_logo.' . $file->getClientOriginalExtension();
                $file->storeAs('public/logo', $file_name);

                $site_settings->site_footer_logo = $file_name;
            }

            if ($request->hasFile('site_favicon')) {
                $file = $request->file('site_favicon');

                // delete old favicon
                if ($site_settings->site_favicon) {
                    unlink(storage_path('app/public/logo/' . $site_settings->site_favicon));
                }

                $file_name = 'site_favicon.' . $file->getClientOriginalExtension();
                $file->storeAs('public/logo', $file_name);

                $site_settings->site_favicon = $file_name;
            }

            $site_settings->site_name = $request->site_name;
            $site_settings->site_email = $request->site_email;
            $site_settings->site_description = $request->site_description;
            $site_settings->site_keywords = $request->site_keywords;
            $site_settings->site_url = $request->site_url;
            $site_settings->site_currency = $request->site_currency;
            $site_settings->site_address = $request->site_address;
            $site_settings->site_postcode = $request->site_postcode;
            $site_settings->save();

            return redirect()->back()->with('success', 'Site settings updated successfully.');
        }

        $site_settings = SiteSetting::first() ?? new SiteSetting();
        return view('site-settings', compact('site_settings'));
    }
}
