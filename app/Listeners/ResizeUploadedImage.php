<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use UniSharp\LaravelFilemanager\Events\ImageWasUploaded;
use Image;

class ResizeUploadedImage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */

    // https://unisharp.github.io/laravel-filemanager/events
    // https://laracasts.com/discuss/channels/tips/resize-and-optimize-images-upon-upload-with-laravel-filemanager
    
    public function handle(ImageWasUploaded $event)
    {
        // $path = $event->path();
        // $image = Image::make($path);
        // if ($image->width() < 1000) {
        //     return;
        // }
        // $image->resize(1000, null, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save($path);
    }
}
