<x-site.layout title="Dashboard" :include="['menu']">
    <x-site.navbar class="light" />

    <x-site.dashboard.body>



        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">


                <div class="_dashboard_content">
                    <div class="_dashboard_content_header">
                        <div class="_dashboard__header_flex">
                            <h4><i class="fa fa-user me-1"></i>My Account</h4>
                        </div>
                    </div>

                    <div class="_dashboard_content_body">
                        <div class="row">
                            <div class="col-auto">
                                <div class="custom-file avater_uploads">
                                    <input type="file" class="custom-file-input" id="user-image">
                                    <label class="custom-file-label" for="user-image">

                                        @if (auth()->user()->images)
                                            <img src="{{ asset(auth()->user()->images) }}" alt="user-image"
                                                class="img-fluid rounded">
                                        @else
                                            <i class="fa fa-user"></i>
                                        @endif

                                    </label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control with-light" name="name"
                                                value="{{ auth()->user()->name }}">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Account Type</label>
                                            <select class="form-control with-light">
                                                <option>-- Work Pending--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control with-light"
                                                value="{{ auth()->user()->email }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="_dashboard_content">
                    <div class="_dashboard_content_header">
                        <div class="_dashboard__header_flex">
                            <h4><i class="ti-lock me-1"></i>Set Password</h4>
                        </div>
                    </div>

                    <div class="_dashboard_content_body">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4">
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input type="password" class="form-control with-light">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="form-control with-light">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control with-light">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <input id="sec" class="checkbox-custom" name="Security" type="checkbox">
                                    <label for="sec" class="checkbox-custom-label">Enable Two-Step
                                        Verification via Phone</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="text-center">
                    <button type="button" class="btn btn-save">Save Changes</button>
                </div>

            </div>
        </div>



    </x-site.dashboard.body>



    @section('page-scripts')
        <script>
            $(document).ready(function() {
                $('.avater_uploads input[type="file"]').change(function(e) {
                    //preview image
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.custom-file-label').css('background-image', 'url(' + e.target.result + ')')
                            .css('background-size', 'cover')
                            .css('background-position', 'center')
                            .css('background-repeat', 'no-repeat');
                    }
                    reader.readAsDataURL(e.target.files[0]);
                    $('.custom-file-label').find('i').hide();

                });
            });
        </script>
    @endsection

</x-site.layout>
