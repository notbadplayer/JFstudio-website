<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\addArticle;
use App\Models\article;
use App\Models\subsite;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function get()
    {
        $articles = article::all();

        return view('admin.control.article.articles', [
            'articles' => $articles,
        ]);
    }

    public function addOrEdit(Request $request)
    {
        $articleToEdit = $request->query('articleId');

        $articleData = new article();
        if ($articleToEdit) {
            $articleData = article::with('subsite')
                ->firstWhere('id', $articleToEdit);
        }

        $subsites = subsite::select('name', 'id', 'order') //to tylko do input selecta, tam gdzie przypisujemy artykuł do podstrony
            ->orderBy('order', 'asc')
            ->get();


        $data = Carbon::today()->format('Y-m-d'); //domyślna data publikacji to dzisiaj

        return view('admin.control.article.addOrEditArticle', [
            // 'orderList' => $orderList,
            'articleData' =>  $articleData,
            'subsites' => $subsites,
            'data' => $data,
        ]);
    }

    public function save(addArticle $request)
    {
        $data = $request->validated();

        if ($data['articleId'] == 'add') {
            article::create([
                'title' => $data['articleTitle'],
                'content' => $data['articleContent'],
                'published' => (bool) $data['articleVisibility'],
                //'publishDate' => $data['articleDateFrom'] ?? '',
                'subsite_id' => $data['articleSubsite'],
            ]);

            $message = 'Dodano wpis';
        } else {
            article::find($data['articleId'])
                ->update([
                    'title' => $data['articleTitle'],
                    'content' => $data['articleContent'],
                    'published' => (bool) $data['articleVisibility'],
                    //'publishDate' => $data['articleDateFrom'],
                    'subsite_id' => $data['articleSubsite'],
                ]);

            $message = 'Aktualizowano wpis';
        }

        return redirect()
            ->route('admin.articles')
            ->with('success', $message);
    }

    public function delete(Request $request)
    {
        article::find($request->articleId)->delete();
        return redirect()
            ->route('admin.articles')
            ->with('warning', 'Usunięto wpis.');
    }
}
