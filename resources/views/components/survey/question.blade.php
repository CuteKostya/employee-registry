<h2>
    {{ $question->question }}
</h2>
@if($question->type == "text")

    <x-input type="text" name="{{$question->id}}"/>

@elseif($question->type == "checkbox")

    <x-checks type="checkbox" id="{{$question->options}}"/>


    <div class="form-check">
        <x-input type="checkbox" id="flexCheckDefault"/>
        <x-label class="form-check-label" for="flexCheckDefault">
            Default checkbox
        </x-label>
    </div>

@elseif($question->type == "radio")

    <x-input type="radio" name="{{$question->id}}"/>
@endif