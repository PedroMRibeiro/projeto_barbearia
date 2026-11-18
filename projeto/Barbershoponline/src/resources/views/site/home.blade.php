<x-guest-layout>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/phosphor-icons@1.4.2/src/css/icons.css">

        
    </head>

    <!--? slider Area Start-->
        <div class="slider-area position-relative fix">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-9 col-md-11 col-sm-10">
                                <div class="hero__caption">
                                    <span data-animation="fadeInUp" data-delay="0.2s">com Pedro Ribeiro</span>
                                    <h1 data-animation="fadeInUp" data-delay="0.5s">Sinta-se mais elegante</h1>
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-9 col-md-11 col-sm-10">
                                <div class="hero__caption">
                                    <span data-animation="fadeInUp" data-delay="0.2s">com Pedro Ribeiro</span>
                                    <h1 data-animation="fadeInUp" data-delay="0.5s">Sinta-se mais elegante</h1>
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
            <!-- stroke Text -->
            <div class="stock-text">
                <h2>Fique mais confiante</h2>
                <h2>Fique mais confiante</h2>
            </div>
        </div>
    <!-- slider Area End-->
    <!--? Services Area Start -->
        <section class="service-area pb-170">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-11 col-sm-11">
                        <div class="section-tittle text-center mb-90">
                            <span></span>
                            <br></br>
                            <h2>Oferecemos os melhores serviços para você</h2>
                        </div>
                    </div>
                </div>
                <!-- Section caption -->
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-caption text-center mb-30">
                            <div class="service-icon">
                                <i class="bx bx-cut"></i>
                            </div> 
                            <div class="service-cap">
                                <h4><a href="#">Corte de Cabelo</a></h4>
                                <p>Cortes modernos e clássicos para realçar o seu estilo. A nossa equipa garante um visual impecável, combinando técnica e tendência.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-caption active text-center mb-30">
                            <div class="service-icon">
                                <i class='bx bx-knife bx-rotate-180' undefined ></i>
                            </div> 
                            <div class="service-cap">
                                <h4><a href="#">Barba</a></h4>
                                <p>Mantenha a sua barba bem cuidada com os nossos serviços de aparação, hidratação e alinhamento.</p>
                            </div>
                        </div>
                    </div> 
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-caption text-center mb-30">
                            <div class="service-icon">
                                <i class='bx bx-ruler'></i>
                            </div> 
                            <div class="service-cap">
                                <h4><a href="#">Estilização</a></h4>
                                <p>Dê o toque final ao seu visual com modelagem garantindo um penteado duradouro e cheio de personalidade.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Services Area End -->
    <!--? Team Start -->
        <div class="team-area pb-180">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8 col-md-11 col-sm-11">
                        <div class="section-tittle text-center mb-100">
                            <span>Equipa profissional</span>
                            <h2>Os nossos Barbeiros</h2>
                        </div>
                    </div>
                </div>


            <div class="d-flex justify-content-center">
                
                @foreach ($barbers as $barber)
                    @if ($barber->id == 1 || $barber->id == 2)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                            <div class="single-team mb-80 text-center">
                                <div class="team-img">
                                    <img src="assets/site/img/gallery/team{{ $barber->id }}.png" alt="">
                                </div>
                                <div class="team-caption">
                                    <span>
                                        @if ($barber->id == 1)
                                            Barbeiro principal
                                        @elseif ($barber->id == 2)
                                            Barbeiro secundário
                                        @endif
                                    </span>
                                    <h3>
                                        <a href="{{ route('site.appointmentsStep2', $barber->id) }}" class="text-white text-decoration-none">
                                            {{ $barber->name }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div> 
        </div>
    <!-- Team End -->
    <!--? Gallery Area Start -->
        <div class="gallery-area section-padding30">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-7 col-md-9 col-sm-10">
                        <div class="section-tittle text-center mb-100">
                            <span>a nossa galeria de imagens</span>
                            <h2>algumas imagens da nossa barbearia</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="box snake mb-30">
                            <div class="gallery-img " style="background-image: url(assets/site/img/gallery/gallery1.png);"></div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6">
                        <div class="box snake mb-30">
                            <div class="gallery-img " style="background-image: url(assets/site/img/gallery/gallery2.png);"></div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6">
                        <div class="box snake mb-30">
                            <div class="gallery-img " style="background-image: url(assets/site/img/gallery/gallery3.png);"></div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="box snake mb-30">
                            <div class="gallery-img " style="background-image: url(assets/site/img/gallery/gallery4.png);"></div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Gallery Area End -->

   

</x-guest-layout>