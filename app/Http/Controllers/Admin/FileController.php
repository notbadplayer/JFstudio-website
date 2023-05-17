<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function list()
    {
        return view('admin.control.files.files', [
            'files' => Storage::listContents(),
        ]);
    }

    public function delete(Request $request)
    {
        Storage::delete($request->fileName);

        return redirect()
            ->route('admin.files')
            ->with('warning', 'Usunięto plik.');
    }
}
