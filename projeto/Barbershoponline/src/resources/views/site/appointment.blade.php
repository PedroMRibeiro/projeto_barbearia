<x-guest-layout>

    <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'BarberShopOnline') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
                <div class="col-12">
                    <div class="section-tittle text-center mb-90">
                        <h2>Marcação efetuada com sucesso</h2>                   
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <table class="appointment-table mx-auto" style="max-width: 600px; width: 100%;">
                        <thead>
                            <tr>
                                <th colspan="2" class="title" style="text-align: center;">
                                    BarberShopOnline
                                    <br>
                                    <span class="date" style="font-size: 1.4rem; color: rgba(197, 128, 38, 0.91);">
                                        {{ $appointment->availability->date }}
                                    </span>
                                    <br>
                                    <span>
                                        <img src="{{ asset('assets/site/img/logo/logo7.png') }}" alt="Logo BarberShopOnline" style="width: 100px; height: auto; max-width: none; margin-top: 8px;">
                                    </span>
                                    <br>
                        <div class="d-flex justify-content-center gap-3 mt-3">
                            <a href="{{ route('site.home')}}"><button type="button" class="btn btn-lg px-5">
                                Voltar à pagina principal
                            </button></a>
                            &nbsp&nbsp
                            <button type="button" class="btn btn-lg px-5" data-bs-toggle="modal" data-bs-target="#detailsModal{{ $appointment->id }}">
                                Ver detalhes da marcação
                            </button>
                        </div>
                                </th>
                            </tr>
                        </thead>
                    </table>
                    <style>
                        .appointment-table {
                            border-collapse: separate !important;
                            border-spacing: 0;
                            border: 1px solid rgba(32, 32, 32, 0.19);
                            border-radius: 8px;
                            overflow: hidden;
                            background-color: #fff;
                            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                            text-align: center;
                            color: #333;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.38);
                            margin-bottom: 2rem;
                        }

                        .appointment-table thead th.title {
                            font-size: 1.8rem;
                            font-weight: 700;
                            padding: 18px 0;
                            border-bottom: 2px solid rgba(32, 32, 32, 0.19);
                            color: rgba(0, 0, 0, 0.91);
                        }

                    </style>
                </div>
            </div>

            
            <!-- Modal de Detalhes -->
            <div class="modal fade" id="detailsModal{{ $appointment->id }}" tabindex="-1" aria-labelledby="detailsModalLabel{{ $appointment->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="detailsModalLabel{{ $appointment->id }}">Detalhes da Marcação</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex flex-column align-items-center text-center">
                            <span style="border-bottom: 1px solid #ccc; padding: 0.5rem 0; display: inline-block;">
                                {{ $appointment->name }} {{ $appointment->surname }}
                            </span>
                            <span style="border-bottom: 1px solid #ccc; padding: 0.5rem 0; display: inline-block;">
                                {{ $appointment->contact }}
                            </span>
                            <span style="border-bottom: 1px solid #ccc; padding: 0.5rem 0; display: inline-block;">
                                {{ $appointment->barber->name }} barber
                            </span>
                            <span>
                                {{ $appointment->service->name }}
                            </span>

                        </div>

                        <div class="modal-footer d-flex justify-content-between w-100">
                            <span class="fw-bold">
                                Total: {{ $appointment->service->price }} €
                            </span>
                            <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</x-guest-layout>