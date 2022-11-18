@forelse ($applications as $apl)
    <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="_dash_grid_box">

            @if ($apl->status === 'pending' || $apl->status === 'rejected')
                <div class="_frs_rate_ptop">
                    <button data-application-action="accepted" data-application-id="{{ $apl->id }}"
                        data-toggle="tooltip" data-placement="top" title="Accept" class="_check_accept border-0"><i
                            class="fa fa-check"></i></button>
                </div>
            @endif
            @if ($apl->status === 'pending' || $apl->status === 'accepted')
                <div class="_dash_remove_wrap">
                    <button data-application-action="rejected" data-application-id="{{ $apl->id }}"
                        data-toggle="tooltip" data-placement="top" title="Reject" class="_trash_removeal border-0"><i
                            class="fa fa-x"></i></button>
                </div>
            @endif

            <div class="_dash_grid_box_thumb">
                <img src="{{ $apl->user->images ?? asset('images/avatars/2.png') }}" class="img-fluid circle">
            </div>
            <div class="_dash_grid_box_caption">
                <span class="_elopi_designation">Dev</span>
                <h4 class="_elcio_title">
                    <a href="#">{{ $apl->user->name }}
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
                    <strong>Bid Amount </strong> : ₹{{ $apl->bid_price }}
                </div>
                <div class="_dash_usr_actioned">
                    <strong>Status </strong> : @switch($apl->status)
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
                        {{ $apl->user->email }}
                    </li>
                    <li><button
                            data-bid="{{ json_encode([
                                'bid_price' => $apl->bid_price,
                                'work_letter' => $apl->work_letter,
                                'document' => Storage::url($apl->document),
                            ]) }}"
                            data-toggle="tooltip" data-placement="top" title="View Bid Data"
                            class="_call_now border-0"><i class="fa fa-eye"></i></button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    @empty

        <div class="col-12">
            <div class="alert alert-warning p-4">
                <strong> No Applications</strong>
            </div>
        </div>
    @endforelse
