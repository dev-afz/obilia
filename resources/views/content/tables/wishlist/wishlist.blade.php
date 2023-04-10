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
                    <livewire:tables.wishlist-table />
                </x-card>
            </div>
        </div>
    </section>
    <x-modal id="contract-desctiption" :footer="false" />
@endsection
@section('page-script')
    <script></script>
@endsection
