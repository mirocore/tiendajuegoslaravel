<?php

namespace App\Http\Middleware;

use App\Models\Rol;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->id_rol != Rol::ROL_ADMINISTRADOR) {
            return redirect()->route('auth.index')->with('error-message', 'No posee los permisos necesarios para ingresar a esta sección');
        }

        return $next($request);
    }
}
