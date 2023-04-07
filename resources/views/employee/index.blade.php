@extends('layouts.main')

@section('title')
    Таблица
@endsection

@section('main_content')
    <main class="flex-shrink-0">
        <div class="container">
            <x-form method="get">
                <div class="row">
                    <div class="col-4">
                        <x-input type="search" name="search" value="{{ request('search') }}"
                                 placeholder="{{__('Поиск')}}"/>
                    </div>
                    <div class="col-4">
                        <x-select name="category_id" value="{{ request('category_id') }}"
                                  :options="[null => __('Все'), 1 => __('С файлом'), 2=> __('Без файлом')]
                        "/>
                    </div>
                    <div class="col-4">
                        <x-button type="submit" class="btn btn-primary">Submit</x-button>
                    </div>
                </div>
            </x-form>
            @if($employees->isEmpty())
                {{  __("Сотрудников нет")}}
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Salary</th>
                        <th scope="col">File</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <div class="col-12 col-md-4">
                                <x-employee.field :employee="$employee"/>
                            </div>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$employees->links()}}
            @endif
        </div>
    </main>
@endsection

