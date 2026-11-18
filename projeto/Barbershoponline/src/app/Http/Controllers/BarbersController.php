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

use App\Models\Barber;


class BarbersController extends Controller
{
    /**
     * Displays the list of barbers.
     */
    public function index(Request $request): View
    {
        $barbers = Barber::all();
        return view('barbers.index', compact('barbers'));
    }



    /**
     * Displays the forms page.
     * Creates new barber
     */
    public function new(Request $request): View
    {
        return view('barbers.new');
    }



    /**
     * Creates new barber
     */
    public function store(Request $request): RedirectResponse
    {
        //Data validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        try{
            //Creating the barber
            $barber = Barber::create([
                'name' => $validatedData['name'],
                'status' => $validatedData['status'],
            ]);

            if ($barber) {
                return Redirect::route('barbers.index')->with('success', 'Barbeiro criado com sucesso.');
            } else {
                return Redirect::route('barbers.new')->with('error', 'Erro ao criar o barbeiro.');
            }
        } catch (\Exception $e) {
            return Redirect::route('barbers.new')->with('error', 'Ocorreu um erro: ' . $e->getMessage());
        }
    }



    public function edit(Barber $barber): View
    {
        return view('barbers.edit', compact('barber'));
    }



    public function update(Request $request, $id)
    {
          $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $barber = Barber::findOrFail($id);
        $barber->name = $request->name;
        $barber->status = $request->status;

        try {
            if ($barber->save()) {
                return redirect()->route('barbers.index')->with('success', 'Barbeiro atualizado com sucesso!');
            } else {
                return redirect()->route('barbers.edit', $id)->with('error', 'Erro ao atualizar o barbeiro.');
            }
        } catch (\Exception $e) {
            return redirect()->route('barbers.edit', $id)->with('error', 'Ocorreu um erro: ' . $e->getMessage());
        }

    }



    public function destroy($id)
    {
        $barber = Barber::findOrFail($id);

        try {
            if ($barber->delete()) {
                return redirect()->route('barbers.index')->with('success', 'Barbeiro apagado com sucesso!');
            } else {
                return redirect()->route('barbers.index')->with('error', 'Erro ao apagar o barbeiro.');
            }
        } catch (\Exception $e) {
            return redirect()->route('barbers.index')->with('error', 'Ocorreu um erro: ' . $e->getMessage());
        }

    }



    public function read(Barber $barber): View
    {
        return view('barbers.edit', compact('barber'));
    }
}
