<?php

namespace App\Listeners;

use App\Events\PostViews;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use phpDocumentor\Reflection\Types\False_;

class IncreaseCounter
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
     * @param  PostViews  $event
     * @return void
     */
    public function handle(PostViews $event)
    {
        $this -> updateViews($event -> post);
    }
    function updateViews ($post){
        $post ->views = $post ->views + 1;
        $post ->save();
    }
}
