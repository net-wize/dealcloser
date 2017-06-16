<?php

namespace App\Http\Controllers\settings;

use App\Dealcloser\Core\Settings\Settings;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\SettingsUsageRequest;

class SettingsUsageController extends Controller
{
    /**
     * Create a new controller instance. Only users with role
     * super-admin have access to this controller.
     */
    public function __construct()
    {
        $this->middleware('role:super-admin');
    }

    /**
     * Show corporation usage settings.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('settings.usage.show');
    }

    /**
     * Update corporation profile settings.
     *
     * @param SettingsUsageRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(SettingsUsageRequest $request)
    {
        Settings::set($request->only('users', 'domain', 'active', 'license'));

        return back()
            ->with('status', 'Bedrijfsgebruik geupdatet!');
    }
}
