@extends('layouts.main')

@section('title')
    Таблица
@endsection

@section('main_content')
    <main class="flex-shrink-0">
        <div class="container">
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

