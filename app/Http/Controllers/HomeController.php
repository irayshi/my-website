<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('site.home', [
            'github' => 'https://github.com/irayshi',
            'instagram' => 'https://instagram.com/raffi_irayshi',
            'linkedin' => 'https://www.linkedin.com/in/irayshi',
            'whatsapp' => 'https://wa.me/6282295652430',
            'email' => 'mailto:shadowlight061@gmail.com'
        ]);
    }
}
