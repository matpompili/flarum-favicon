<?php namespace Matpompili\Favicon\Listeners;
/*
* This file is part of flarum-favicon.
*
* (c) Matteo Pompili <matpompili@gmail.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
use DirectoryIterator;
use Flarum\Event\ConfigureClientView;
use Flarum\Event\ConfigureLocales;
use Illuminate\Contracts\Events\Dispatcher;
class AddClientAssets
{
  public function subscribe(Dispatcher $events)
  {
    $events->listen(ConfigureClientView::class, [$this, 'addAssets']);
    $events->listen(ConfigureLocales::class, [$this, 'addLocales']);
  }
  public function addAssets(ConfigureClientView $event)
  {
    if($event->isAdmin()) {
      $event->addAssets([
        __DIR__ . '/../../js/admin/dist/extension.js',
      ]);
      $event->addBootstrapper('matpompili/favicon/main');
    }
  }

  public function addLocales(ConfigureLocales $event)
  {
    foreach (new DirectoryIterator(__DIR__.'/../../locale') as $file) {
      if ($file->isFile() && in_array($file->getExtension(), ['yml', 'yaml'])) {
        $event->locales->addTranslations($file->getBasename('.'.$file->getExtension()), $file->getPathname());
      }
    }
  }
}
