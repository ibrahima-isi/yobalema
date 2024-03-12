@php

    $id ??= 'exampleModal';
    $text ??= 'Modal button';
    $btnColor ??= 'primary';

@endphp

<!-- Button trigger modal -->
<button type="button" class="btn btn-{{ $btnColor }}" data-bs-toggle="modal" data-bs-target="#{{ $id }}">
    {{ $text }}
</button>
