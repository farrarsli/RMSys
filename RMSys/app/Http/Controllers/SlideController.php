<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Slide;

class SlideController extends Controller
{
    public function managerdashboard()
    {
        $slides = Slide::orderBy('order')->get();

        return view('managerdashboard');
    }
}
