@extends('layouts/contentLayoutMaster')

@section('title', 'Contract Milestones')


@section('page-style')
@endsection

@section('content')
    <section>
        <div class="row match-height">

            <div class="col-12">
                <x-card title="Contract Milestones">
                    {{-- <div class="col-12 text-end">
                        <button class="btn btn-primary mb-2" data-bs-toggle="offcanvas" data-bs-target="#addCanvas">Add
                            Skill</button>
                    </div> --}}
                    <livewire:tables.contract-milestone-table />
                </x-card>
            </div>
        </div>
    </section>
    <x-modal id="milestone-description" :footer="false" />
@endsection
@section('page-script')
    <script>
        $(document).on('click', '[data-milestone-description]', function() {
            const data = $(this).closest('td').find('[data-hidden]').html();
            const modal = $('#milestone-description');

            $(modal).find('.modal-body').html(data);
            $(modal).find('.modal-title').text('Description');
            $(modal).modal('show');
        });
    </script>
@endsection
