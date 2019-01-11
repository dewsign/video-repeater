<div class="video-repeater video-repeater__{{ $platform }}">
    <iframe src="https://player.vimeo.com/video/{{ $repeaterContent->embedCode() }}" width="{{ $width ?? 640}}" height="{{ $height ?? 360 }}" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
</div>
    