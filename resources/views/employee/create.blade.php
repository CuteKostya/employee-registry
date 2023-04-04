@extends('layouts.main')

@section('title', 'Создать сотрудника')

@section('main_content')
    <main class="flex-shrink-0">
        <div class="container">
            <x-card>
                <h3>Add new </h3>
                <x-employee.form action="{{ route('employees.store') }}" method="post"/>

            </x-card>

        </div>
    </main>

@endsection

