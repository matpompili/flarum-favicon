System.register('matpompili/favicon/components/FaviconSettingsModal', ['flarum/components/SettingsModal'], function (_export) {
  /*
  * This file is part of flarum-favicon.
  *
  * (c) Matteo Pompili <matpompili@gmail.com>
  *
  * For the full copyright and license information, please view the LICENSE
  * file that was distributed with this source code.
  */
  'use strict';

  var SettingsModal, FaviconSettingsModal;
  return {
    setters: [function (_flarumComponentsSettingsModal) {
      SettingsModal = _flarumComponentsSettingsModal['default'];
    }],
    execute: function () {
      FaviconSettingsModal = (function (_SettingsModal) {
        babelHelpers.inherits(FaviconSettingsModal, _SettingsModal);

        function FaviconSettingsModal() {
          babelHelpers.classCallCheck(this, FaviconSettingsModal);
          babelHelpers.get(Object.getPrototypeOf(FaviconSettingsModal.prototype), 'constructor', this).apply(this, arguments);
        }

        babelHelpers.createClass(FaviconSettingsModal, [{
          key: 'className',
          value: function className() {
            return 'FaviconSettingsModal Modal--small';
          }
        }, {
          key: 'title',
          value: function title() {
            return 'Favicon Settings';
          }
        }, {
          key: 'form',
          value: function form() {
            return [m(
              'div',
              { className: 'Form-group' },
              m(
                'label',
                null,
                app.translator.trans('matpompili-favicon.admin.favicon-folder')
              ),
              m(
                'p',
                null,
                app.translator.trans('matpompili-favicon.admin.download-pack'),
                ' ',
                m(
                  'a',
                  { href: 'https://realfavicongenerator.net/', target: '_blank' },
                  app.translator.trans('matpompili-favicon.admin.here')
                )
              ),
              m('input', { className: 'FormControl', bidi: this.setting('matpompili.favicon.folder') })
            )];
          }
        }]);
        return FaviconSettingsModal;
      })(SettingsModal);

      _export('default', FaviconSettingsModal);
    }
  };
});;
System.register('matpompili/favicon/main', ['flarum/extend', 'flarum/app', 'matpompili/favicon/components/FaviconSettingsModal'], function (_export) {
  /*
  * This file is part of flarum-favicon.
  *
  * (c) Matteo Pompili <matpompili@gmail.com>
  *
  * For the full copyright and license information, please view the LICENSE
  * file that was distributed with this source code.
  */
  'use strict';

  var extend, app, FaviconSettingsModal;
  return {
    setters: [function (_flarumExtend) {
      extend = _flarumExtend.extend;
    }, function (_flarumApp) {
      app = _flarumApp['default'];
    }, function (_matpompiliFaviconComponentsFaviconSettingsModal) {
      FaviconSettingsModal = _matpompiliFaviconComponentsFaviconSettingsModal['default'];
    }],
    execute: function () {

      app.initializers.add('matpompili-favicon', function (app) {
        app.extensionSettings['matpompili-favicon'] = function () {
          return app.modal.show(new FaviconSettingsModal());
        };
      });
    }
  };
});