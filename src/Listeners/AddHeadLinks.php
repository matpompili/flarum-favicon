<?php namespace Matpompili\Favicon\Listeners;
/*
* This file is part of flarum-favicon.
*
* (c) Matteo Pompili <matpompili@gmail.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
use Flarum\Event\ConfigureClientView;
use Flarum\Settings\SettingsRepositoryInterface;
use Flarum\Forum\UrlGenerator;
use Illuminate\Contracts\Events\Dispatcher;

class AddHeadLinks
{
  protected $settings;
  protected $urlGenerator;

  public function __construct(SettingsRepositoryInterface $settings, UrlGenerator $urlGenerator) {
    $this->settings = $settings;
    $this->urlGenerator = $urlGenerator;
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
      $html = str_replace("%%BASE_URL%%", $this->urlGenerator->toBase(), $rawHtml);
      $html = str_replace("%%FAVICON_FOLDER%%", $faviconFolder, $html);
      $html = str_replace("%%PRIMARY_COLOR%%", $this->settings->get('theme_primary_color'), $html);
      $html = str_replace("%%APP_NAME%%", $this->settings->get('forum_title'), $html);
      $event->view->addHeadString($html);
    }
  }
}
