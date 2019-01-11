<?php

namespace Dewsign\VideoRepeater;

use Illuminate\Database\Eloquent\Model;
use Dewsign\NovaRepeaterBlocks\Traits\IsRepeaterBlock;

class Video extends Model
{
    use IsRepeaterBlock;

    protected $table = 'nrb_videos';

    public static $repeaterBlockViewTemplate = 'video-repeater::video';

    public function embedCode()
    {
        if ($this->platform == 'vimeo') {
            return str_replace('https://vimeo.com/', '', $this->link);
        }

        if ($this->platform == 'youtube') {
            $trimmed_link = str_replace('https://www.youtube.com/watch?v=', '', $this->link);
            return strpos($trimmed_link, '&list') ? substr($trimmed_link, 0, strpos($trimmed_link, '&list')) : $trimmed_link;
        }
    }
}
