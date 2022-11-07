<section class="gray-light">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                <div class="sec-heading">
                    <h2>Popular Service <span class="theme-cl-2">Category</span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">

            <!-- Single category -->


            @forelse ($categories as $cat)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="small-category-2">

                        <div class="small-category-2-thumb themes-light">
                            <a href="{{ route('site.show-subcategory', $cat->slug) }}">
                                <i>
                                    <img style="border-radius: 50%" height="20" width="20"
                                        src="{{ asset($cat->image) }}" alt="">
                                </i>
                            </a>
                        </div>
                        <div class="sc-2-detail">
                            <h5 class="sc-jb-title"><a
                                    href="{{ route('site.show-subcategory', $cat->slug) }}">{{ $cat->name }}</a></h5>
                        </div>

                    </div>
                </div>

            @empty
            @endforelse


            {{-- <!-- Single category -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="small-category-2">

                    <div class="small-category-2-thumb themes-light">
                        <a href="search.html"><i class="ti-money"></i></a>
                    </div>
                    <div class="sc-2-detail">
                        <h5 class="sc-jb-title"><a href="search.html">Drawing and Illustration</a></h5>
                    </div>

                </div>
            </div>

            <!-- Single category -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="small-category-2">

                    <div class="small-category-2-thumb themes-light">
                        <a href="search.html"><i class="ti-headphone"></i></a>
                    </div>
                    <div class="sc-2-detail">
                        <h5 class="sc-jb-title"><a href="search.html">Digital Design</a></h5>
                    </div>

                </div>
            </div>

            <!-- Single category -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="small-category-2">

                    <div class="small-category-2-thumb themes-light">
                        <a href="search.html"><i class="ti-heart-broken"></i></a>
                    </div>
                    <div class="sc-2-detail">
                        <h5 class="sc-jb-title"><a href="search.html">Infographics & Presentation Design</a></h5>
                    </div>

                </div>
            </div>

            <!-- Single category -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="small-category-2">

                    <div class="small-category-2-thumb themes-light">
                        <a href="search.html"><i class="ti-desktop"></i></a>
                    </div>
                    <div class="sc-2-detail">
                        <h5 class="sc-jb-title"><a href="search.html">Merchandise and Packaging</a></h5>
                    </div>

                </div>
            </div>

            <!-- Single category -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="small-category-2">

                    <div class="small-category-2-thumb themes-light">
                        <a href="search.html"><i class="ti-brush-alt"></i></a>
                    </div>
                    <div class="sc-2-detail">
                        <h5 class="sc-jb-title"><a href="search.html">3D Modelling</a></h5>
                    </div>

                </div>
            </div>

            <!-- Single category -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="small-category-2">

                    <div class="small-category-2-thumb themes-light">
                        <a href="search.html"><i class="ti-car"></i></a>
                    </div>
                    <div class="sc-2-detail">
                        <h5 class="sc-jb-title"><a href="search.html">Architecture and Interior Design</a></h5>
                    </div>

                </div>
            </div>

            <!-- Single category -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="small-category-2">

                    <div class="small-category-2-thumb themes-light">
                        <a href="search.html"><i class="ti-bar-chart-alt"></i></a>
                    </div>
                    <div class="sc-2-detail">
                        <h5 class="sc-jb-title"><a href="search.html">Photoshop Services</a></h5>
                    </div>

                </div>
            </div> --}}

        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="mt-3 text-center">
                    <a href="#" class="_browse_more-2 light">Other Categories</a>
                </div>
            </div>
        </div>

    </div>
</section>
