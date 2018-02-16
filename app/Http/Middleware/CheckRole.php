<?php namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * @param $request
     * @param Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!$request->user()->hasRole($role)) {
            return redirect('/')->withErrors('Access Denied');
        }

        return $next($request);
    }
}