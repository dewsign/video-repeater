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
use Dewsign\NovaRepeaterBlocks\Models\Repeater;
use Dewsign\NovaRepeaterBlocks\Traits\IsRepeaterBlockResource;
use Dewsign\NovaRepeaterBlocks\Traits\ResourceCanBeContainerised;

class Video extends Resource
{
    use IsRepeaterBlockResource;
    use ResourceCanBeContainerised;

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
        $options = array_merge(
            Repeater::customTemplates(__DIR__ . '/../Resources/views/platforms'),
            Repeater::customTemplates(resource_path('/views/vendor/video-repeater/platforms'))
        );

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
}
