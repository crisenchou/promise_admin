<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\Role;

class VerifyRole
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role = null)
    {
        if ($this->auth->check()) {
            $user = $this->auth->user();
            $role = Role::whereName($role)->first();
            if ($user->hasRole($role)) {
                return $next($request);
            }

        }
        return back();
    }
}
