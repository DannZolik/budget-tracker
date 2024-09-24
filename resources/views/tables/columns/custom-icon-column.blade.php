@php
    $iconColor = $getIconColor();
@endphp

<div class="rounded-lg w-full mb-2 flex items-center justify-center" style="height: 180px; background-color: {{ $getBgColor() }}">
    @svg($getIcon(), ['class' => 'w-24 h-24', 'style' => "fill: $iconColor;"])
</div>