<x-site.layout title="Home" :include="['popper', 'owl', 'select2', 'menu']">
    <x-site.navbar class="header-light" />


    <!-- ============================ Page Title Start================================== -->
    <div class="page-title search-form">
        <div class="container">
            <div class="row m-0 justify-content-center">
                <div class="col-lg-10 col-md-10">
                    <form class="search-big-form shadows">
                        <div class="row m-0">
                            <div class="col-lg-10 col-md-10 col-sm-12 p-0">
                                <div class="form-group">
                                    <i class="ti-search"></i>
                                    <input type="text" class="form-control l-radius b-0 b-r"
                                        placeholder="Job Title or Keywords">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-12 p-0">
                                <button type="button" class="btn theme-bg r-radius full-width">Find Jobs</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Main Section Start ================================== -->
    <section class="gray-bg">
        <div class="container">
            <div class="row">
                <!-- Item Wrap Start -->
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <!-- Filter Search -->
                            <div class="_filt_tag786">
                                <div class="form-group filter_group m-0">
                                    <div class="_tag780">32 Items found</div>
                                </div>
                                <div class="_tag785">
                                    <div class="_g78juy">
                                        <select class="form-control">
                                            <option>Show 20</option>
                                            <option>Show 30</option>
                                            <option>Show 40</option>
                                            <option>Show 50</option>
                                            <option>Show 100</option>
                                            <option>Show 200</option>
                                        </select>
                                    </div>
                                    <a href="javascript:void(0);" onclick="openRightMenu()" class="eltio_buttons"><i
                                            class="fa fa-filter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <!-- Single Job List -->
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="_jb_list73">
                                <div class="_jb_list73_header">
                                    <div class="jobs-like bookmark">
                                        <label class="toggler toggler-danger"><input type="checkbox"><i
                                                class="fa fa-bookmark"></i></label>
                                    </div>
                                    <div class="_jb_list72_flex">
                                        <div class="_jb_list72_first">
                                            <div class="_jb_list72_yhumb small-thumb">
                                                <img src="assets/img/c-1.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="_jb_list72_last">
                                            <h4 class="_jb_title"><a href="employer-detail.html">Google Inc</a></h4>
                                            <div class="_times_jb">USA, Sans Fransico</div>
                                        </div>
                                    </div>
                                    <div class="_jb_list72_foot">
                                        <div class="_times_jb text-right">24/8/2021</div>
                                    </div>
                                </div>
                                <div class="_jb_list73_middle">
                                    <div class="_jb_list73_middle_flex">
                                        <h4 class="_jb_title"><a href="job-detail.html">Sr. Software Developer</a></h4>
                                        <div class="_times_jb">$80k - $100k/year</div>
                                    </div>
                                    <div class="_middle_last">
                                        <div class="_jb_types fulltime_lite">Full Time</div>
                                    </div>
                                </div>
                                <div class="_jb_list73_footer">
                                    <ul class="applieded_list">
                                        <li><a href="javascript:void(0);" class="ng-scope"><img
                                                    src="assets/img/team-1.jpg" class="img-responsive img-circle"
                                                    alt=""></a></li>
                                        <li><a href="javascript:void(0);" class="ng-scope"><img
                                                    src="assets/img/team-2.jpg" class="img-responsive img-circle"
                                                    alt=""></a></li>
                                        <li><a href="javascript:void(0);" class="ng-scope"><img
                                                    src="assets/img/team-3.jpg" class="img-responsive img-circle"
                                                    alt=""></a></li>
                                        <li><a href="javascript:void(0);" class="ng-scope"><img
                                                    src="assets/img/team-4.jpg" class="img-responsive img-circle"
                                                    alt=""></a></li>
                                        <li><a href="javascript:void(0);" class="ng-scope"><span
                                                    class="no_thumb">AM</span></a></li>
                                        <li><a href="javascript:void(0);" class="nore_applied"><span>17+</span>People
                                                Applied</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span class="ti-arrow-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item active"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">18</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span class="ti-arrow-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Main Section End ================================== -->

    <!-- Switcher Start -->
    <div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="rightMenu">
        <div class="search-sidebar_header">
            <h4 class="ssh_heading">Search Filter</h4>
            <a href="javascript:void(0);" class="clear_all">Clear All</a><a href="#search_open"
                data-bs-toggle="collapse" aria-expanded="false" role="button" class="collapsed _filter-ico"><i
                    class="fa fa-sliders"></i></a>
            <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large"><i
                    class="ti-close"></i></button>
        </div>
        <div class="rightMenu-scroll">
            <div class="right-ch-sideBar" id="side-scroll">

                <div class="search-inner p-0">

                    <div class="filter-search-box pb-0">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search by keywords...">
                        </div>
                    </div>

                    <div class="filter_wraps">
                        <div class="single_search_boxed">
                            <div class="widget-boxed-header">
                                <h4>
                                    <a href="#categories" data-bs-toggle="collapse" aria-expanded="true"
                                        role="button">Job Categories</a>
                                </h4>

                            </div>
                            <div class="widget-boxed-body collapse show" id="categories" data-parent="#categories">
                                <div class="side-list no-border">
                                    <!-- Single Filter Card -->
                                    <div class="single_filter_card">
                                        <div class="card-body pt-0">
                                            <div class="inner_widget_link">
                                                <ul class="no-ul-list filter-list">
                                                    <li>
                                                        <input id="a1" class="checkbox-custom" name="ADA"
                                                            type="checkbox" checked="">
                                                        <label for="a1" class="checkbox-custom-label">IT
                                                            Computers (62)</label>
                                                        <ul class="no-ul-list filter-list">
                                                            <li>
                                                                <input id="aa1" class="checkbox-custom"
                                                                    name="ADA" type="checkbox">
                                                                <label for="aa1"
                                                                    class="checkbox-custom-label">Web Design
                                                                    (31)</label>
                                                            </li>
                                                            <li>
                                                                <input id="aa2" class="checkbox-custom"
                                                                    name="Parking" type="checkbox">
                                                                <label for="aa2"
                                                                    class="checkbox-custom-label">Web development
                                                                    (20)</label>
                                                            </li>
                                                            <li>
                                                                <input id="aa3" class="checkbox-custom"
                                                                    name="Coffee" type="checkbox">
                                                                <label for="aa3"
                                                                    class="checkbox-custom-label">SEO Services
                                                                    (43)</label>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <input id="a2" class="checkbox-custom" name="Parking"
                                                            type="checkbox">
                                                        <label for="a2" class="checkbox-custom-label">Financial
                                                            Service (16)</label>
                                                    </li>
                                                    <li>
                                                        <input id="a3" class="checkbox-custom" name="Coffee"
                                                            type="checkbox">
                                                        <label for="a3" class="checkbox-custom-label">Art,
                                                            Design, Media (22)</label>
                                                    </li>
                                                    <li>
                                                        <input id="a4" class="checkbox-custom" name="Mother"
                                                            type="checkbox">
                                                        <label for="a4" class="checkbox-custom-label">Coach &
                                                            Education (21)</label>
                                                    </li>
                                                    <li>
                                                        <input id="a5" class="checkbox-custom" name="Outdoor"
                                                            type="checkbox">
                                                        <label for="a5" class="checkbox-custom-label">Apps
                                                            Developements (17)</label>
                                                        <ul class="no-ul-list filter-list">
                                                            <li>
                                                                <input id="ab1" class="checkbox-custom"
                                                                    name="ADA" type="checkbox">
                                                                <label for="ab1"
                                                                    class="checkbox-custom-label">IOS Development
                                                                    (12)</label>
                                                            </li>
                                                            <li>
                                                                <input id="ab2" class="checkbox-custom"
                                                                    name="Parking" type="checkbox">
                                                                <label for="ab2"
                                                                    class="checkbox-custom-label">Android Development
                                                                    (04)</label>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <input id="a6" class="checkbox-custom" name="Pet"
                                                            type="checkbox">
                                                        <label for="a6" class="checkbox-custom-label">Writing &
                                                            Translation (04)</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group filter_button pt-2">
                        <button type="submit" class="btn btn btn-theme-2 rounded full-width">Filter</button>
                    </div>
                </div>

            </div>
        </div>
    </div>




    @guest
        <x-site.signin-modal />
        <x-site.signup-modal />
    @endguest

    @section('page-scripts')
        <script>
            function openRightMenu() {
                document.getElementById("rightMenu").style.display = "block";
            }

            function closeRightMenu() {
                document.getElementById("rightMenu").style.display = "none";
            }
        </script>
    @endsection

</x-site.layout>
