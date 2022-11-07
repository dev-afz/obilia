<x-site.layout title="Dashboard" :include="['menu']">
    <x-site.navbar class="light" />

    <x-site.dashboard.body>

        <div class="col-lg-12 col-md-12 col-sm-12">

            <!-- Single Wrap -->
            <div class="_dashboard_content">
                <div class="_dashboard_content_header">
                    <div class="_dashboard__header_flex">
                        <h4><i class="ti-briefcase me-1"></i>Manage Jobs</h4>
                    </div>
                </div>

                <div class="_dashboard_content_body p-0">
                    <div class="_dashboard_list_group">

                        @forelse ($jobs as $job)
                            <div class="_dash_singl_box">
                                {{-- <div class="_dash_singl_thumbs">
                                    <img src="assets/img/c-1.png" class="img-fluid" alt="">
                                </div> --}}
                                <div class="_dash_singl_captions">
                                    <h4 class="_jb_title"><a href="#">{{ $job->title }}</a>

                                        {{-- <span class="_dash_status approval">pending Approval</span> --}}
                                        @if ($job->status == 'pending')
                                            <span
                                                class="badge bg-warning bg-light-warning text-white">{{ $job->status }}</span>
                                        @elseif ($job->status == 'active')
                                            <span
                                                class="badge bg-success bg-light-success text-white">{{ $job->status }}</span>
                                        @elseif ($job->status == 'completed')
                                            <span
                                                class="badge bg-primary bg-light-primary text-white">{{ $job->status }}</span>
                                        @elseif ($job->status == 'cancelled')
                                            <span
                                                class="badge bg-danger bg-light-danger text-white">{{ $job->status }}</span>
                                        @endif


                                    </h4>
                                    <ul class="_grouping_list">
                                        <li><span><i class="ti-location-pin"></i>{{ $job->country }}</span></li>
                                        <li><span><i
                                                    class="ti-credit-card"></i>{{ '₹' . $job->rate_from . ' - ₹' . $job->rate_to }}</span>
                                        </li>
                                        {{-- <li><span><i class="ti-timer"></i>Expiring on 10 Feb</span></li> --}}
                                    </ul>

                                </div>
                                <ul class="_action_grouping_list d-flex">
                                    <li><a href="#" class="_aaplied_candidates">Applied<span>0</span></a>
                                    </li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Edit job"
                                            class="_edit_list_point"><i class="fa fa-edit"></i></a>
                                    </li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Delete Job"
                                            class="_delete_point"><i class="fa fa-trash"></i></a>
                                    </li>

                                </ul>
                            </div>

                        @empty

                            <div class="_dash_singl_box">
                                <div class="_dash_singl_captions">
                                    <h4 class="_jb_title">No Jobs Found</h4>
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
