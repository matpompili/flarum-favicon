<?php namespace Matpompili\Favicon\Listeners;

use Flarum\Event\ConfigureClientView;
use Illuminate\Contracts\Events\Dispatcher;
use Flarum\Settings\SettingsRepositoryInterface;
class AddHeadLinks
{
  /**
  * @var SettingsRepository
  */
  protected $settings;
  public function __construct(SettingsRepositoryInterface $settings) {
    $this->settings = $settings;
  }
  public function subscribe(Dispatcher $events)
  {
    $events->listen(ConfigureClientView::class, [$this, 'addAssets']);
  }
  public function addAssets(ConfigureClientView $event)
  {
    $faviconFolder = $this->settings->get('matpompili.favicon.folder');
    if($faviconFolder) {
      $rawHtml = file_get_contents(realpath(__DIR__ . '/../../assets/html/links.html'));
      $html = str_replace("%%FAVICON_FOLDER%%", $faviconFolder, $rawHtml);
      $html = str_replace("%%PRIMARY_COLOR%%", $this->settings->get('theme_primary_color'), $html);
      $html = str_replace("%%APP_NAME%%", $this->settings->get('forum_title'), $html);
      $event->view->addHeadString($html);
    }
  }
}
