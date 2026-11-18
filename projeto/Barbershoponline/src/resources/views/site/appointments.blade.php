<x-guest-layout>

    <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'BarberShopOnline') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
    .caption-border {
        border: 2px solid #2d2d2d;
        border-radius: 10px;
        padding: 15px;
        background-color: rgba(0, 0, 0, 0.91);
        transition: background-color 0.3s ease;
    }
    .caption-border:hover {
        background-color: rgba(197, 128, 38, 0.91);
    }
    </style>

    </head>

   <!--? Hero Start -->
    <div class="slider-area2" style="max-height: 175px">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <section class="home-blog-area section-padding30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">
                    <div class="section-tittle text-center mb-90">
                        <h2>Marcações</h2>
                        <span> 
                            @if ($step == 1)
                                <h3>Escolha o barbeiro!</h3>
                            @elseif ($step == 2)
                                <h3>Escolha a data que deseja marcar!</h3>
                            @elseif ($step == 3)
                                <h3>Escolha o serviço que deseja!</h3>
                            @elseif ($step == 4)
                                <h3>Insira os seus dados!</h3>
                            @endif
                        </span>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                @if ($step == 1)

                    <div class="row justify-content-center g-4">
                        
                        @foreach ($barbers as $barber)
                            @if ($barber->id == 1 || $barber->id == 2)
                                <div class="col-xl-5 col-lg-4 col-md-6 col-sm-">
                                    <div class="single-team mb-80 text-center">
                                        <div class="team-img">
                                            <img src="assets/site/img/gallery/team{{ $barber->id }}.png" alt="Foto do barbeiro" class="img-fluid rounded-circle">
                                        </div>

                                        
                                        <div class="team-caption mt-3">
                                            
                                            <a href="{{ route('site.appointmentsStep2', $barber->id) }}" class="text-white text-decoration-none">
                                            <div class="caption-border">
                                                
                                                <span class="d-block mb-2" style="font-size: 14px; color:rgb(199, 96, 0); font-weight: bold;">
                                                    @if ($barber->id == 1)
                                                        Barbeiro principal
                                                    @elseif ($barber->id == 2)
                                                        Barbeiro secundário
                                                    @endif
                                                </span>

                                                
                                                <h3 class="mb-3" style="font-size: 22px; font-weight: 600; color:rgb(255, 255, 255);">                                           
                                                    {{ $barber->name }}                                    
                                                </h3>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    
                @elseif ($step == 2)

                    @php
                    \Carbon\Carbon::setLocale('pt');


                        // Agrupar por nome do dia da semana em português
                        $groupedAvailabilities = $availabilities->groupBy(function ($availability) {
                                        return \Carbon\Carbon::parse($availability->date)->translatedFormat('l');

                        });

                        // Ordenar os dias da semana corretamente
                        $orderedDays = collect([
                            'segunda-feira',
                            'terça-feira',
                            'quarta-feira',
                            'quinta-feira',
                            'sexta-feira',
                            'sábado',
                            'domingo',
                        ]);
                    @endphp

                    <div class="w-100 text-start mb-5 py-3 d-flex flex-column align-items-start">
                        <span style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; padding: 0.5rem 0; display: inline-block;">
                            {{ $barber->name }}
                        </span>
                    </div>

                    <div class="row justify-content-center">
                        @foreach ($orderedDays as $dayName)
                            @if (isset($groupedAvailabilities[$dayName]))
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
                                    <div class="text-center fw-bold mb-2 text-capitalize">
                                        {{ ucfirst($dayName) }}
                                    </div>

                                    @foreach ($groupedAvailabilities[$dayName] as $availability)
                                        <a class="btn header-btn w-100 mb-2" 
                                        href="{{ route('site.appointmentsStep3', [
                                            $barber->id, 
                                            $availability->id
                                        ]) }}">
                                        {{ \Carbon\Carbon::parse($availability->date)->format('d/m H:i') }}
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                
                @elseif ($step == 3)
                
                    <div class="w-100 text-start mb-5 py-3 d-flex flex-column align-items-start">
                        <span style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; padding: 0.5rem 0; display: inline-block;">
                            {{ $barber->name }} -> {{ $availability->date }}
                        </span>
                    </div>


                    <div class="d-flex justify-content-center flex-wrap">
                        <ul class="list-unstyled mr-5">
                            @foreach ($services->take(ceil($services->count() / 2)) as $service)
                                <li class="mb-2 d-flex justify-content-center">
                                    <a class="btn header-btn px-4 py-6" 
                                        style="min-width: 350px; display: flex; justify-content: space-between; align-items: center;"
                                        href="{{ route('site.appointmentsStep4', [
                                            $barber->id, 
                                            $availability->id,
                                            $service->id
                                        ]) }}">
                                         <span class="text-start">{{ $service->name }}</span>
                                         <span class="text-end">{{ $service->price }} €</span>
                                         </a>
                                </li>
                            @endforeach
                        </ul>

                        <ul>
                            @foreach ($services->skip(ceil($services->count() / 2)) as $service)
                                <li class="mb-2 d-flex justify-content-center">
                                    <a class="btn header-btn px-4 py-6"
                                        style="min-width: 350px; display: flex; justify-content: space-between; align-items: center;"
                                        href="{{ route('site.appointmentsStep4', [
                                            $barber->id, 
                                            $availability->id,
                                            $service->id
                                        ]) }}">
                                        <span class="text-start">{{ $service->name }}</span>
                                        <span class="text-end">{{ $service->price }} €</span>
                                        </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                @elseif ($step == 4)
                
                    <div class="w-100 text-start mb-5 py-3 d-flex flex-column align-items-start">
                        <span style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; padding: 0.5rem 0; display: inline-block;">
                            {{ $barber->name }} -> {{ $availability->date }} -> {{ $service->name }}
                        </span>
                    </div>

                        
                            <div class="container-fluid px-5 d-flex justify-content-center">
                                <form action="{{ route('site.appointmentsStore') }}" method="POST"
                                    class="custom-form p-4 rounded"
                                    style="width: 100%; max-width: 800px; min-height: 350px; padding: 3rem; background-color:rgba(221, 221, 221, 0.6); box-shadow: 0 0 10px rgba(0, 0, 0, 0.38);">

                                    @csrf

                                    <input type="hidden" id="barber_id" name="barber_id" value="{{ $barber->id}}">
                                    <input type="hidden" id="availability_id" name="availability_id" value="{{ $availability->id}}">
                                    <input type="hidden" id="service_id" name="service_id" value="{{ $service->id}}">

                                    <div class="form-group">
                                        <label for="name">Nome</label>
                                        <input type="text"
                                            style="height: 40px; font-size: 1.25rem;"
                                            id="name"
                                            name="name"
                                            class="form-control valid  @error('name') is-invalid @enderror"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name"
                                            value="{{ old('name') }}"
                                            required
                                        >
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Apelido</label>
                                        <input type="text"
                                            style="height: 40px; font-size: 1.25rem;"
                                            id="surname"
                                            name="surname"
                                            class="form-control valid  @error('surname') is-invalid @enderror"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your surname'" placeholder="Enter your surname"
                                            value="{{ old('surname') }}"
                                            required
                                        >
                                        @error('surname')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Contacto</label>
                                        <input type="text"
                                            style="height: 40px; font-size: 1.25rem;"
                                            id="contact"
                                            name="contact"
                                            class="form-control valid  @error('contact') is-invalid @enderror"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your contact'" placeholder="Enter your contact"
                                            value="{{ old('contact') }}"
                                            required
                                        >
                                        @error('contact')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-lg px-8">Marcar</button>
                                    </div>

                                    
                                </form>
                            </div>
                        
                @endif
            
               
            </div>

        </div>
    </section>

</x-guest-layout>