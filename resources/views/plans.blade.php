<x-app-layout>
   

    <!-- Subscription -->

<div class="slider-area2">
    <div class="slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap hero-cap2 pt-70">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->
<!-- Courses area start -->
<section class="pricing-area section-padding30 fix">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section-tittle text-center mb-55">
                    <h3>Pricing</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach( $plans as $items)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="properties mb-30">
                    <div class="properties__card">
                        <div class="about-icon">
                            <img src="{{asset ('/assets/icon/price.svg')}}" alt="">
                        </div>
                        <div class="properties__caption">
                    <span class="month">{{$items -> name}}</span>
                            <p class="mb-25">₱{{$items -> price}}.00 <span>(Single class)</span></p>
                            <div class="single-features">
                                <div class="features-icon">
                                    <img src="{{asset ('/assets/icon/check.svg')}}" alt="">
                                </div>
                                <div class="features-caption">
                                    <p>Free riding </p>
                                </div>
                            </div>
                            <div class="single-features">
                                <div class="features-icon">
                                    <img src="{{asset ('/assets/icon/check.svg')}}" alt="">
                                </div>
                                <div class="features-caption">
                                    <p>Unlimited equipments</p>
                                </div>
                            </div>
                            <div class="single-features">
                                <div class="features-icon">
                                    <img src="{{asset ('/assets/icon/check.svg')}}" alt="">
                                </div>
                                <div class="features-caption">
                                    <p>Personal trainer</p>
                                </div>
                            </div>
                            <div class="single-features">
                                <div class="features-icon">
                                    <img src="{{asset ('/assets/icon/check.svg')}}" alt="">
                                </div>
                                <div class="features-caption">
                                    <p>Weight losing classes</p>
                                </div>
                            </div>
                            <div class="single-features mb-20">
                                <div class="features-icon">
                                    <img src="{{asset ('/assets/icon/check.svg')}}" alt="">
                                </div>
                                <div class="features-caption">
                                <p>Saves ₱300.00</p>
                                </div>
                            </div>
                            <a href="{{ route('plans.show', $items->slug) }}" class="border-btn border-btn2">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


</x-app-layout>