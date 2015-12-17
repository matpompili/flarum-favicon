/*
* This file is part of flarum-favicon.
*
* (c) Matteo Pompili <matpompili@gmail.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
import SettingsModal from 'flarum/components/SettingsModal';

export default class FaviconSettingsModal extends SettingsModal {
  className() {
    return 'FaviconSettingsModal Modal--small';
  }

  title() {
    return 'Favicon Settings';
  }

  form() {
    return [
      <div className="Form-group">
        <label>{app.translator.trans('matpompili-favicon.admin.favicon-folder')}</label>
        <p>{app.translator.trans('matpompili-favicon.admin.download-pack')} <a href="https://realfavicongenerator.net/" target="_blank">{app.translator.trans('matpompili-favicon.admin.here')}</a></p>
        <input className="FormControl" bidi={this.setting('matpompili.favicon.folder')}/>
      </div>
    ];
  }
}
