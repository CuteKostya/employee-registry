@extends('layouts.main')

@section('page.title', 'Опрос')


@section('main_content')
    <div class="container">
        @foreach($questions as $question)
            <x-survey.question :question="$question"/>
        @endforeach
    </div>
@endsection