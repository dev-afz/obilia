<x-site.layout title="Dashboard" :include="['menu']">
    <x-site.navbar class="light" />

    <x-site.dashboard.body>

        <div class="col-lg-12 col-md-12 col-sm-12">

            <!-- Single Wrap -->
            <div class="_dashboard_content">
                <div class="_dashboard_content_header">
                    <div class="_dashboard__header_flex">
                        <h4><i class="ti-briefcase me-1"></i>Job Details</h4>
                    </div>
                </div>

                <div class="_dashboard_content_body p-0">
                    <div class="_dashboard_list_group">
                        <x-site.job-details :job="$job" :showControl="true" />
                    </div>
                </div>
            </div>
            <!-- Single Wrap End -->

        </div>


    </x-site.dashboard.body>
</x-site.layout>
