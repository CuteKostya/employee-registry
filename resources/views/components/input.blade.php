@props(['value' => ''])

<input {{ $attributes->class([
    'form-control',
])->merge([
    'type' => 'text',
    'value'=>$value,
]) }}>
