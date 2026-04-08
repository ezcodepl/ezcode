<?php

//namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;



use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Portfolio;
class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(10)->get();

        $portfolios = Portfolio::latest()->take(10)->get(); // pobieramy projekty

        // W DashboardController
        return view('admin.dashboard', [
            'posts' => $posts,
            'projects' => $portfolios // zmieniamy nazwę na $projects dla zgodności z widokiem
        ]);
    }
}


