<?php namespace Matpompili\Favicon;

use Flarum\Event\ConfigureClientView;
use Illuminate\Contracts\Events\Dispatcher;
// use Flarum\Settings\SettingsRepositoryInterface;
class AddHeaderLinks
{
  /**
  * @var SettingsRepository
  */
  // protected $settings;
  // public function __construct(SettingsRepositoryInterface $settings) {
  //   $this->settings = $settings;
  // }
  public function subscribe(Dispatcher $events)
  {
    $events->listen(ConfigureClientView::class, [$this, 'addAssets']);
  }
  public function addAssets(ConfigureClientView $event)
  {
    $html = file_get_contents(realpath(__DIR__ . '/../../assets/html/links.html'));
    $event->view->addHeadString($html);
  }
}
