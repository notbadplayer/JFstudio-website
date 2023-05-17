<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\addUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function list(User $user)
    {

        return view('admin.control.user.users', [
            'users' => $user->all(),
        ]);
    }

    public function add()
    {
        return view('admin.control.user.addUser');
    }

    public function save(addUser $request)
    {
        $data = $request->validated();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()
            ->route('admin.users')
            ->with('success', 'Dodano nowego użytkownika');
    }

    public function changePassword(Request $request)
    {
        //pierwsze wejście do funkcji, zwrócenie widoku formularza zmiany hasła
        if ($request->isMethod('get')) {
            $userId = $request->query('userId');

            return view('admin.control.user.changePassword', [
                'userId' => $userId,
            ]);
        }

        //drugie wejście do funkcji, zwrotka z formularza wysłana postem, akcja zmiany hasła
        else {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::where('id', $request->userId)->first();
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()
                ->route('admin.mainpage')
                ->with('success', 'Zmieniono hasło');
        }
    }
}
