@extends('layouts/contentLayoutMaster')

@section('title', 'Skills')


@section('page-style')
@endsection

@section('content')
    <section>
        <div class="row match-height">

            <div class="col-12">
                <x-card title="Skills">
                    <div class="col-12 text-end">
                        <button class="btn btn-primary mb-2" data-bs-toggle="offcanvas" data-bs-target="#addCanvas">Add
                            Skill</button>
                    </div>
                    <livewire:tables.skill-table />
                </x-card>
            </div>
        </div>
    </section>

    <x-offcanvas id="addCanvas" title="Add Skill">
        <x-form class="g-1" id="add-skill" :route="route('admin.metadata.skills.store')">
            <div class="col-12">
                <x-input name="name" />
            </div>
        </x-form>
    </x-offcanvas>

@endsection
@section('page-script')

@endsection
