<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class LocalizationController extends Controller
{
    //
    public function index($locale) {
        App::setLocale($locale);

        // Store the locale in session so that the middleware can register it 
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
