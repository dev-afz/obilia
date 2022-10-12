@extends('layouts/contentLayoutMaster')

@section('title', 'Packages')


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
                <x-card title="Packages">
                    <livewire:tables.package-table />
                </x-card>
            </div>
        </div>
    </section>
@endsection


@section('page-script')
    <script></script>
@endsection
