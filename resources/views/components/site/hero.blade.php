<div class="hero-banner full jumbo-banner" style="background:#ffffff url(site/img/bg2.png);">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-7 col-md-8">
                {{-- <a href="#" class="header-promo w-inline-block">
                    <div class="label">NEW</div>
                    <div class="header-promo-text">Klioeo is now UK-Wide</div>
                </a> --}}
                <h1>Hire Experts Freelancers in Your City!</h1>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore.</p>
                <form class="search-big-form banner-search shadow mt-3">
                    <div class="row m-0">
                        <div class="col-lg-5 col-md-5 col-sm-12 p-0">
                            <div class="form-group">
                                <i class="ti-search"></i>
                                <input type="text" class="form-control b-0 b-r l-radius"
                                    placeholder="Job Title or Keywords">
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-4 col-sm-12 p-0">
                            <div class="form-group">
                                <i class="ti-search"></i>
                                <select id="jb-category" class="js-states form-control b-0">
                                    <option value="">&nbsp;</option>
                                    @forelse ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-3 col-sm-12 p-0">
                            <button type="button" class="btn theme-bg full-width r-radius">Search</button>
                        </div>
                    </div>
                </form>
                <div class="featured-category light">
                    <ul>
                        <li>Browse Category:</li>
                        @forelse ($categories as $cat)
                            <li><a href="#" data-toggle="tooltip"
                                    data-original-title="{{ $cat->name }}">{{ $cat->name }}</a>
                            </li>
                        @empty
                        @endforelse

                    </ul>
                </div>
            </div>

            <div class="col-lg-5 col-md-4">
                <img src="site/img/side-img.png" alt="latest property" class="img-fluid">
            </div>

        </div>
    </div>
</div>
