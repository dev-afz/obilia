@extends('layouts/contentLayoutMaster')

@section('title', 'Job Application')


@section('page-style')
@endsection

@section('content')
    <section>
        <div class="row match-height">

            <div class="col-12">
                <x-card title="Job Applications">
                    {{-- <div class="col-12 text-end">
                        <button class="btn btn-primary mb-2" data-bs-toggle="offcanvas" data-bs-target="#addCanvas">Add
                            Skill</button>
                    </div> --}}
                    <livewire:tables.job-application-table />
                </x-card>
            </div>
        </div>
    </section>

    {{-- <x-offcanvas id="addCanvas" title="Add Skill">
        <x-form class="g-1" id="add-skill" :route="route('admin.metadata.skills.store')">
            <div class="col-12">
                <x-input name="name" />
            </div>
        </x-form>
    </x-offcanvas> --}}
    <x-modal id="work-letter" :footer="false" />
@endsection
@section('page-script')
    <script>
        $(document).on('click', '[data-work-letter]', function() {
            const data = $(this).closest('td').find('[data-hidden]').html();
            const modal = $('#work-letter');

            $(modal).find('.modal-body').html(data);
            $(modal).find('.modal-title').text('Work Letter');
            $(modal).modal('show');
        });
    </script>
@endsection
