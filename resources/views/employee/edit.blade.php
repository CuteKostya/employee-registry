@extends('layouts.main')

@section('title')
    {{__('Таблица')}}
@endsection

@section('main_content')
    <main class="flex-shrink-0">
        <div class="container">
            <x-card>
                <h3>Edit </h3>
                <x-employee.form action="{{ route('employees.update', $employee->id) }}" method="put"
                                 :employee="$employee"/>

            </x-card>

        </div>
    </main>

@endsection

