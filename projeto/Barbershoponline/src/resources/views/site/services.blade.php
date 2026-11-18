<x-guest-layout>

    <style>
        .dotted-line {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            padding: 5px 0;
        }

        .dotted-line div {
            background: white;
            padding-right: 8px;
            position: relative;
            z-index: 1;
        }

        .dotted-line span {
            background: white;
            padding-left: 8px;
            position: relative;
            z-index: 1;
        }

        .dotted-line::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            border-top: 2px dotted #000; 
            transform: translateY(-50%);
            z-index: 0;
        }
    </style>
    
    <!--? Hero Start -->
        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 pt-70 text-center">
                                <h2>Services</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Hero End -->
    <!-- Best Pricing Area Start -->
    <div class="best-pricing section-padding2 position-relative">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-7 col-lg-7">
                    <div class="section-tittle mb-50">
                        <span>Os melhores preços</span>
                        <h2>Preçário</h2>
                    </div>
                    <!-- Pricing  -->
                    <div class="row">
                        <div class="col-12">
                            <div class="pricing-list">
                                <ul>
                                    @foreach ($services as $service)
                                        <li class="d-flex justify-content-between dotted-line">
                                            <div>{{ $service->name}}</div>
                                            <span>{{ $service->price}}€</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- pricing img -->
        <div class="pricing-img">
            <img class="pricing-img2" src="assets/site/img/gallery/pricing2.png" alt="">
        </div>
    </div>
    <!-- Best Pricing Area End -->

</x-guest-layout>