<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\addSubsite;
use App\Http\Requests\ChangeSubsiteName;
use App\Models\article;
use App\Models\subsite;
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
            'subsites' => subsite::all(),
        ]);
    }

    public function addSubsite(addSubsite $request)
    {
        $orderList = subsite::count('order');
        $orderList++;

        if ($request->isMethod('GET'))
        {
        return view('admin.control.addSubsite',[
            'orderList' => $orderList,
        ]);
        }

    }

    public function subsitesChangeName(ChangeSubsiteName $request)
    {
      $data = $request->validated();
      dd($data);
    }



}
