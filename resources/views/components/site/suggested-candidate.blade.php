@forelse ($candidates as $c)
    <div data-candidate-suggetion="{{ $c->id }}" class="col-xl-4 col-lg-6 col-md-6 ">
        <div class="_dash_grid_box">
            <div class="_dash_grid_box_thumb">
                <img src="{{ $c->images ?? asset('images/avatars/2.png') }}" class="img-fluid circle">
            </div>
            <div class="_dash_grid_box_caption">
                <span class="_elopi_designation">Flutter Expert</span>
                <h4 class="_elcio_title">
                    <a href="#">{{ $c->name }}</a>
                </h4>
                <div class="_dash_usr_rates">
                    {{-- <span class="good">4.5</span> --}}
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <div class="_dash_usr_actioned">
                    <a class="btn btn-sm btn-success ">View
                        Profile</a>
                </div>
            </div>
            <div class="_dash_usr_information">
                <ul>
                    <li><i class="fa fa-envelope me-1"></i>
                        {{ $c->email }}
                    </li>
                    <li>
                        <button data-invite-candidate="{{ $c->id }}"
                            class="btn btn-sm btn-success ">Invite</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@empty

    <div class="col-12">
        <div class="alert alert-warning p-4">
            <strong> No Suggested Candidates</strong>
        </div>
    </div>
@endforelse
