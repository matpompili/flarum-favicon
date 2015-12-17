<?php namespace Matpompili\Favicon;

use Flarum\Event\ConfigureClientView;
use Illuminate\Contracts\Events\Dispatcher;
class AddClientAssets
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(ConfigureClientView::class, [$this, 'addAssets']);
    }
    public function addAssets(ConfigureClientView $event)
    {
    }
}
