<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Contracts\View\View;

class ReviewController extends Controller
{
    public function index(): View
    {
        return view('admin.reviews', [
            'reviews' => Review::with(['client', 'project'])->latest('submitted_at')->paginate(15),
        ]);
    }
}
