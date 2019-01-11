<?php

namespace Dewsign\VideoRepeater\Nova;

use Laravel\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Markdown;
use Illuminate\Support\Facades\File;
use Laravel\Nova\Http\Requests\NovaRequest;
use Dewsign\NovaRepeaterBlocks\Traits\IsRepeaterBlockResource;

class Video extends Resource
{
    use IsRepeaterBlockResource;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'Dewsign\VideoRepeater\Video';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'link';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'platform',
        'link',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        $options = static::availableTemplates();

        return [
            Select::make('Platform')
                ->options($options)
                ->displayUsingLabels()
                ->hideFromIndex(),
            Text::make('Link')->rules('required'),
            Text::make('Width')->rules('nullable'),
            Text::make('Height')->rules('nullable'),
        ];
    }

    private static function availableTemplates()
    {
        $packageTemplatePath = __DIR__ . '/../Resources/views/video-platforms';
        $appTemplatePath = resource_path() . '/views/vendor/video-repeater/video-platforms';

        $packageTemplates = File::exists($packageTemplatePath) ? File::files($packageTemplatePath) : null;
        $appTemplates = File::exists($appTemplatePath) ? File::files($appTemplatePath) : null;

        return collect($packageTemplates)->merge($appTemplates)->mapWithKeys(function ($file) {
            $filename = $file->getFilename();
            return [
                str_replace('.blade.php', '', $filename) => static::getPrettyFilename($filename),
            ];
        })->all();
    }

    private static function getPrettyFilename($filename)
    {
        $basename = str_replace('.blade.php', '', $filename);
        return title_case(str_replace('-', ' ', $basename));
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
