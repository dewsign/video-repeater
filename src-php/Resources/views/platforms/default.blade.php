<div class="video-repeater video-repeater__{{ $platform }}">
    @isset($repeaterContent->title)
        <h3>{{ $repeaterContent->title }}</h3>
    @endisset

    {!! $repeaterContent->renderEmbed !!}

    @isset($repeaterContent->description)
        <p>{{ $repeaterContent->description }}</p>
    @endisset
</div>
    