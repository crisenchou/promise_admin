<?php

namespace App\Http\Middleware;

use Closure;
use Validator;

class VerifyCaptcha
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), ['captcha' => 'required|captcha']);
            $validator->validate();
        }

        return $next($request);
    }
}
