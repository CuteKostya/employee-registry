@props(['value' => '', 'type' => 'text', 'name' => ''])

<input {{ $attributes->class([
    ($type == 'text' ? 'form-control' : ''),
    (($type == 'checkbox' || $type == 'radio') ? 'form-check-input' : ''),
])->merge([
    'type' => $type,
    'value' => $value,
    'name' => $name,
]) }}>
