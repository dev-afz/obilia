<x-site.layout title="Dashboard" :include="['menu']">



    @section('page-styles')
    @endsection

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

        <div hidden data-loader-html class="d-none">
            <div class="col-xl-4 col-lg-6 col-md-6">
                <x-site.misc.profile-loader />
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <x-site.misc.profile-loader />
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <x-site.misc.profile-loader />
            </div>
        </div>

    </x-site.dashboard.body>
    @section('page-scripts')
        <script>
            let shown = 'suggested';
            $(document).ready(function() {
                setTimeout(() => {
                    fetchSuggestedJobs();
                }, 1000);

                $('#application-tab-fill').click(function(e) {
                    e.preventDefault();
                    if (shown !== 'application') {
                        shown = 'application';
                        fetchApplicantions();
                    }
                });
                $('#suggested-candidates-tab-fill').click(function(e) {
                    e.preventDefault();
                    if (shown !== 'suggested') {
                        shown = 'suggested';
                        fetchSuggestedJobs();
                    }
                });
                $('#invite-tab-fill').click(function(e) {
                    e.preventDefault();
                    if (shown !== 'invite') {
                        shown = 'invite';
                        fetchInvitedCandidates();
                    }
                });
                $('#hired-tab-fill').click(function(e) {
                    e.preventDefault();
                    if (shown !== 'hired') {
                        shown = 'hired';
                        fetchHiredCandidates();
                    }
                });


                $(document).on('click', '[data-bid]', function() {
                    const data = $(this).data('bid');
                    Notiflix.Report.init({
                        className: 'notiflix-report',
                        plainText: false,
                        width: '600px',
                        messageMaxLength: 20000,
                        svgSize: '0px',
                        borderRadius: '10px',
                        // cssAnimationStyle: 'zoom',
                    });

                    let message =
                        `<div><strong>Price :</strong> ₹${data.bid_price}</div><div><p><strong>Work Letter : </strong>${data.work_letter}</p></div>`;

                    if (data.document) {
                        message +=
                            `<div class="text-center px-1"><a href="${data.document}"  target="_blank">View Document</a></div>`;
                    }

                    Notiflix.Report.info('Bid Data', message, 'Close');

                });

                $(document).on('click', '[data-invite-candidate]', function(e) {
                    e.preventDefault();
                    const id = $(this).data('invite-candidate');
                    const btn = $(this);
                    btn.html('<i class="fa fa-spinner fa-spin"></i>');
                    btn.attr('disabled', true);
                    rebound({
                        data: {
                            user_id: id,
                            job_id: {{ $job->id }}
                        },
                        url: "{{ route('site.client.jobs.invite-candidate') }}",
                        block: false,
                        processData: true,
                        successCallback: function(data) {
                            btn.html('Invited');
                            btn.attr('disabled', true);
                            btn.removeClass('btn-success');
                            btn.addClass('btn-flat-success');
                            $(btn).closest('[data-candidate-suggetion]').remove();
                            //check if [data-suggested-candidate] has any div
                            if ($('[data-suggested-candidate]').children().length === 0) {
                                $('[data-suggested-candidate]').html(
                                    '<div class="col-12"><div class="alert alert-warning p-4">No more candidates to show</div></div>'
                                );
                            }

                        },
                        errorCallback: function(data) {
                            btn.html('Invite');
                            btn.attr('disabled', false);
                        }
                    });
                });

                $(document).on('click', '[data-application-action]', function(e) {
                    e.preventDefault();
                    const id = $(this).data('application-id');
                    const btn = $(this);
                    const old_icon = btn.html();
                    btn.html('<i class="fa fa-spinner fa-spin"></i>');
                    btn.attr('disabled', true);
                    const status = $(this).data('application-action');

                    console.log(status, id);
                    rebound({
                        data: {
                            id: id,
                            status: status
                        },
                        url: "{{ route('site.client.jobs.application-action') }}",
                        block: false,
                        processData: true,
                        successCallback: function(data) {
                            btn.parent().remove();
                            fetchApplicantions();
                        },
                        errorCallback: function(data) {
                            btn.html(old_icon);
                            btn.attr('disabled', false);
                        }
                    });
                });

            });

            function fetchSuggestedJobs() {
                $('[data-suggested-candidate]').html($('[data-loader-html]').html());
                rebound({
                    data: {
                        job_id: {{ $job->id }},
                    },
                    method: 'get',
                    block: false,
                    notification: false,
                    url: "{{ route('site.client.jobs.suggested-candidates') }}",
                    processData: true,
                    successCallback: function(res) {
                        if (res.status === 'success') {
                            $('[data-suggested-candidate]').html(res.html);
                        }
                    }
                });
            }

            function fetchApplicantions() {
                $('[data-job-applications]').html($('[data-loader-html]').html());
                rebound({
                    data: {
                        job_id: {{ $job->id }},
                    },
                    method: 'get',
                    block: false,
                    notification: false,
                    url: "{{ route('site.client.jobs.applications') }}",
                    processData: true,
                    successCallback: function(res) {
                        if (res.status === 'success') {
                            $('[data-job-applications]').html(res.html);
                        }
                    }
                });
            }

            function fetchInvitedCandidates() {
                $('[data-invited-candidates]').html($('[data-loader-html]').html());
                rebound({
                    data: {
                        job_id: {{ $job->id }},
                    },
                    method: 'get',
                    block: false,
                    notification: false,
                    url: "{{ route('site.client.jobs.invited-candidates') }}",
                    processData: true,
                    successCallback: function(res) {
                        if (res.status === 'success') {
                            $('[data-invited-candidates]').html(res.html);
                        }
                    }
                });
            }

            function fetchHiredCandidates() {
                $('[data-hired-candidates]').html($('[data-loader-html]').html());
                rebound({
                    data: {
                        job_id: {{ $job->id }},
                    },
                    method: 'get',
                    block: false,
                    notification: false,
                    url: "{{ route('site.client.jobs.hired-candidates') }}",
                    processData: true,
                    successCallback: function(res) {
                        if (res.status === 'success') {
                            $('[data-hired-candidates]').html(res.html);
                        }
                    }
                });
            }
        </script>
    @endsection
</x-site.layout>
