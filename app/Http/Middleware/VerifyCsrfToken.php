<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/api/login',
        '/api/verificacion/guardaRequisito',
        '/api/verificacion/guardaMulta',
        '/api/verificacion/guardaCroquis',
        '/api/verificacion/cierraVerificacion',
        '/api/verificacion/guardaDetalle',
        '/api/verificacion/guardaVerificacion',
        '/api/verificacion/FinalizaVerificacion',
    ];
}
