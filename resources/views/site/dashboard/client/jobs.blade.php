<x-site.layout title="Dashboard" :include="['menu']">
    <x-site.navbar class="light" />
    <section class="gray-bg pt-4">
        <div class="container-fluid">
            <div class="row m-0">
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12">
                    <div class="dashboard-navbar overlio-top">

                        <div class="d-user-avater">
                            <img src="/site/img/team-1.jpg" class="img-fluid rounded" alt="">
                            <h4>{{ auth()->user()->name }}</h4>
                            <span>Canada USA</span>
                        </div>

                        <x-site.dashboard.menu />

                    </div>
                </div>
                <!-- Item Wrap Start -->
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
                    <h1>Jobs</h1>

                </div>

            </div>
        </div>
    </section>
</x-site.layout>
