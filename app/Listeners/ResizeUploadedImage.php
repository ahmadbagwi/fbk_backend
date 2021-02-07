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
    
    public function handle(ImageWasUploaded $event)
    {
        $path = $event->path();
        //your code, for example resizing and cropping
        // https://unisharp.github.io/laravel-filemanager/events
        $image = Image::make($path);
        if ($image->width() < 1000) {
            return;
        }
        $image->resize(1000, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path);
    }
}
