@props(['type' => 'checkbox', 'id' => ''])


<x-input {{ $attributes->merge([
    'type' => $type,
    'id' => $id,
]) }} />
<x-label>{{$id}}</x-label>