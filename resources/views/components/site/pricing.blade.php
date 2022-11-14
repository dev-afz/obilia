<section class="min-sec">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                <div class="sec-heading">
                    <h2>Great Price <span class="theme-cl-2">For You</span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($packages as $package)
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="pricing_boxes">
                        <div class="pricing_boxes_header">
                            <div class="pricing_thumb_title">
                                <h4>{{ $package->name }}</h4>
                                <p>{{ $package->title }}</p>
                            </div>
                        </div>
                        <div class="pricing_boxes_middle">
                            <h2 class="pricing_rate">₹{{ $package->price }}</h2>
                            <span class="time_esti">
                                @switch($package->duration)
                                    @case(30)
                                        Per Month
                                    @break

                                    @case(90)
                                        Per Quarter
                                    @break

                                    @case(180)
                                        Per Half Year
                                    @break

                                    @case(365)
                                        Per Year
                                    @break

                                    @default
                                        Not Specified
                                @endswitch
                            </span>
                            <a href="#" class="btn pricing_btn">Get Started</a>
                        </div>
                        <div class="pricing_boxes_detail">
                            <ul class="pricing_lists">
                                @forelse ($package->perks as $perk)
                                    <li>{{ Str::of($perk->name)->replace('_', ' ')->title() }}</li>
                                @empty
                                    <li class="text-danger">No perks available</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
