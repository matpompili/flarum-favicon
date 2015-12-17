<?php namespace Matpompili\Favicon;

use Illuminate\Contracts\Events\Dispatcher;

return function(Dispatcher $events) {
    // $events->subscribe(Listeners\AddClientAssets::class);
    $events->subscribe(Listeners\AddHeaderLinks::class);
};
