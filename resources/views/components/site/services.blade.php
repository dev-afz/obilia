<section class="min-sec">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                <div class="sec-heading">
                    <h2>Featured & Top <span class="theme-cl-2">Services</span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse ($jobs as $job)
                {{-- {{ dd($job) }} --}}
                <div class="col-lg-4 col-md-6 col-sm-12 ">
                    <div class="ser_110">
                        <div class="ser_110_caption">
                            <div class="service__top">
                                <ul class="_requirement_lists">
                                    @forelse ($job->skills as $skill)
                                        <li>
                                            <a href="#">
                                                <span
                                                    class="_elios req_3">{{ $skill->skill->name ?? $skill->other_skill }}<span></span></span>
                                            </a>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                                @auth
                                    <div class="jobs-like bookmark">
                                        <label class="toggler toggler-danger">
                                            <input @checked($job->likes_count) data-like-toggle="{{ $job->id }}"
                                                type="checkbox"><i class="fa fa-heart"></i></label>
                                    </div>
                                @endauth

                                @guest
                                    <div class="jobs-like bookmark">
                                        <label class="toggler toggler-danger">
                                            <input data-uncheckable data-bs-toggle="modal" data-bs-target="#login"
                                                type="checkbox"><i class="fa fa-heart"></i></label>
                                    </div>
                                @endguest
                            </div>
                            <div class="ser_title098">
                                <h4 class="_ser_title"><a href="{{ route('site.job.show', $job->slug) }}">
                                        {{ $job->title }}
                                    </a></h4>
                                <p>
                                    {{ $job->shortDesc }}
                                </p>
                            </div>
                        </div>
                        <div class="ser_110_footer">
                            <div class="_110_foot_left">
                                <div class="_autho098"><img
                                        src="@if ($job->client->image) {{ asset($job->client->image) }} @else {{ asset('site/img/team-1.jpg') }} @endif"
                                        class="img-fluid circle" alt="">
                                    {{-- <img src="site/img/verify.svg" class="verified" width="12" alt=""> --}}
                                </div>
                                <div class="_autho097">
                                    <h5><a href="#">{{ $job->client->name }}</a></h5><span>1 job
                                        Posted<span></span></span>
                                </div>
                            </div>
                            <div class="_110_foot_right">
                                <div class="_oi0po"><i class="fa fa-bolt"></i>From<strong class="theme-cl">
                                        ₹{{ $job->rate_from }} - ₹{{ $job->rate_to }}
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="ser_110">
                        <div class="ser_110_caption">
                            <div class="ser_title098">
                                <h4 class="_ser_title"></h4>No Services Found</h4>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse





        </div>

    </div>
</section>
