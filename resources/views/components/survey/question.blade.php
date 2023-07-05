<x-form-item>
    <h2>
        {{ $question->question }}
    </h2>
    @if($question->type == "text")

        <label>
            <label><input type="text" name="text[{{$question->id}}][]"/>
            </label>
        </label>
    @elseif($question->type == "checkbox")

        @foreach($options as $option)
            @if($option->questions_id == $question->id)

                <label>
                    <label><input type="checkbox" name="checkBox[{{$question->id}}][]" value="{{$option->id}}"/>
                        {{ $option->option }}
                    </label>
                </label>

            @endif
        @endforeach

    @elseif($question->type == "radio")

        @foreach($options as $option)
            @if($option->questions_id == $question->id)
                <label>
                    <label><input type="radio" name="radio[{{$question->id}}][]" value="{{$option->id}}"/>
                        {{ $option->option }}
                    </label>
                </label>
            @endif
        @endforeach
    @endif
</x-form-item>