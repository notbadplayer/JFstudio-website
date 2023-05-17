<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function contact(Request $request)
    {
        if($request->ismethod('get'))
        {
            $contactData = DB::table('contactdata')->first();

            return view('admin.control.contact', [
                'contactData' => $contactData
            ]);
        }

        else
        {
            $request->validate([
                'title' => ['required', 'max:100'],
                'description' => ['required', 'max:250'],
                'adress' => ['required', 'max:150'],
                'email' => ['required', 'max:150', 'email'],
                'phone' => ['required', 'max:20'],
                'header_image' => ['nullable', 'file', 'image'],
            ]);

            if($request->file('header_image'))
            {

                $headerImage = $request->file('header_image');
                $headerName = $headerImage->getClientOriginalName();

                $headerImage->storeAs('headers', $headerName);
                DB::table('contactdata')
                ->take(1)
                ->update([
                    'header_image' => $headerName
                ]);

            }

            DB::table('contactdata')
            ->take(1)
            ->update([
                'title' => $request->title,
                'description' => $request->description,
                'adress' => $request->adress,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);



            return redirect()
            ->route('admin.mainpage')
            ->with('success', 'Aktualizowano dane kontaktowe');
        }

    }
}
