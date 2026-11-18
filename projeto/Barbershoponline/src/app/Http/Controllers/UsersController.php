<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

use App\Models\User;

class UsersController extends Controller
{
    /**
     * Displays the list of users.
     */
    public function index(Request $request): View
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }



    /**
     * Displays the forms page.
     * Creates new user
     */
    public function new(Request $request): View
    {
        return view('users.new');
    }



    /**
     * Creates new user
     */
    public function store(Request $request): RedirectResponse
    {
        //Data validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        try{
            //Creating the user
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            if ($user) {
                // Flash success message
                Session::flash('success', 'Utilizador criado com sucesso.');
                return Redirect::route('users.index');
            } else {
                // Flash failed message
                Session::flash('error', 'Erro ao criar o utilizador.');
                return Redirect::route('users.new');
            }
        } catch (\Exception $e) {
            Session::flash('error', 'Ocorreu um erro: ' . $e->getMessage());
            return Redirect::route('users.new');
        }
    }



    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }



    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
        ]); 

        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($request->filled('password')) {
            // The password is not empty, process it
            $user->password = Hash::make($request->password);
        }

        try {
            $user->save();

            // Flash success message
            Session::flash('success', 'Utilizador atualizado com sucesso!');
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Ocorreu um erro: ' . $e->getMessage());
            return redirect()->route('users.edit', $user->id);
        }

    }



    public function destroy(User $user)
    {
        try {
            $user->delete();

            // Flash success message
            Session::flash('success', 'Utilizador apagado com sucesso!');
        } catch (\Exception $e) {
            Session::flash('error', 'Ocorreu um erro: ' . $e->getMessage());
        }

        return redirect()->route('users.index');

    }



    public function read(User $user): View
    {
        return view('users.edit', compact('user'));
    }
}
