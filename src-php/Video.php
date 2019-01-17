<?php

namespace Dewsign\VideoRepeater;

use MediaEmbed\MediaEmbed;
use Illuminate\Database\Eloquent\Model;
use Dewsign\NovaRepeaterBlocks\Traits\IsRepeaterBlock;
use Dewsign\NovaRepeaterBlocks\Traits\CanBeContainerised;

class Video extends Model
{
    use IsRepeaterBlock;
    use CanBeContainerised;

    protected $table = 'nrb_videos';

    public static $repeaterBlockViewTemplate = 'video-repeater::video';

    public function embedCode()
    {
        $mediaEmbed = new MediaEmbed();
        return $mediaEmbed->parseUrl($this->link)->stub('id');
    }

    public function getRenderEmbedAttribute()
    {
        $mediaEmbed = new MediaEmbed();
        return $mediaEmbed->parseUrl($this->link)
            ->setWidth($this->width ?? '640')
            ->setHeight($this->height ?? '360')
            ->getEmbedCode();
    }
}
