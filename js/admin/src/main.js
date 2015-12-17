import { extend } from 'flarum/extend';
import app from 'flarum/app';

import FaviconSettingsModal from 'matpompili/favicon/components/FaviconSettingsModal';

app.initializers.add('matpompili-favicon', app => {
  app.extensionSettings['matpompili-favicon'] = () => app.modal.show(new FaviconSettingsModal());
});
