<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Service;
use App\Models\Availability;
use App\Models\Barber;
use App\Models\Appointment;
use Carbon\Carbon;


class SiteController extends Controller
{
    /**
     * Displays the Home Page.
     */
    public function home(Request $request): View
    {
        $barbers = Barber::where('status', 1)->get(); 
        return view('site.home', compact('barbers'));
    
    }

    
    /**
     * Displays the About Page.
     */
    public function about(): View
    {
        return view('site.about');
    }

    /**
     * Displays the Services Page.
     */
    public function services(Request $request): View
    {
        $services = Service::where('status', 1)->get();
        return view('site.services', compact('services'));
    }


    /**
     * Displays the Contacts Page.
     */
    public function contacts(): View
    {
        return view('site.contacts');
    }



    /**
     * Displays the Appointments Page.
     */
    public function appointmentsStep1(): View
    {
        $step = 1;
        $barbers = Barber::where('status', 1)->get();
        return view('site.appointments', compact('step', 'barbers'));
    }


    /**
     * Displays the Appointments Page.
     */
    public function appointmentsStep2(Barber $barber): View
    {

        $step = 2;
        $availabilities = Availability::where('barber_id', $barber->id)
                                    ->where('status', 1)
                                    ->orderBy('availabilities.date', 'asc')
                                    ->get();
        return view('site.appointments', compact('step', 'barber', 'availabilities'));
    }

    
    /**
     * Displays the Appointments Page.
     */
    public function appointmentsStep3(Barber $barber, Availability $availability ): View
    {
        $step = 3;
        $services = Service::where('status', 1)->get();
        return view('site.appointments', compact('step','barber', 'availability', 'services'));
    }

    /**
     * Displays the Appointments Page.
     */
    public function appointmentsStep4(Barber $barber, Availability $availability, Service $service ): View
    {
        $step = 4;
        return view('site.appointments', compact('step', 'barber', 'availability', 'service'));
    }

    /**
     * Creates new appointment
     */
    public function appointmentsStore(Request $request): RedirectResponse
    {
        //Data validation
        $validatedData = $request->validate([
            'barber_id' => 'required|exists:barbers,id',
            'availability_id' => 'required|exists:availabilities,id',
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
        ]);

        try{
            //Creating the appointment
            $appointment = Appointment::create([
                'barber_id' => $validatedData['barber_id'],
                'availability_id' => $validatedData['availability_id'],
                'service_id' => $validatedData['service_id'],
                'name' => $validatedData['name'],
                'surname' => $validatedData['surname'],
                'contact' => $validatedData['contact'],
            ]);

            if ($appointment) {

                $availability = Availability::where('id', $validatedData['availability_id'])->first();
                $availability->status = 0;
                $availability->save();
                
                //Flash success message
                session()->flash('success', 'Marcação criado com sucesso.');
                
                return Redirect::route('site.appointment', ($appointment->id));
            } else {
                //Flash failed message
                session()->flash('error', 'Erro ao criar a marcação.');
            }

        } catch (\Exception $e) {
            session()->flash('error', 'Ocorreu um erro: ' . $e->getMessage());
        }

        return Redirect::route('site.appointmentsStep1');
    }


    /**
     * Displays the Appointment Page.
     */
    public function appointment(Appointment $appointment): View
    {
        return view('site.appointment', compact('appointment'));
    }


    public function privacy(): View
    {
        return view('footer.privacy');
    }


    public function term(): View
    {
        return view('footer.term');
    }


    public function cookie(): View
    {
        return view('footer.cookie');
    }
}
