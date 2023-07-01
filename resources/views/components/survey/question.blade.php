<h2>
    {{ $question->question }}
</h2>
@if($question->type == "text")

    <x-input type="text" name="{{$question->id}}"/>

@elseif($question->type == "checkbox")

    @foreach($options as $option)
        @if($option->questions_id == $question->id)

            <x-checks type="checkbox" id="{{$option->option}}"/>
            
        @endif
    @endforeach

@elseif($question->type == "radio")

    <x-input type="radio" name="{{$question->id}}"/>

@endif