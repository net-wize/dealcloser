<?php

namespace App\Http\Middleware;

use Auth;
use Carbon\Carbon;
use Closure;

class CheckIfApplicationIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $date = settings()->active;

        if (is_null($date) || $date > Carbon::now() || $request->user()->hasRole('super-admin')) {
            return $next($request);
        }

        Auth::logout();

        return redirect('/')
            ->with(['status' => 'Applicatie is niet actief, contacteer de beheerder', 'class' => 'is-danger']);
    }
}
