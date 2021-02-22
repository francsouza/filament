@php
    $table = $this->getTable();
@endphp

<div class="space-y-4 my-4">
    <div class="lg:flex items-center space-y-4 lg:space-y-0 lg:space-x-4 justify-between">
        <div class="flex-shink-0 space-x-3">
            <x-filament::button>Add Product</x-filament::button>

{{--            <x-filament::button color="danger">Remove 1 Product</x-filament::button>--}}
        </div>

        <x-tables::filter :table="$table" />
    </div>

    <x-tables::table
        :records="$records"
        :sort-column="$sortColumn"
        :sort-direction="$sortDirection"
        :table="$table"
    />

    <x-filament::modal
        :name="static::$relationship.'CreateModal'"
    >
        <x-forms::container :form="$this->getForm()">
            Create
        </x-forms::container>
    </x-filament::modal>

    <x-filament::modal
        :name="static::$relationship.'EditModal'"
    >
        <x-filament::card class="space-y-5 max-w-4xl">
            <x-forms::container :form="$this->getForm()">
                Save
            </x-forms::container>
        </x-filament::card>
    </x-filament::modal>
</div>