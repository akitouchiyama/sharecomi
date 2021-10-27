<?php

namespace App\Observers;

use App\Comic;

class ComicObserver
{
    /**
     * Handle the comic "created" event.
     *
     * @param  \App\Comic  $comic
     * @return void
     */
    public function created(Comic $comic)
    {
        //
    }

    /**
     * Handle the comic "updated" event.
     *
     * @param  \App\Comic  $comic
     * @return void
     */
    public function updated(Comic $comic)
    {
        //
    }

    /**
     * Handle the comic "deleted" event.
     *
     * @param  \App\Comic  $comic
     * @return void
     */
    public function deleted(Comic $comic)
    {
        //
    }

    /**
     * Handle the comic "restored" event.
     *
     * @param  \App\Comic  $comic
     * @return void
     */
    public function restored(Comic $comic)
    {
        //
    }

    /**
     * Handle the comic "force deleted" event.
     *
     * @param  \App\Comic  $comic
     * @return void
     */
    public function forceDeleted(Comic $comic)
    {
        //
    }

    public function deleting(Comic $comic)
    {
        $comic->reviews()->each(function ($review) {
            $review->delete();
        });
    }
}
