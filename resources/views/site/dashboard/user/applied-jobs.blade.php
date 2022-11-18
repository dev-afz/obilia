<x-site.layout title="Applied Jobs" :include="['menu']">
    <x-site.navbar class="light" />

    <x-site.dashboard.body>



        <div class="col-lg-12 col-md-12 col-sm-12">

            <!-- Single Wrap -->
            <div class="_dashboard_content">
                <div class="_dashboard_content_header">
                    <div class="_dashboard__header_flex">
                        <h4><i class="ti-briefcase me-1"></i>Manage Applied Jobs</h4>
                    </div>
                </div>

                <div class="_dashboard_content_body p-0">
                    <div class="_dashboard_list_group">

                        @forelse ($jobs as $apl)
                            <div class="_dash_singl_box">
                                <div class="_dash_singl_captions">
                                    <h4 class="_jb_title">
                                        <a
                                            href="{{ route('site.user.jobs.details', $apl->id) }}">{{ $apl->job->title }}</a>

                                        {{-- <span class="_dash_status approval">pending Approval</span> --}}



                                    </h4>
                                    <ul class="_grouping_list">
                                        <li><span><i class="ti-location-pin"></i>{{ $apl->job->country }}</span></li>
                                        <li><span><i
                                                    class="ti-credit-card"></i>{{ '₹' . $apl->job->rate_from . ' - ₹' . $apl->job->rate_to }}</span>
                                        </li>
                                        {{-- <li><span><i class="ti-timer"></i>Expiring on 10 Feb</span></li> --}}
                                    </ul>

                                </div>
                                <ul class="_action_grouping_list d-flex">

                                    @if ($apl->status == 'pending')
                                        <span
                                            class="badge bg-warning bg-light-warning text-white">{{ $apl->status }}</span>
                                    @elseif ($apl->status == 'active')
                                        <span
                                            class="badge bg-success bg-light-success text-white">{{ $apl->status }}</span>
                                    @elseif ($apl->status == 'completed')
                                        <span
                                            class="badge bg-primary bg-light-primary text-white">{{ $apl->status }}</span>
                                    @elseif ($apl->status == 'cancelled')
                                        <span
                                            class="badge bg-danger bg-light-danger text-white">{{ $apl->status }}</span>
                                    @endif
                                </ul>
                            </div>

                        @empty

                            <div class="_dash_singl_box">
                                <div class="_dash_singl_captions text-center">
                                    <h4 class="_jb_title text-danger">No Application Found</h4>
                                </div>
                            </div>
                        @endforelse


                    </div>
                </div>
            </div>
            <!-- Single Wrap End -->

        </div>


    </x-site.dashboard.body>
</x-site.layout>
