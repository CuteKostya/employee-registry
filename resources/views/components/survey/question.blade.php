<x-form-item>
    <h2>
        {{ $question->question }}
    </h2>
    @if($question->type == "text")

        <x-input type="text" name="{{$question->id}}"/>

    @elseif($question->type == "checkbox")

        @foreach($options as $option)
            @if($option->questions_id == $question->id)

                <x-checks type="checkbox" name="{{$option->id}}}" value="{{$option->option}}"/>

            @endif
        @endforeach

    @elseif($question->type == "radio")

        @foreach($options as $option)
            @if($option->questions_id == $question->id)
                <x-checks type="radio" name="{{$question->id}}}" value="{{$option->option}}"/>
            @endif
        @endforeach
    @endif
</x-form-item>