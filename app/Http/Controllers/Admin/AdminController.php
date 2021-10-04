<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\addSubsite;
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
            'subsites' => subsite::all()->sortBy('order'),
        ]);
    }


    public function addOrEditSubsiteForm(Request $request)
    {
        $subsiteToEdit = $request->query('subsiteId');

        $subsiteData = new subsite();
        if($subsiteToEdit)
        {
            $subsiteData = subsite::select('name', 'visible', 'order')
            ->firstWhere('id', $subsiteToEdit);
        }

        $orderList = subsite::count('order');
        $orderList++;

        return view('admin.control.addSubsite',[
            'orderList' => $orderList,
            'subsiteData' =>  $subsiteData
        ]);
    }

    public function addSubsite(addSubsite $request)
    {
        $data = $request->validated();

        $orderChangeIfExist = subsite::where('order', $data['subsiteOrder'])
        ->first();

        if($orderChangeIfExist)
        {
            $orderList = subsite::count('order');
            $orderList++;
            $previousOrderItem = $orderChangeIfExist;
            $previousOrderItem->order = $orderList;
            $previousOrderItem->save();
        }

        subsite::create([
            'name' => $data['subsiteName'],
            'visible' => (bool) $data['subsiteVisibility'],
            'order' => (int) $data['subsiteOrder'],
        ]);

        return redirect()
        ->route('admin.subsites')
        ->with('success', 'Dodano podstronę');
    }





}
