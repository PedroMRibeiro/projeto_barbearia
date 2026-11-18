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

use App\Models\Availability;
use App\Models\Barber;
use Carbon\Carbon;



class AvailabilitiesController extends Controller
{

    public function index(Request $request): View
    {
        $workingDays = config('workdays.days');
        $availabilities = Availability::all();
        $barbers = Barber::all();
        return view('availabilities.index', compact('workingDays', 'availabilities', 'barbers'));
    }


    public function new(Request $request): View
    {
        return view('availabilities.new');
    }



    public function store(Request $request): RedirectResponse
    {
        //Data validation
        $validatedData = $request->validate([
            'barber_id' => 'required|exists:barbers,id',
            'weekday' => 'required|string|max:20',
            'day' => 'required|integer|min:1|max:31',
            'hour' => 'required|date_format:H:i',
            'status' => 'required|boolean',
        ]);

        try {
            // Criando a disponibilidade
            $availability = Availability::create([
                'barber_id' => $validatedData['barber_id'],
                'weekday' => $validatedData['weekday'],
                'day' => $validatedData['day'],
                'hour' => $validatedData['hour'],
                'status' => $validatedData['status'],
            ]);

            if ($availability) {
                //Flash success message
                session()->flash('success', 'Disponibilidade criada com sucesso.');
            } else {
                //Flash failed message
                session()->flash('error', 'Erro ao criar o disponibilidade.');
            }
            return Redirect::route('availabilities.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Ocorreu um erro: ' . $e->getMessage());
        }

        return Redirect::route('availabilities.new');
    }



    public function edit(Availability $availability): View
    {
        return view('availabilities.edit', compact('availability'));
    }



    public function update(Request $request, $id)
    {
          $request->validate([
            'barber_id' => 'required|exists:barbers,id',
            'weekday' => 'required|string|max:20',
            'day' => 'required|integer|min:1|max:31',
            'hour' => 'required|date_format:H:i',
            'status' => 'required|boolean',
        ]);

        $availability = Availability::findOrFail($id);
        $availability->barber_id = $request->barber_id;
        $availability->weekday = $request->weekday;
        $availability->day = $request->day;
        $availability->hour = $request->hour;
        $availability->status = $request->status;
        try{

            $availability->save();

            //Flash message
            Session::flash('success', 'Disponibilidade atualizado com sucesso!');

            return redirect()->route('availabilities.index');
        } catch (\Excepetion $e) {
            session()->flash('error', 'Ocorreu um erro: ' . $e->getMessage());
        }

        return redirect()->route('availabilities.edit');

    }



    public function destroy($id)
    {
        $availability = Availability::findOrFail($id);
        try{

            $availability->delete();

            //Flash message
            Session::flash('success', 'Disponibilidade apagado com sucesso!');

        } catch (\Excepetion $e) {
            session()->flash('error', 'Ocorreu um erro: ' . $e->getMessage());
        }

        return redirect()->route('availabilities.index');

    }



    public function read(Availability $availability): View
    {
        return view('availabilities.edit', compact('availability'));
    }


    
    public function weekplan(Request $request): RedirectResponse
    {
        
        $validatedData = $request->validate([
            'barber_id' => 'required|exists:barbers,id',
            'working_days' => 'required|array|min:1',
            'working_days.*' => 'string',
            'week' => ['required', 'regex:/^\d{4}-W\d{2}$/'], // Correto para o formato YYYY-WXX
        ], [
            'barber_id.required' => 'Selecione um barbeiro.',
            'working_days.required' => 'Por favor, selecione pelo menos um dia de trabalho.',
            'week.required' => 'Por favor, selecione uma semana.',
        ]);
    
        $interval = new \DateInterval('PT30M'); // Intervalo de 30 minutos
    
        // Obtém a semana selecionada (ex: 2025-W07)
        $week = $request->input('week');
        $year = substr($week, 0, 4);   // Ano (ex: 2025)
        $weekNumber = substr($week, 6, 2); // Número da semana (ex: 07)
    
        // Obtém o primeiro dia da semana
        $startOfWeek = Carbon::now()->setISODate($year, $weekNumber)->startOfWeek();
    
        // Gera os dias da semana (de domingo a sábado)
        $daysOfWeek = [];
        for ($i = 0; $i < 7; $i++) {
            $daysOfWeek[] = $startOfWeek->copy()->addDays($i)->format('Y-m-d'); // Correção no formato
        }
    
        // Obtém apenas o barbeiro selecionado
        $barber = Barber::findOrFail($request->barber_id);
        $workDays = $request->input('working_days');
    
        foreach ($workDays as $workDay) {
            list($index, $weekDay) = explode(':', $workDay);
    
            $dateDay = $daysOfWeek[$index];
    
            foreach ($barber->schedules as $schedule) {
                if ($schedule->working_day === $weekDay) {
                    $startTime = new \DateTime($schedule->start_time);
                    $endTime = new \DateTime($schedule->end_time);
    
                    $timeSlot = clone $startTime;
                    while ($timeSlot < $endTime) {
                        $dateString = $dateDay . ' ' . $timeSlot->format('H:i:s');
                        $date = new \DateTime($dateString);
    
                        Availability::create([
                            'barber_id' => $barber->id,
                            'date' => $date,
                        ]);
    
                        $timeSlot->add($interval);
                    }
                }
            }
        }
    
        return redirect()->route('availabilities.index')->with('success', 'Disponibilidades criadas com sucesso!');
    }

}
