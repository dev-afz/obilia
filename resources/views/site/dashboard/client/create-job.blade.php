<x-site.layout title="Add Job" :include="['menu', 'select2']">
    <x-site.navbar class="light" />

    <x-site.dashboard.body>

        <div class="col-lg-12 col-md-12 col-sm-12">

            <!-- Single Wrap -->
            <div class="_dashboard_content">
                <div class="_dashboard_content_header">
                    <div class="_dashboard__header_flex">
                        <h4><i class="ti-briefcase me-1"></i>Submit Job Form</h4>
                    </div>
                </div>

                <div class="_dashboard_content_body with-light">
                    <x-site.form id="add-job-form" :route="route('site.client.jobs.store')">

                        <div class="mt-3 col-lg-12">
                            <x-input name="job_title" />
                        </div>

                        <div class="mt-3 col-lg-4">
                            <x-select :withoutScript="true" name="industry" :options="$categories" />
                        </div>

                        <div class="mt-3 col-lg-4">
                            <x-select :withoutScript="true" name="category" :options="[]" />
                        </div>
                        <div class="mt-3 col-lg-4">
                            <x-select :withoutScript="true" name="experience" :options="$experience_levels" />
                        </div>
                        <div class="mt-3 col-lg-6">
                            <x-select :withoutScript="true" name="payment_type" :options="['fixed', 'hourly']" />
                        </div>
                        <div class="col-lg-6 mt-3">
                            <label>Budget</label>
                            <div class="form-row budget">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <x-input :hasLabel="false" name="from" prepend="₹" append="/hour(s)" />
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <x-input :hasLabel="false" name="to" prepend="₹" append="/hour(s)" />
                                </div>
                            </div>
                        </div>


                        <div class="mt-3 col-lg-12">
                            <x-select :withoutScript="true" name="skills" :options="$skills" :multiple="true" />
                        </div>
                        <div class="mt-3 col-lg-12">
                            <div class="mt-3 col-lg-12">
                                <x-input name="job_description" type="textarea" />
                            </div>
                        </div>
                    </x-site.form>
                </div>
            </div>
            <!-- Single Wrap End -->
            <div class="row">
                <div class="col-12 text-center">
                    <button form="add-job-form" type="submit" class="btn btn-save">Submit Job</button>
                </div>
            </div>

        </div>


    </x-site.dashboard.body>

    @section('page-scripts')
        <script>
            $('#experience,#industry,#category,#payment_type').select2({
                placeholder: "Select option",
                allowClear: true,
                minimumResultsForSearch: -1,
                width: '100%',
            });

            $('#skills').select2({
                placeholder: 'Select Skills',
                allowClear: true,
                tags: true,
                width: '100%',
            });


            $('#payment_type').change(function(e) {
                e.preventDefault();
                var type = $(this).val();
                if (type == 'hourly') {
                    $('.budget').find('.input-group-append').html(
                        '<span class="input-group-text light">/ hour(s)</span>');
                } else {
                    $('.budget').find('.input-group-append').html(
                        '<span class="input-group-text light">/ project</span>');
                }

            });

            $('#industry').on('change', function() {
                var id = $(this).val();
                if (id == null) {
                    $('#category').html('<option selected disabled>Select industry fisrt</option>');
                    return;
                }
                $.ajax({
                    url: '{{ route('site.client.subcategories') }}',
                    data: {
                        category: id
                    },
                    type: 'GET',
                    success: function(data) {
                        console.log(data);
                        $('#category').empty();
                        $('#category').append('<option selected disabled>Select Category</option>');
                        $.each(data, function(key, value) {
                            $('#category').append('<option value="' + value.id + '">' + value.name +
                                '</option>');
                        });
                    }
                });
            });
        </script>
    @endsection
</x-site.layout>
