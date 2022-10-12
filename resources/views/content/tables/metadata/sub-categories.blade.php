@extends('layouts/contentLayoutMaster')

@section('title', 'Sub Categories')


@section('page-style')
    <style>
        .dropdown-menu {
            transform: scale(1, 1) !important;
        }
    </style>
@endsection

@section('content')
    <section>
        <div class="row match-height">

            <div class="col-12">
                <x-card title="Sub-Categories">
                    <div class="col-12 text-end">
                        <button class="btn btn-primary mb-2" data-bs-toggle="offcanvas" data-bs-target="#addCanvas">Add
                            Sub-Category</button>
                    </div>
                    <livewire:tables.sub-category-table />
                </x-card>
            </div>
        </div>
    </section>

    <x-offcanvas id="addCanvas" title="Add Sub Category">
        <x-form class="g-1" id="add-sub-category" :route="route('admin.metadata.sub-categories.store')">

            <div class="col-12">
                <x-input name="name" />
            </div>
            <div class="col-12">
                <x-input-file name="image" />
            </div>

            <div class="col-12">
                <x-select name="category" :options="$categories" />
            </div>
        </x-form>
    </x-offcanvas>

@endsection


@section('page-script')
    <script></script>
@endsection
