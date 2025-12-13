<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Role;

class VerifyIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role_id = $request->user()->role_id;
        $adminId = Role::where('role_name', 'admin')->first()->id;
        if ($role_id !== $adminId) {
            return redirect('/dashboard')->with('error', 'You do not have admin access.');
        }

        return $next($request);
    }
}
