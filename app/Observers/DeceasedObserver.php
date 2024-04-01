<?php

namespace App\Observers;

use App\Models\Deceased;
class DeceasedObserver
{
    /**
     * Handle the Deceased "created" event.
     */
    public function created(Deceased $deceased): void
    {
      qrCodeCreate($deceased);
    }

    /**
     * Handle the Deceased "updated" event.
     */
    public function updated(Deceased $deceased): void
    {
        //
    }

    /**
     * Handle the Deceased "deleted" event.
     */
    public function deleted(Deceased $deceased): void
    {
        //
    }

    /**
     * Handle the Deceased "restored" event.
     */
    public function restored(Deceased $deceased): void
    {
        //
    }

    /**
     * Handle the Deceased "force deleted" event.
     */
    public function forceDeleted(Deceased $deceased): void
    {
        //
    }
}
