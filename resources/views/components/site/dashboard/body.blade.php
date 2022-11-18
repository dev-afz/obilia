<section class="gray-bg pt-4">
    <div class="container-fluid">
        <div class="row m-0">
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12">
                <div class="dashboard-navbar overlio-top">
                    <div class="d-user-avater">
                        <img src="/site/img/team-1.jpg" class="img-fluid rounded" alt="">
                        <h4>{{ auth()->user()->name }}</h4>
                        <span>Mumbai, INDIA</span>
                    </div>

                    <x-site.dashboard.menu />
                </div>
            </div>
            <!-- Item Wrap Start -->
            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">

                @if (auth()->user()->status == 'pending')
                    <div class="alert alert-danger alert-dismissible fade show p-3" role="alert">
                        <strong>Warning!</strong> Your account is pending approval. Please submit your documents for
                        approval
                        or contact us for more information.
                        <button type="button" class="btn btn-sm btn-info float-end" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Get Started
                        </button>
                    </div>
                @endif

                <div class="row">
                    {{ $slot }}
                </div>
            </div>

        </div>
    </div>
</section>
