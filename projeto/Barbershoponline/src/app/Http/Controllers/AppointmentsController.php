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

use App\Models\Appointment;
use Carbon\Carbon;


class AppointmentsController extends Controller
{
    /**
     * Displays the list of appointments.
     */
    public function index(Request $request): View
    {
        $appointments = Appointment::select('appointments.*')
            ->join('availabilities', 'appointments.availability_id', '=', 'availabilities.id')
            ->orderBy('availabilities.date', 'asc')
            ->with('availability') 
            ->get();
        return view('appointments.index', compact('appointments'));
    }


    /**
     * Displays the forms page.
     * Creates new appointment
     */
    public function new(Request $request): View
    {
        return view('appointments.new');
    }



    /**
     * Creates new appointment
     */
    public function store(Request $request): RedirectResponse
    {
        //Data validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
        ]);

        try{
            //Creating the appointment
            $appointment = Appointment::create([
                'name' => $validatedData['name'],
                'surname' => $validatedData['surname'],
            ]);

            if ($appointment) {
                //Flash success message
                session()->flash('success', 'Marcação criado com sucesso.');
            } else {
                //Flash failed message
                session()->flash('error', 'Erro ao criar a marcação.');
            }
            return Redirect::route('appointments.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Ocorreu um erro: ' . $e->getMessage());
        }

        return Redirect::route('appointments.new');
    }



    public function edit(Appointment $appointment): View
    {
        return view('appointments.edit', compact('appointment'));
    }



    public function update(Request $request, $id)
    {
          $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->name = $request->name;
        $appointment->surname = $request->surname;
        try{

            $appointment->save();

            //Flash message
            Session::flash('success', 'Marcação atualizada com sucesso!');

            return redirect()->route('appointments.index');
        } catch (\Excepetion $e) {
            session()->flash('error', 'Ocorreu um erro: ' . $e->getMessage());
        }

        return redirect()->route('appointments.edit');

    }



    public function destroy($id)
    {
        try {
            $appointment = Appointment::findOrFail($id);
    
            if ($appointment) {
                $appointment->delete();
                // Flash success message
                Session::flash('success', 'Marcação apagada com sucesso!');
            } else {
                // Flash error message
                Session::flash('error', 'Erro ao encontrar a marcação.');
            }
        } catch (\Exception $e) {
            Session::flash('error', 'Ocorreu um erro: ' . $e->getMessage());
        }
    
        return redirect()->route('appointments.index');

    }



    public function read(Appointment $appointment): View
    {
        return view('appointments.edit', compact('appointment'));
    }
}
