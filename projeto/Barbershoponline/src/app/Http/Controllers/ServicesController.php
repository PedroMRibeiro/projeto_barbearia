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

use App\Models\Service;

class ServicesController extends Controller
{
    /**
     * Displays the list of services.
     */
    public function index(Request $request): View
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }



    /**
     * Displays the forms page.
     * Creates new service
     */
    public function new(Request $request): View
    {
        return view('services.new');
    }



    /**
     * Creates new service
     */
    public function store(Request $request): RedirectResponse
    {
        //Data validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'status' => 'required|boolean',
        ]);

        try{
            //Creating the service
            $service = Service::create([
                'name' => $validatedData['name'],
                'price' => $validatedData['price'],
                'status' => $validatedData['status'],
            ]);

            if ($service) {
                // Flash success message
                Session::flash('success', 'Serviço criado com sucesso.');
                return Redirect::route('services.index');
            } else {
                // Flash failed message
                Session::flash('error', 'Erro ao criar o serviço.');
                return Redirect::route('services.new');
            }
        } catch (\Exception $e) {
            Session::flash('error', 'Ocorreu um erro: ' . $e->getMessage());
            return Redirect::route('services.new');
        }
    }



    public function edit(Service $service): View
    {
        return view('services.edit', compact('service'));
    }



    public function update(Request $request, $id)
    {
          $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'status' => 'required|boolean',
        ]);

        $service = Service::findOrFail($id);
        $service->name = $request->name;
        $service->price = $request->price;
        $service->status = $request->status;
        try {
            $service->save();

            // Flash success message
            Session::flash('success', 'Serviço atualizado com sucesso!');
            return redirect()->route('services.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Ocorreu um erro: ' . $e->getMessage());
            return redirect()->route('services.edit', $id);
        }

    }



    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        try {
            $service->delete();

            // Flash success message
            Session::flash('success', 'Serviço apagado com sucesso!');
        } catch (\Exception $e) {
            Session::flash('error', 'Ocorreu um erro: ' . $e->getMessage());
        }

        return redirect()->route('services.index');

    }



    public function read(Service $service): View
    {
        return view('services.edit', compact('service'));
    }
}
