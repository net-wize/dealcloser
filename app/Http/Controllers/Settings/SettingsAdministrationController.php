<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use App\Dealcloser\Core\Settings\Settings;
use App\Http\Requests\Settings\SettingsAdministrationRequest;

class SettingsAdministrationController extends Controller
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
     * Show corporation administration settings.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('settings.administration.show');
    }

    /**
     * Update corporation administration settings.
     *
     * @param SettingsAdministrationRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(SettingsAdministrationRequest $request)
    {
        Settings::set($request->only('kvk', 'btw'));

        return back()
            ->with('status', 'Bedrijfsadministratie geupdatet!');
    }
}
