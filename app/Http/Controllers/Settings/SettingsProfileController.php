<?php

namespace App\Http\Controllers\settings;

use App\Dealcloser\Core\Settings\Settings;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\SettingsProfileRequest;

class SettingsProfileController extends Controller
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
     * Show corporation profile settings.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('settings.profile.show');
    }

    /**
     * Update corporation profile settings.
     *
     * @param SettingsProfileRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(SettingsProfileRequest $request)
    {
        Settings::set($request->only('name', 'email', 'phone', 'website', 'description'));

        return back()
            ->with('status', 'Bedrijfsprofiel geupdatet!');
    }
}
