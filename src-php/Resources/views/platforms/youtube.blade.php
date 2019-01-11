<div class="video-repeater video-repeater__{{ $platform }}">
    <iframe width="{{ $width ?? 640 }}" height="{{ $height ?? 360 }}" src="https://www.youtube.com/embed/{{ $repeaterContent->embedCode() }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>