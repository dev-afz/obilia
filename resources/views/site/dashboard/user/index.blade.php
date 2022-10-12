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


                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="dashboard-stat">
                                <div class="dashboard-stat-icon widget-1"><i class="ti-location-pin"></i></div>
                                <div class="dashboard-stat-content">
                                    <h4><span class="cto">72</span></h4>
                                    <p>Job Posted</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="dashboard-stat">
                                <div class="dashboard-stat-icon widget-2"><i class="ti-pie-chart"></i></div>
                                <div class="dashboard-stat-content">
                                    <h4><span class="cto">12</span>M</h4>
                                    <p>Total Viewed</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="dashboard-stat">
                                <div class="dashboard-stat-icon widget-3"><i class="ti-user"></i></div>
                                <div class="dashboard-stat-content">
                                    <h4><span class="cto">72</span>K</h4>
                                    <p>User Applied</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="dashboard-stat">
                                <div class="dashboard-stat-icon widget-4"><i class="ti-bookmark"></i></div>
                                <div class="dashboard-stat-content">
                                    <h4><span class="cto">80</span></h4>
                                    <p>Job Bookmarked</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="dashboard-gravity-list with-icons">
                                <h4>Recent Activities</h4>
                                <ul>
                                    <li>
                                        <i class="dash-icon-box ti-layers text-purple bg-light-purple"></i> Your job for
                                        <strong><a href="#">IOS Developer</a></strong> has been approved!
                                        <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                                    </li>

                                    <li>
                                        <i class="dash-icon-box ti-star text-success bg-light-success"></i> Jodie
                                        Farrell left a review <div class="numerical-rating high" data-rating="5.0">
                                        </div> for<strong><a href="#"> Real Estate Logo</a></strong>
                                        <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                                    </li>

                                    <li>
                                        <i class="dash-icon-box ti-heart text-warning bg-light-warning"></i> Someone
                                        bookmarked your <strong><a href="#">SEO Expert Job</a></strong> listing!
                                        <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                                    </li>

                                    <li>
                                        <i class="dash-icon-box ti-star text-info bg-light-info"></i> Gracie Mahmood
                                        left a review <div class="numerical-rating mid" data-rating="3.8"></div> on
                                        <strong><a href="#">Product Design</a></strong>
                                        <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                                    </li>

                                    <li>
                                        <i class="dash-icon-box ti-heart text-danger bg-light-danger"></i> Your Magento
                                        Developer job expire<strong><a href="#">Renew</a></strong> now it!
                                        <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                                    </li>

                                    <li>
                                        <i class="dash-icon-box ti-star text-success bg-light-success"></i> Ethan
                                        Barrett left a review <div class="numerical-rating high" data-rating="4.7">
                                        </div> on <strong><a href="#">New Logo</a></strong>
                                        <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                                    </li>

                                    <li>
                                        <i class="dash-icon-box ti-star text-purple bg-light-purple"></i> Your Magento
                                        Developer job expire <strong><a href="#">Renew</a></strong> now it.
                                        <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="dashboard-gravity-list invoices with-icons">
                                <h4>Invoices</h4>
                                <ul>

                                    <li><i class="dash-icon-box ti-files text-warning bg-light-warning"></i>
                                        <strong>Starter Plan</strong>
                                        <ul>
                                            <li class="unpaid">Unpaid</li>
                                            <li>Order: #20551</li>
                                            <li>Date: 01/08/2019</li>
                                        </ul>
                                        <div class="buttons-to-right">
                                            <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                                        </div>
                                    </li>

                                    <li><i class="dash-icon-box ti-files text-success bg-light-success"></i>
                                        <strong>Basic Plan</strong>
                                        <ul>
                                            <li class="paid">Paid</li>
                                            <li>Order: #20550</li>
                                            <li>Date: 01/07/2019</li>
                                        </ul>
                                        <div class="buttons-to-right">
                                            <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                                        </div>
                                    </li>

                                    <li><i class="dash-icon-box ti-files text-danger bg-light-danger"></i>
                                        <strong>Extended Plan</strong>
                                        <ul>
                                            <li class="paid">Paid</li>
                                            <li>Order: #20549</li>
                                            <li>Date: 01/06/2019</li>
                                        </ul>
                                        <div class="buttons-to-right">
                                            <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                                        </div>
                                    </li>

                                    <li><i class="dash-icon-box ti-files text-success bg-light-success"></i>
                                        <strong>Platinum Plan</strong>
                                        <ul>
                                            <li class="paid">Paid</li>
                                            <li>Order: #20548</li>
                                            <li>Date: 01/05/2019</li>
                                        </ul>
                                        <div class="buttons-to-right">
                                            <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                                        </div>
                                    </li>

                                    <li><i class="dash-icon-box ti-files text-warning bg-light-warning"></i>
                                        <strong>Extended Plan</strong>
                                        <ul>
                                            <li class="paid">Paid</li>
                                            <li>Order: #20547</li>
                                            <li>Date: 01/04/2019</li>
                                        </ul>
                                        <div class="buttons-to-right">
                                            <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                                        </div>
                                    </li>

                                    <li><i class="dash-icon-box ti-files text-info bg-light-info"></i>
                                        <strong>Platinum Plan</strong>
                                        <ul>
                                            <li class="paid">Paid</li>
                                            <li>Order: #20546</li>
                                            <li>Date: 01/03/2019</li>
                                        </ul>
                                        <div class="buttons-to-right">
                                            <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
</x-site.layout>
