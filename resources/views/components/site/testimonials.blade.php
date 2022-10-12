<section class="light-w">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                <div class="sec-heading">
                    <h2>What People <span class="theme-cl-2">Saying</span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="owl-carousel owl-theme middle-arrow-hover" id="testemonial-slide">

                    <!-- Single Review -->
                    <div class="item">
                        <div class="smart-testimonials">
                            <div class="smart-testi-thumb">
                                <img src="site/img/r-1.jpg" class="img-fluid" alt="" />
                                <span class="cipt bg-success"><i class="fa fa-quote-left"></i></span>
                            </div>
                            <div class="smart-testimonials-content">
                                <div class="smart-tes-content">
                                    <p>At vero eos et accusamus et iusto odiopri dignissimos ducimus qui expedita
                                        distinctio praesentium voluptatum.</p>
                                </div>
                                <div class="st-author-info">
                                    <h4 class="st-author-title">Adam Gilkrist</h4>
                                    <span class="st-author-subtitle theme-cl">CEO & Founder</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Review -->
                    <div class="item">
                        <div class="smart-testimonials">
                            <div class="smart-testi-thumb">
                                <img src="site/img/r-2.jpg" class="img-fluid" alt="" />
                                <span class="cipt bg-purple"><i class="fa fa-quote-left"></i></span>
                            </div>
                            <div class="smart-testimonials-content">
                                <div class="smart-tes-content">
                                    <p>At vero eos et accusamus et iusto odiopri dignissimos ducimus qui expedita
                                        distinctio praesentium voluptatum.</p>
                                </div>
                                <div class="st-author-info">
                                    <h4 class="st-author-title">Lilly Wikdoner</h4>
                                    <span class="st-author-subtitle theme-cl">Content Writer</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Review -->
                    <div class="item">
                        <div class="smart-testimonials">
                            <div class="smart-testi-thumb">
                                <img src="site/img/r-3.jpg" class="img-fluid" alt="" />
                                <span class="cipt bg-danger"><i class="fa fa-quote-left"></i></span>
                            </div>
                            <div class="smart-testimonials-content">
                                <div class="smart-tes-content">
                                    <p>At vero eos et accusamus et iusto odiopri dignissimos ducimus qui expedita
                                        distinctio praesentium voluptatum.</p>
                                </div>
                                <div class="st-author-info">
                                    <h4 class="st-author-title">Subhas Rajpoot</h4>
                                    <span class="st-author-subtitle theme-cl">Team Leader</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Review -->
                    <div class="item">
                        <div class="smart-testimonials">
                            <div class="smart-testi-thumb">
                                <img src="site/img/r-4.jpg" class="img-fluid" alt="" />
                                <span class="cipt bg-primary"><i class="fa fa-quote-left"></i></span>
                            </div>
                            <div class="smart-testimonials-content">
                                <div class="smart-tes-content">
                                    <p>At vero eos et accusamus et iusto odiopri dignissimos ducimus qui expedita
                                        distinctio praesentium voluptatum.</p>
                                </div>
                                <div class="st-author-info">
                                    <h4 class="st-author-title">Pooja Mithali</h4>
                                    <span class="st-author-subtitle theme-cl">Graphic Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

@push('component-scripts')
    <script>
        $('#testemonial-slide').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: true,
            navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    autoplay: true
                },
                600: {
                    items: 2,
                    autoplay: true
                },
                1000: {
                    items: 3,
                    autoplay: true
                },
                1280: {
                    items: 3,
                    autoplay: true
                }
            }
        })
    </script>
@endpush
