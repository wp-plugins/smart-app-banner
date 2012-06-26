=== Plugin Name ===
Contributors: stephend
Tags: ios, iphone, smart, app, banner
Requires at least: 3.1.4
Tested up to: 3.4
Stable tag: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This is a WordPress plugin that allows you to use the Smart App Banners that were introduced at WWDC 2012 for iOS6 devices.

== Description ==

This is a WordPress plugin that allows you to use the Smart App Banners that were introduced at WWDC 2012 for iOS6 devices. The information to make this plugin, however, was created using [publicly available information](http://www.quora.com/iOS-6/How-will-Smart-App-Banners-work).

In short, you download and activate the plugin. When it finds a post or a page with the "wsl-app-id" custom field it adds the correct header information to the page to make the Smart App Banner appear.

"wsl-app-id" should be set to the App ID of your application. You can find this in iTunes Connect or if the iTunes URL for your app looks like this:

http://itunes.apple.com/us/app/rootn-tootn-baby-feed-timer/id530589336?ls=1&mt=8

Then your ID is the number.

== Installation ==

1. Upload `wsl-smart-app-banner.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add the 'wsl-app-id' custom field to the pages you want the banner to appear on

== Screenshots ==

No screenshots until iOS6 is released and there's nothing covered by the NDA.

== Frequently Asked Questions ==

= I can't see the banner! =

It's only available on iOS6 and above and that's not out yet!

= I have iOS6 and I still can't see it =

Did you set the wsl-app-id custom field on the page in question? Can you see the header in the page?

= Does it really need WordPress version 3.4? =

Probably not. But since I always keep my installations up to date I have no way of testing on older versions. I believe it should work going back all the way to 1.5.1, but I've not tried. Let me know if you get it working.

== Changelog ==

= 0.1 =
* Initial version

