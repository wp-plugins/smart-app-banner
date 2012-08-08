=== Plugin Name ===
Contributors: stephend
Tags: ios, iphone, smart, app, banner
Requires at least: 3.1.4
Tested up to: 3.4
Stable tag: 0.2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This is a WordPress plugin that allows you to use the Smart App Banners that were introduced at WWDC 2012 for iOS6 devices.

== Description ==

This is a WordPress plugin that allows you to use the Smart App Banners that were introduced at WWDC 2012 for iOS6 devices. The information to make this plugin, however, was created using [publicly available information](http://www.quora.com/iOS-6/How-will-Smart-App-Banners-work).

In short, you download and activate the plugin. On pages and posts you should find a "Smart App Banner" settings box. If you want the Smart App Banner to appear on this page then enter the App ID of your application here.

If you want to display a banner on the home page there's a setting screen (Settings -> Smart App Banner) where you can enter the App ID.

You can find the App ID in iTunes Connect or if the iTunes URL for your app looks like this:

http://itunes.apple.com/us/app/rootn-tootn-baby-feed-timer/id530589336?ls=1&mt=8

Then your ID is the number.

== Installation ==

1. Upload `wsl-smart-app-banner.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add your App ID on the home page and/or specific pages or posts

== Screenshots ==

No screenshots until iOS6 is released and there's nothing covered by the NDA.

== Frequently Asked Questions ==

= I can't see the banner! =

It's only available on iOS6 and above and that's not out yet!

= I have iOS6 and I still can't see it =

Can you see the header in the page? Did you get the App ID correct?

Also remember that it's still in beta. I saw a few crashes (of Safari) when the app was not available in the US (despite me being in the UK).

= Does it really need WordPress version 3.1.4? =

Probably not. But since I always keep my installations up to date I have no way of testing on older versions. I believe it should work going back all the way to 1.5.1, but I've not tried. Let me know if you get it working.

= It's really great! How can I ever thank you?! =

You can always buy my apps. Have a look at http://www.wandlesoftware.com/.

== Upgrade Notice ==

If you're upgrading from version 0.1 you'll need to add your App IDs again I'm afraid. You can remove the old wsl-app-id custom field.

== Changelog ==

= 0.2.1 =
* Show admin box for all page types, not just page and post

= 0.2 =
* Option to display a banner on the home page
* Settings box rather than having to enter custom fields manually
* Fix 'Warning: Missing argument 1 for get_page()' error

= 0.1 =
* Initial version

