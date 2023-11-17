<?php

namespace App\Http\Controllers\frontend;

use App\Models\Produk;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewFrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $produk = Produk::findOrFail($request->produk_id);

        $review = new Review();
        $review->customer_id = $request->customer_id;
        $review->produk_id = $produk->id;
        $review->name = $request->name;
        $review->comment = $request->comment;
        $review->stars = $request->rating;
        $review->save();

        return redirect()->route('produk.detail', $produk->slug )->with('success', 'Berhasil menambah review.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
