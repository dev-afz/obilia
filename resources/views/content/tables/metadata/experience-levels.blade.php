@extends('layouts/contentLayoutMaster')

@section('title', 'Experience Levels')


@section('page-style')
@endsection

@section('content')
    <section>
        <div class="row match-height">

            <div class="col-12">
                <x-card title="Experience Levels">
                    <div class="col-12 text-end">
                        <button class="btn btn-primary mb-2" data-bs-toggle="offcanvas" data-bs-target="#addCanvas">Add
                            Experience Level</button>
                    </div>
                    <livewire:tables.experience-level-table />
                </x-card>
            </div>
        </div>
    </section>

    <x-offcanvas id="addCanvas" title="Add Experience Level">
        <x-form class="g-1" id="add-experience-level" :route="route('admin.metadata.experience-levels.store')">
            <div class="col-12">
                <x-input name="name" />
            </div>
        </x-form>
    </x-offcanvas>

@endsection


@section('page-script')

@endsection
