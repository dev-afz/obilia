<div class="row py-5">
    @forelse ($subcategories as $sub)
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
            <div class="job_grid_02">
                <div class="jb_types openings">03 Developers</div>
                <div class="jb_grid_01_thumb">
                    <a href="employer-detail.html"><img src="{{ asset($sub->image) }}" class="img-fluid" alt=""></a>
                </div>
                <div class="jb_grid_01_caption">
                    <h4 class="_jb_title"><a href="#">{{ $sub->name }}</a></h4>
                </div>

            </div>
        </div>
    @empty

        //show empty message
    @endforelse
</div>
