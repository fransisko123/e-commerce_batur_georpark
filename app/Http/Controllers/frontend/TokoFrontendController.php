<?php

namespace App\Http\Controllers\frontend;

use App\Models\Toko;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TokoFrontendController extends Controller
{
    public function shop($toko_slug)
    {
        $toko = Toko::where('slug', $toko_slug)->first();
        $produks = $toko->produks()->paginate(12);
        return view('frontend.toko.toko_shop',
            [
                'toko' => $toko,
                'produks' => $produks
            ]
        );
    }
}
