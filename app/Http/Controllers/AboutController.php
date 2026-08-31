<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AboutController extends Controller
{
    /**
     * Menampilkan halaman tentang kami.
     */
    public function __invoke(): View
    {
        return view('about');
    }
}
