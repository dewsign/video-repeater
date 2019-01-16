# Video Repeater Block

A video repeater block for [Dewsign's Nova Repeater Blocks](https://github.com/dewsign/nova-repeater-blocks) to output a video from a specific platform.

## Installation & Usage

`composer require dewsign/video-repeater`

`php artisan migrate`

Within your repeater types add the Video

```php
public function types(Request $request)
{
    return [
        ...
        Dewsign\VideoRepeater\Nova\Video::class,
    ];
}
```

## Video Platforms

Out of the box, the default platform view template will convert any video link into its respective iframe embed snippet. If you wish to have more control over how videos from certain platforms are displayed, you can create a custom platform blade template.

To do this, create a new blade in the `/views/vendor/video-repeater/platforms` resource folder.
