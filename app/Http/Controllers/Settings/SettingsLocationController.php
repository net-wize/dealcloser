<?php

namespace App\Http\Controllers\settings;

use App\Dealcloser\Core\Settings\Settings;
use App\Http\Controllers\Controller;
use App\Http\Requests\settings\SettingsLocationRequest;

class SettingsLocationController extends Controller
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
     * Show corporation location settings.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('settings.location.show');
    }

    /**
     * Update corporation location settings.
     *
     * @param SettingsLocationRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SettingsLocationRequest $request)
    {
        Settings::set($request->only('address', 'zip', 'city'));

        return back()
            ->with('status', 'Bedrijfslocatie geupdatet!');
    }
}
