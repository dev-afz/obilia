<x-site.layout title="Job Invitations" :include="['menu']">
    <x-site.navbar class="light" />

    <x-site.dashboard.body>



        <div class="col-lg-12 col-md-12 col-sm-12">

            <!-- Single Wrap -->
            <div class="_dashboard_content">
                <div class="_dashboard_content_header">
                    <div class="_dashboard__header_flex">
                        <h4><i class="ti-briefcase me-1"></i>Manage Job Invitations</h4>
                    </div>
                </div>

                <div class="_dashboard_content_body p-0">
                    <div class="_dashboard_list_group">

                        @forelse ($invitations as $invt)
                            <div class="_dash_singl_box">
                                <div class="_dash_singl_captions">
                                    <h4 class="_jb_title">
                                        <a
                                            href="{{ route('site.user.jobs.details', $invt->id) }}">{{ $invt->job->title }}</a>
                                    </h4>
                                    <ul class="_grouping_list">
                                        <li><span><i class="ti-location-pin"></i>{{ $invt->job->country }}</span></li>
                                        <li><span><i
                                                    class="ti-credit-card"></i>{{ '₹' . $invt->job->rate_from . ' - ₹' . $invt->job->rate_to }}</span>
                                        </li>
                                        {{-- <li><span><i class="ti-timer"></i>Expiring on 10 Feb</span></li> --}}
                                    </ul>

                                </div>
                                <ul class="_action_grouping_list d-flex">

                                    @if ($invt->status == 'pending')
                                        <span
                                            class="badge bg-warning bg-light-warning text-white">{{ $invt->status }}</span>
                                    @elseif ($invt->status == 'active')
                                        <span
                                            class="badge bg-success bg-light-success text-white">{{ $invt->status }}</span>
                                    @elseif ($invt->status == 'completed')
                                        <span
                                            class="badge bg-primary bg-light-primary text-white">{{ $invt->status }}</span>
                                    @elseif ($invt->status == 'cancelled')
                                        <span
                                            class="badge bg-danger bg-light-danger text-white">{{ $invt->status }}</span>
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
