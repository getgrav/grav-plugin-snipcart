# Grav Snipcart Plugin

`Snipcart` is a [Grav](http://github.com/getgrav/grav) plugin that adds support for the very simple and nicely done [Snipcart Shop](http://snipcart.com).

# Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `snipcart`.

You should now have all the plugin files under

	/your/site/grav/user/plugins/snipcart

>> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav), the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) plugins, and a theme to be installed in order to operate.

# Usage

In order to use Snipcart you need to have an `API` key. You first need to [register](https://app.snipcart.com/account/register), if you aren't already.

Once you have signed up and confirmed your account, log in and head to the `Account > Credentials` section, where you will find your `API` key. 

> Notice that you’ll be in test mode by default, thus using your test `API` key.

Reference: [Snipcart Documentation](http://docs.snipcart.com/).

When you have the `API` key you can now edit the plugin to use it. To do so go to the user/plugins/snipcart/ folder and create the file `snipcart.yaml`, if it doesn't exist already, and copy the contents of the file [snipcart.yaml](snipcart.yaml) in it.

Edit the file and replace `YOUR_API_KEY` with the key that Snipcart provides you with.

> Note: If you want to see this plugin in action, have a look at our [Shop Site Skeleton](http://github.com/grav/grav-skeleton-shop-site/archive/master.zip) 

# Config Defaults

```
api_key: YOUR_API_KEY
```
