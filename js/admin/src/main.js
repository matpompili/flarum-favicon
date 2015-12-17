/*
* This file is part of flarum-favicon.
*
* (c) Matteo Pompili <matpompili@gmail.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
import { extend } from 'flarum/extend';
import app from 'flarum/app';

import FaviconSettingsModal from 'matpompili/favicon/components/FaviconSettingsModal';

app.initializers.add('matpompili-favicon', app => {
  app.extensionSettings['matpompili-favicon'] = () => app.modal.show(new FaviconSettingsModal());
});
