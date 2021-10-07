<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\addArticle;
use App\Http\Requests\addSubsite;
use App\Models\article;
use App\Models\subsite;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.main');
    }

    public function subsites()
    {
        return view('admin.control.subsites', [
            'subsites' => subsite::all()->sortBy('order'),
        ]);
    }


    public function addOrEditSubsiteForm(Request $request)
    {
        $subsiteToEdit = $request->query('subsiteId');

        $subsiteData = new subsite();
        if($subsiteToEdit)
        {
            $subsiteData = subsite::select('name', 'visible', 'order', 'id')
            ->firstWhere('id', $subsiteToEdit);
        }

        $orderList = subsite::count('order');
        $orderList++;

        return view('admin.control.addOrEditSubsite',[
            'orderList' => $orderList,
            'subsiteData' =>  $subsiteData
        ]);
    }

    public function saveSubsite(addSubsite $request)
    {
        $data = $request->validated();

        $orderChangeIfExist = subsite::where('order', $data['subsiteOrder'])
        ->first();

        if($orderChangeIfExist) //zmiana kolejności podstrony, jeśli kolejność którą wybraliśmy jest zajęta
        {
            $orderList = subsite::count('order');
            $orderList++;
            $previousOrderItem = $orderChangeIfExist;
            $previousOrderItem->order = $orderList;
            $previousOrderItem->save();
        }

        if($data['subsiteId'] == 'add') //dane z ukrytego pola formularza, decydujemy czy dodajemy wpis czy edytujemy
        {
            subsite::create([
                'name' => $data['subsiteName'],
                'visible' => (bool) $data['subsiteVisibility'],
                'order' => (int) $data['subsiteOrder'],
            ]);

            $message = 'Dodano podstronę';
        }

        else
        {
            subsite::find($data['subsiteId'])
            ->update([
                'name' => $data['subsiteName'],
                'visible' => (bool) $data['subsiteVisibility'],
                'order' => (int) $data['subsiteOrder'],
            ]);

            $message = 'Aktualizowano';
        }

        return redirect()
        ->route('admin.subsites')
        ->with('success', $message);
    }

    public function deleteSubsite(Request $request)
    {
       subsite::find($request->subsiteId)->delete();
       return redirect()
        ->route('admin.subsites')
        ->with('warning', 'Usunięto podstronę.');
    }


    public function articles(Request $request)
    {

        $articles = article::all();

        return view('admin.control.articles', [
            'articles' => $articles,
        ]);

    }


    public function addOrEditArticleForm(Request $request)
    {
        $articleToEdit = $request->query('articleId');

        $articleData = new article();
        if($articleToEdit)
        {
            $articleData = article::with('subsite')
            ->firstWhere('id', $articleToEdit);
        }

        // $orderList = subsite::count('order');
        // $orderList++;

        $subsites = subsite::select('name', 'id', 'order') //to tylko do input selecta, tam gdzie przypisujemy artykuł do podstrony
            ->orderBy('order', 'asc')
            ->get();


        $data = Carbon::today()->format('Y-m-d'); //domyślna data publikacji to dzisiaj

        return view('admin.control.addOrEditArticle',[
            // 'orderList' => $orderList,
             'articleData' =>  $articleData,
             'subsites' => $subsites,
             'data' => $data,
        ]);
    }

    public function saveArticle(addArticle $request)
    {
        $data = $request->validated();

        if($data['articleId'] == 'add')
        {
            article::create([
                'title' => $data['articleTitle'],
                'content' => $data['articleContent'],
                'published' => (bool) $data['articleVisibility'],
                'publishDate' => $data['articleDateFrom'],
                'subsite_id' => $data['articleSubsite'],
            ]);

            $message = 'Dodano wpis';
        }

        else
        {
            article::find($data['articleId'])
            ->update([
                'title' => $data['articleTitle'],
                'content' => $data['articleContent'],
                'published' => (bool) $data['articleVisibility'],
                'publishDate' => $data['articleDateFrom'],
                'subsite_id' => $data['articleSubsite'],
            ]);

            $message = 'Aktualizowano wpis';
        }

        return redirect()
        ->route('admin.articles')
        ->with('success', $message);
    }


}
