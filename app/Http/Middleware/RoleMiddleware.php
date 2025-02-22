<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
  
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();

        if (!$user) {
            abort(403, 'No tienes permiso para ingresar en esta sección');
        }

        if (in_array($user->rolUsuario, $roles)) {
            return $next($request);
        }

        abort(403, 'No tienes permiso para ingresar en esta sección');
    }
}
