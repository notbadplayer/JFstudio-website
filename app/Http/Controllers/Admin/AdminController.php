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


}
