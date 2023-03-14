@extends('layouts/contentLayoutMaster')

@section('title', 'Jobs')


@section('page-style')
@endsection

@section('content')
    <section>
        <div class="row match-height">

            <div class="col-12">
                <x-card title="Jobs">
                    {{-- <div class="col-12 text-end">
                        <button class="btn btn-primary mb-2" data-bs-toggle="offcanvas" data-bs-target="#addCanvas">Add
                            Skill</button>
                    </div> --}}
                    <livewire:tables.job-table />
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
    <x-modal id="job-description" :footer="false" />
@endsection
@section('page-script')
    <script>
        $(document).on('click', '[data-job-description]', function() {
            const data = $(this).closest('td').find('[data-hidden]').html();
            const modal = $('#job-description');

            $(modal).find('.modal-body').html(data);
            $(modal).find('.modal-title').text('Description');
            $(modal).modal('show');
        });
    </script>
@endsection
