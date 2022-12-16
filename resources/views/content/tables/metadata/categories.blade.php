@extends('layouts/contentLayoutMaster')

@section('title', 'Categories')


@section('page-style')
    <style>
        .dropdown-menu {
            transform: scale(1, 1) !important;
        }

        h1 {
            color: red !important;
        }
    </style>
@endsection

@section('content')
    <section>
        <div class="row match-height">

            <div class="col-12">
                <x-card title="Categories">
                    <div class="col-12 text-end">
                        <button class="btn btn-primary mb-2" data-bs-toggle="offcanvas" data-bs-target="#addCategoryCanvas">Add
                            Category</button>
                    </div>
                    <livewire:tables.category-table />
                </x-card>
            </div>
        </div>
    </section>

    <x-offcanvas id="addCategoryCanvas" title="Add Category">
        <x-form id="add-category" :route="route('admin.metadata.categories.store')">
            <div class="col-12">
                <x-select name="industry" :options="$industries" />
            </div>
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
