<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\subsite;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(?subsite $subsite = null)
    {
        $subsites = subsite::visible()->orderBy('order')
            ->get();

        $contactData = DB::table('contactdata')->first();

        if (isset($subsite)) {

            $articles = article::published()
                ->where('subsite_id', '=', $subsite->id)
                ->get();

            $data = [
                'articles' => $articles,
                'header_image' => $subsite->header_image ?? $contactData->header_image,
                'title' => $subsite->title ?? '',
                'description' => $subsite->description ?? '',
                'contactData' => $contactData,
                'subsites' => $subsites,
            ];
        } else {

            $articles = article::published()
                ->where('subsite_id', '=', '1')
                ->get();

                $data = [
                    'articles' => $articles,
                    'header_image' => $contactData->header_image,
                    'title' => $contactData->title ?? '',
                    'description' => $contactData->description ?? '',
                    'contactData' => $contactData,
                    'subsites' => $subsites,
                ];
        }

        return view('layouts.main', $data);
    }

}
