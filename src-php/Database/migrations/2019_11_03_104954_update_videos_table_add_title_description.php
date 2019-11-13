<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateVideosTableAddTitleDescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nrb_videos', function (Blueprint $table) {
            $table->string('title')->nullable()->after('platform');
            $table->text('description')->nullable()->after('link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nrb_videos', function (Blueprint $table) {
            $table->dropColumn(['title', 'description']);
        });
    }
}
