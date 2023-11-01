<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Toko;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTokoOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tokoId = $request->route('toko'); // Ambil ID toko dari rute

        $toko = Toko::find($tokoId);

        if (!$toko) {
            // Handle jika toko tidak ditemukan
            return abort(404);
        }

        $user = auth()->user();

        // Pemeriksaan izin
        if ($user->role === 'admin' || $user->id === $toko->user_id) {
            return $next($request);
        }

        abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
}
