<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\article;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $articles = article::all();

        return view('layouts.main', [
            'articles' => $articles,
        ]);
    }
}
