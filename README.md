# flarum-favicon
**flarum-favicon** is a [Flarum](https://github.com/flarum/flarum/) extension to add a favicon set to you forum.

>Flarum is a free, open-source forum software built with PHP and Mithril.js.

## Features
With flarum-favicon you can add a favicon pack, generated with [RealFaviconGenerator.net](https://realfavicongenerator.net/), to your flarum forum.

It supports:
- The usual small favicon you see on the top of the browser tab, but also
- the Android, iOS and Windows Phone bookmarks, as well as
- Mac and Windows desktop bookmarks.

## Install
The only way to get flarum-favicon is with composer: in your flarum folder run
  ```
  composer require matpompili/flarum-favicon
  ```

Then enable it you administration panel. Done!

## Configuration
You need to get a favicon pack with [RealFaviconGenerator.net](https://realfavicongenerator.net/), which is **free** and **highly customizable**. After you chose all the icons, compression, interpolation and so on, you will be able to download the favicon pack as a **zip file**.

Now you will need to extract that zip file to a folder inside you flarum home, e.g `myFavicons`.

Finally, in the admin panel, open flarum-favicon settings. You will need to put the **name** of the folder that's inside your flarum home folder. With reference to the previous example, it would be `myFavicons`.

And that's it!
