# Video Repeater Block

A video repeater block for [Dewsign's Nova Repeater Blocks](https://github.com/dewsign/nova-repeater-blocks) to output a a video from a specific platform.

## Installation & Usage

`composer require dewsign/video-repeater`

`php artisan migrate`

Within your repeater types add the Video

```php{5}
public function types(Request $request)
    {
        return [
            ...
            Dewsign\VideoRepeater\Nova\Video::class,
        ];
    }
```

## Platform

You can add new platforms by adding new templates to the `/views/vendor/video-repeater/video-platforms` resource folder. The system will fallback to the default style if a view is not found.
