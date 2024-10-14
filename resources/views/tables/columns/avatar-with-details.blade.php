@if ($getLink())
    <a href="{{ $getLink() }}" class="group">
@endif
<div class="flex items-center {{ $getMarginStart() }} gap-3 pe-3">
    @if ($getAvatarType() == 'image')
        @if (is_null($getAvatar()))
            <div
                class="rounded-full overflow-hidden {{ $getBgSize() }} flex items-center justify-center group-hover:opacity-70 border border-gray-200">
                @svg('tabler-user', 'text-gray-600 dark:text-gray-500 h-6 w-6')
            </div>
        @else
            <div
                class="rounded-full overflow-hidden {{ $getBgSize() }} flex items-center justify-center group-hover:opacity-70">
                <img src="{{ asset($getAvatar()) }}" class="w-full h-full object-cover">
            </div>
        @endif
    @elseif ($getAvatarType() == 'name_xs')
        <div class="rounded-full overflow-hidden {{ $getBgSize() }} flex items-center justify-center group-hover:opacity-70"
            style="background-color: {{ $getBgColor() ? $getBgColor() : '#377DFF' }};">
            <p class='text-white text-base font-bold'>{{ $getNameXs() }}</p>
        </div>
    @elseif ($getAvatarType() == 'icon')
        <div style="background-color: {{ $getBgColor() ? $getBgColor() : '#377DFF' }};"
            class="rounded-full overflow-hidden {{ $getBgSize() }} flex items-center justify-center group-hover:opacity-70 border border-gray-200">
            @svg($getIcon(), 'text-white h-6 w-6')
        </div>
    @endif
    <div class="flex flex-col justify-center mb-1">
        <p class="text-sm text-gray-900 group-hover:text-gray-500">
            {{ $getTitle() }}</p>
        <p class="text-xs text-gray-600 group-hover:text-gray-400 ">
            {{ $getDescription() }}</p>
    </div>
</div>
@if ($getLink())
    </a>
@endif
