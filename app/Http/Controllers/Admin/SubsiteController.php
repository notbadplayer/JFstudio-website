<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\addSubsite;
use App\Models\subsite;
use Illuminate\Http\Request;

class SubsiteController extends Controller
{
    public function get()
    {
        return view('admin.control.subsite.subsites', [
            'subsites' => subsite::all()->sortBy('order'),
        ]);
    }

    public function addOrEdit(Request $request)
    {
        $subsiteToEdit = $request->query('subsiteId');

        $subsiteData = new subsite();
        if ($subsiteToEdit) {
            $subsiteData = subsite::select('name', 'visible', 'order', 'id')
                ->firstWhere('id', $subsiteToEdit);
        }

        $orderList = subsite::count('order');
        $orderList++;

        return view('admin.control.subsite.addOrEditSubsite', [
            'orderList' => $orderList,
            'subsiteData' =>  $subsiteData
        ]);
    }

    public function save(addSubsite $request)
    {
        $data = $request->validated();

        $orderChangeIfExist = subsite::where('order', $data['subsiteOrder'])
            ->first();

        if ($orderChangeIfExist) //zmiana kolejności podstrony, jeśli kolejność którą wybraliśmy jest zajęta
        {
            $orderList = subsite::count('order');
            $orderList++;
            $previousOrderItem = $orderChangeIfExist;
            $previousOrderItem->order = $orderList;
            $previousOrderItem->save();
        }

        if ($data['subsiteId'] == 'add') //dane z ukrytego pola formularza, decydujemy czy dodajemy wpis czy edytujemy
        {
            subsite::create([
                'name' => $data['subsiteName'],
                'visible' => (bool) $data['subsiteVisibility'],
                'order' => (int) $data['subsiteOrder'],
            ]);

            $message = 'Dodano podstronę';
        } else {
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

    public function delete(Request $request)
    {
        subsite::find($request->subsiteId)->delete();
        return redirect()
            ->route('admin.subsites')
            ->with('warning', 'Usunięto podstronę.');
    }
}
