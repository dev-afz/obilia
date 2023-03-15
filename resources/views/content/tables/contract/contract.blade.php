@extends('layouts/contentLayoutMaster')

@section('title', 'Contract')


@section('page-style')
@endsection

@section('content')
    <section>
        <div class="row match-height">

            <div class="col-12">
                <x-card title="Contracts">
                    {{-- <div class="col-12 text-end">
                        <button class="btn btn-primary mb-2" data-bs-toggle="offcanvas" data-bs-target="#addCanvas">Add
                            Skill</button>
                    </div> --}}
                    <livewire:tables.contract-table />
                </x-card>
            </div>
        </div>
    </section>
    <x-modal id="contract-desctiption" :footer="false" />
@endsection
@section('page-script')
    <script>
        $(document).on('click', '[data-contract-description]', function() {
            const data = $(this).closest('td').find('[data-hidden]').html();
            const modal = $('#contract-desctiption');

            $(modal).find('.modal-body').html(data);
            $(modal).find('.modal-title').text('Description');
            $(modal).modal('show');
        });
    </script>
@endsection
