<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Contracts\View\View;

class ClientController extends Controller
{
    public function index(): View
    {
        return view('admin.clients', [
            'clients' => Client::withCount(['projects', 'reviews'])->latest()->paginate(15),
        ]);
    }
}
