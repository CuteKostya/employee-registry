@props(['employee' =>null])


<x-form {{ $attributes }} enctype="multipart/form-data">
    <x-form-item>
        <x-label required>
            {{ __('Name') }}
        </x-label>
        <x-input type="text" name="name" value="{{ $employee->name ?? '' }}"/>
    </x-form-item>

    <x-form-item>
        <x-label required>
            {{ __('Age') }}
        </x-label>
        <x-input type="number" name="age" value="{{ $employee->age  ?? ''}}"/>
    </x-form-item>

    <x-form-item>
        <x-label required>
            {{ __('Salary') }}
        </x-label>
        <x-input type="number" name="salary" value="{{ $employee->salary  ?? ''}}"/>
    </x-form-item>
    <x-form-item>
        <x-label required>
            {{ __('File') }}
        </x-label>
        <x-input type="file" name="file"/>
    </x-form-item>

    <x-button type="submit" class="btn btn-primary">Submit</x-button>
</x-form>
