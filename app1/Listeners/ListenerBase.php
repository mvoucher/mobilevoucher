<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\Theuser;

class ListenerBase
{
    /**
     * The theuser instance.
     *
     * @var App\Services\theuser
     */
    protected $theuser;

    /**
     * Create the event listener.
     *
     * @param App\Services\Theuser $theuser  
     * @return void
     */
    public function __construct(Theuser $theuser)
    {
        $this->theuser = $theuser;
    }
}
