<x-offcanvas id="edit_industry" title="Edit Industry">
    <x-form id="update-industry" :route="route('admin.metadata.industries.update')">
        <div class="col-12">
            <x-input name="name" :value="$this->edit_data?->name" />
            <input type="hidden" name="id" value="{{ $this->edit_data?->id }}">
        </div>
        <div class="col-12">
            <x-input-file name="image" :value="$this->edit_data?->image" />
        </div>
    </x-form>
</x-offcanvas>
