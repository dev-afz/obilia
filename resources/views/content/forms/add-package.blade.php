@extends('layouts/contentLayoutMaster')

@section('title', 'Add Package')

@section('content')
    <section>
        <div class="row match-height">
            <div class="col-12">
                <x-card title="Add Package">
                    <x-form :reset="false" id="add-sub-category" :route="route('admin.packages.store')">


                        <div class="col-md-6 col-12">
                            <x-select name="for" placeholder="Select who is this package for" :options="[
                                'individual' => 'Individual',
                                'agency' => 'Agency',
                            ]" />
                        </div>
                        <div class="col-md-6 col-12">
                            <x-select name="payment_type" placeholder="Select payment type" :options="[
                                'onetime' => 'One Time',
                                'subscription' => 'Subscription',
                            ]" />
                        </div>

                        <div class="col-md-6 col-12">
                            <x-input name="name" />
                        </div>
                        <div class="col-md-6 col-12">
                            <x-input name="title" />
                        </div>
                        <div class="col-md-4 col-12">
                            <x-input name="duration" label="Duration (in days)" type="number" />
                        </div>
                        <div class="col-md-4 col-12">
                            <x-input name="price" label="Price (per month)" type="number" />
                        </div>
                        <div class="col-md-4 col-12">
                            <x-input value="0" name="discount" label="Discount (in percent)" type="number" />
                        </div>


                        <x-divider text="Package Perks" />

                        <x-repeater name="perks" :fields="[
                            [
                                'name' => 'title',
                                'type' => 'select',
                                'options' => [
                                    'commition' => 'Commition',
                                    'credits' => 'Credits',
                                    'connections' => 'Connections',
                                    'job_applications' => 'Job Applications',
                                    'watermark' => 'Watermark',
                                ],
                                'col' => 6,
                            ],
                            ['name' => 'value', 'col' => 4],
                        ]" />

                    </x-form>
                </x-card>
            </div>
        </div>
    </section>
@endsection
