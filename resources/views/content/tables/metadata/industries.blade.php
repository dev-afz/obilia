@extends('layouts/contentLayoutMaster')

@section('title', 'Industries')


@section('page-style')
@endsection

@section('content')
    <section>
        <div class="row match-height">

            <div class="col-12">
                <x-card title="Industries">
                    <div class="col-12 text-end">
                        <button class="btn btn-primary mb-2" data-bs-toggle="offcanvas" data-bs-target="#addIndustryCanvas">Add
                            Industry</button>
                    </div>
                    <livewire:tables.industry-table />
                </x-card>
            </div>
        </div>
    </section>

    <x-offcanvas id="addIndustryCanvas" title="Add Industry">
        <x-form id="add-industry" :route="route('admin.metadata.industries.store')">

            <div class="col-12">
                <x-input name="name" />
            </div>
            <div class="col-12">
                <x-input-file name="image" />
            </div>

        </x-form>
    </x-offcanvas>

@endsection


@section('page-script')
    <script></script>
@endsection
