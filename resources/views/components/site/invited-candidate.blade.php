@forelse ($invitations as $inv)
    <div data-job-invite="{{ $inv->id }}" class="col-xl-4 col-lg-6 col-md-6">
        <div class="_dash_grid_box">
            <div class="_dash_grid_box_thumb">
                <img src="{{ $inv->user->images ?? asset('images/avatars/2.png') }}" class="img-fluid circle">
            </div>
            <div class="_dash_grid_box_caption">
                <span class="_elopi_designation">SEO Expert</span>
                <h4 class="_elcio_title">
                    <a href="#">{{ $inv->user->name }}
                    </a>
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
                    <strong>Status </strong> : @switch($inv->status)
                        @case('pending')
                            <span class="badge badge-warning ">Pending</span>
                        @break

                        @case('accepted')
                            <span class="badge badge-success ">Accepted</span>
                        @break

                        @case('rejected')
                            <span class="badge badge-danger ">Rejected</span>
                        @break

                        @default
                    @endswitch
                </div>
            </div>
            <div class="_dash_usr_information">
                <ul>
                    <li><i class="fa fa-envelope me-1"></i>
                        {{ $inv->user->email }}
                    </li>
                    {{-- <li><a href="#" data-toggle="tooltip" data-placement="top" title="+91 235 658 4758"
                            class="_call_now"><i class="fa fa-eye"></i></a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
    @empty
        <div class="col-12">
            <div class="alert alert-warning p-4">
                <strong> No Invited Candidates</strong>
            </div>
        </div>
    @endforelse
