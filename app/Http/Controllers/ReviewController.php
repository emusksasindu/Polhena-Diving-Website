<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $data['reviews'] = Review::orderBy('id', 'desc')->get();
        return view('admin.reviews', $data);
    }

    public function user_index()
    {
        $data['reviews'] = Review::orderBy('id', 'desc')->get();
        return view('reviews.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reviews.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'star_count' => ['required', 'integer', 'max:6'],
            'review' => ['string', 'max:500'],
        ]);
        $review = new Review;
        $review->star_count = $request->star_count;
        $review->review = $request->review;
        $review->users_id = $request->users_id;
        $review->products_id = $request->products_id;
        $review->services_id = $request->services_id;
        $review->save();
        return redirect()->route('admin.reviews')
            ->with('success', 'review has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review  $review)
    {
        return view('reviews.show', compact('review'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review  $review)
    {
        return view('reviews.edit', compact('review'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'star_count' => ['required', 'integer', 'max:6'],
            'review' => ['string', 'max:500'],
        ]);
        $review = new Review;
        $review->star_count = $request->star_count;
        $review->review = $request->review;
        $review->users_id = $request->users_id;
        $review->products_id = $request->products_id;
        $review->services_id = $request->services_id;
        $review->save();
        return redirect()->route('admin.reviews')
            ->with('success', 'review Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
    
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review  $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews')
            ->with('success', 'review has been deleted successfully');
    }
}
