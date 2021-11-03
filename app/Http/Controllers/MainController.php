<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\subsite;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $articles = article::published()
        ->get();

        $subsites = subsite::visible()
        ->get();

        $contactData = DB::table('contactData')->first();



        return view('layouts.main', [
            'subsites' => $subsites,
            'articles' => $articles,
            'contactData' => $contactData
        ]);
    }
}
