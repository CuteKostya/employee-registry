@props(['value' => '', 'type' => 'text', 'id' => ''])

<input {{ $attributes->class([
    ($type == 'text' ? 'form-control' : ''),
    (($type == 'checkbox' || $type == 'radio') ? 'form-check-input' : ''),
])->merge([
    'type' => $type,
    'value' => $value,
    'id' => $id,
]) }}>
