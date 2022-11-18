<div class="page-title search-form dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="_jb_details01">

                    <div class="_jb_details01_flex">
                        <div class="_jb_details01_authors">
                            <img src="assets/img/c-7.png" class="img-fluid" alt="" />
                        </div>
                        <div class="_jb_details01_authors_caption">
                            <h4 class="jbs_title">{{ $job->title }}</h4>
                            <ul class="jbx_info_list">
                                <li><span><i class="ti-briefcase"></i>
                                        {{ $job->sub_category->name }}
                                    </span></li>
                                <li><span><i class="ti-location-pin"></i>
                                        {{ $job->country }}
                                    </span></li>
                                <li><span><i class="ti-timer"></i>
                                        {{ $job->created_at->format('jS F Y') }}
                                    </span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="_jb_details01_last">
                        @auth
                            <ul class="_flex_btn d-flex align-items-center">
                                <li>
                                    <div class="jobs-like _saveed_jb position-static bookmark">
                                        <label class="toggler toggler-danger">
                                            <input data-like-toggle="{{ $job->id }}" @checked($job->likes_count)
                                                type="checkbox">
                                            <i class="fa fa-heart text-white"></i>
                                        </label>
                                    </div>
                                </li>
                                @if (auth()->user()->role !== 'client')
                                    <li><a href="#send-proposal" class="_applied_jb">Send Proposal</a></li>
                                @endif
                            </ul>
                        @endauth

                        @guest
                            <ul class="_flex_btn d-flex align-items-center">
                                <li>
                                    <div class="jobs-like _saveed_jb position-static bookmark">
                                        <label class="toggler toggler-danger">
                                            <input data-uncheckable data-bs-toggle="modal" data-bs-target="#login"
                                                type="checkbox">
                                            <i class="fa fa-heart text-white"></i>
                                        </label>
                                    </div>
                                </li>
                                <li><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#login"
                                        class="_applied_jb">Send Proposal</a></li>
                            </ul>
                        @endguest
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<section class="gray-light">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="_job_detail_box">

                    <div class="_wrap_box_slice">
                        <div class="_job_detail_single">
                            <h4 class="mb-0">Project Info</h4>
                            <div class="row">

                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="_eltio_caption">
                                        <div class="_eltio_caption_icon">
                                            <i class="ti-bag"></i>
                                        </div>
                                        <div class="_eltio_caption_body">
                                            <h4>Full Time</h4>
                                            <span>Job Type</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="_eltio_caption">
                                        <div class="_eltio_caption_icon">
                                            <i class="ti-timer"></i>
                                        </div>
                                        <div class="_eltio_caption_body">
                                            <h4>{{ $job->work_length->name }}</h4>
                                            <span>Duration</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="_eltio_caption">
                                        <div class="_eltio_caption_icon">
                                            <i class="ti-vector"></i>
                                        </div>
                                        <div class="_eltio_caption_body">
                                            <h4>{{ Str::ucfirst($job->size) }}</h4>
                                            <span>Project Size</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="_wrap_box_slice">
                        <div class="_job_detail_single">
                            <h4>Job Summary</h4>
                            <p>
                                {{ $job->description }}
                            </p>
                        </div>
                        <div class="_job_detail_single">
                            <h4>Skill & Experience</h4>
                            <ul class="skilss">
                                @foreach ($job->skills as $skill)
                                    <li><a
                                            href="javascript:void(0);">{{ $skill->skill->name ?? $skill->other_skill }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>


                    </div>



                    @auth
                        @if (auth()->user()->role !== 'client')
                            <div id="send-proposal" class="_wrap_box_slice   @guest disabled @endguest">
                                <div class="_job_detail_single">
                                    <h4>Send Proposal</h4>
                                    <form id="send_proposal" class="proposal-form needs-validation" novalidate>
                                        <div class="row">

                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Your Price</label>
                                                    <div class="input-group">
                                                        <input name="price" required type="text" class="form-control">

                                                        <input type="hidden" value="{{ $job->id }}" name="job"
                                                            id="jb">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Additional Document</label>
                                                    <div class="custom-file">
                                                        <input name="additional_document" type="file"
                                                            accept="image/*,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                                            class="custom-file-input d-none" id="job-attach">
                                                        <label class="custom-file-label" for="job-attach">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Work Letter</label>
                                                    <textarea name="work_letter" required class="form-control" rows="3"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="_terms_policy">
                                                    <div class="_mercurt10">
                                                        <input id="tm" class="checkbox-custom" name="terms"
                                                            type="checkbox">
                                                        <label for="tm" class="checkbox-custom-label"></label>
                                                    </div>
                                                    <div>I agree to the <a href="#">terms
                                                            and conditions</a></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <button type="submit" class="btn_proposal_send">Send Proposal</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        @endif
                    @endauth

                    @guest
                        <div id="send-proposal" class="_wrap_box_slice   @guest disabled @endguest">
                            <div class="_job_detail_single">
                                <h4>Send Proposal</h4>
                                <form class="proposal-form ">
                                    <div class="row">

                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Your Price</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">@</span>
                                                    </div>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Days To Complete</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Days</span>
                                                    </div>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Cover Letter</label>
                                                <textarea class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <h4>Advance Addon</h4>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="_addon_proposal">
                                                <input id="ad1" class="checkbox-custom" name="addon"
                                                    type="checkbox">
                                                <label for="ad1" class="checkbox-custom-label">Make Featured</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="_addon_proposal">
                                                <input id="ad2" class="checkbox-custom" name="sealed"
                                                    type="checkbox">
                                                <label for="ad2" class="checkbox-custom-label">Sealed
                                                    Proposal</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="_addon_proposal">
                                                <input id="ad3" class="checkbox-custom" name="urgent"
                                                    type="checkbox">
                                                <label for="ad3" class="checkbox-custom-label">Make Urgent</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="_addon_proposal">
                                                <input id="ad4" class="checkbox-custom" name="member"
                                                    type="checkbox">
                                                <label for="ad4" class="checkbox-custom-label">Add More
                                                    Member</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="_terms_policy">
                                                <div class="_mercurt10">
                                                    <input id="tm" class="checkbox-custom" name="terms"
                                                        type="checkbox">
                                                    <label for="tm" class="checkbox-custom-label"></label>
                                                </div>
                                                <div>I agree to the <a
                                                        href="https://marketplace.exertiowp.com/terms-and-conditions/">terms
                                                        and conditions</a></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <button type="button" class="btn_proposal_send">Send Proposal</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        @endguest


                        @guest

                            <button data-bs-toggle="modal" data-bs-target="#login"
                                class="btn dark-2 floating-login">Login First</button>
                        </div>
                    @endguest


                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12">

                <div class="_jb_summary light_box">

                    <div class="_jb_summary_caption py-5">
                        <h4>Accenture Private Limited</h4>
                        <span>Since 10th July 2017</span>
                        <h4 class="pises_price">
                            ₹{{ $job->rate_from }} - ₹{{ $job->rate_to }}
                            </sub></h4>
                    </div>
                    <div class="_jb_summary_body">

                        <div class="_view_profile_btns">
                            <a href="employer-detail.html" class="btn btn_emplo_eloi">View Profile</a>
                        </div>
                    </div>
                </div>

                <div class="_jb_summary light_box p-4">
                    <h4>Job Explain</h4>
                    <ul>
                        <li>Posted By:<span>{{ $job->client->name }}</span></li>
                        <li>Experience Level:<span>{{ $job->experience->name }}</span></li>
                    </ul>
                </div>

            </div>

        </div>

        @if ($showControl)
            <div class="row">
                <div class="col-xl-12 col-lg-12 ">
                    <div class=" _wrap_box_slice">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="suggested-candidates-tab-fill"
                                        data-bs-toggle="tab" href="#suggested-candidates-fill" role="tab"
                                        aria-controls="suggested-candidates-fill" aria-selected="true">Suggested
                                        Candidates</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="application-tab-fill" data-bs-toggle="tab"
                                        href="#application-fill" role="tab" aria-controls="application-fill"
                                        aria-selected="true">Applications</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="invite-tab-fill" data-bs-toggle="tab"
                                        href="#invite-fill" role="tab" aria-controls="invite-fill"
                                        aria-selected="false">Invites</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="hired-tab-fill" data-bs-toggle="tab" href="#hired-fill"
                                        role="tab" aria-controls="hired-fill" aria-selected="false">Hired</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content pt-1">
                                <div class="tab-pane active" id="suggested-candidates-fill" role="tabpanel"
                                    aria-labelledby="suggested-candidates-tab-fill">
                                    <div data-suggested-candidate class="row">

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

                                </div>
                                <div class="tab-pane " id="application-fill" role="tabpanel"
                                    aria-labelledby="application-tab-fill">
                                    <div data-job-applications class="row">
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
                                </div>
                                <div class="tab-pane" id="invite-fill" role="tabpanel"
                                    aria-labelledby="invite-tab-fill">
                                    <div data-invited-candidates class="row">
                                        <div class="col-12">
                                            <h2 class="text-center">Work in progress (INVITED)</h2>
                                        </div>
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
                                </div>
                                <div class="tab-pane" id="hired-fill" role="tabpanel"
                                    aria-labelledby="hired-tab-fill">
                                    <div data-hired-candidates class="row">
                                        <div class="col-12">
                                            <h2 class="text-center">Work in progress (HIRED)</h2>
                                        </div>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
