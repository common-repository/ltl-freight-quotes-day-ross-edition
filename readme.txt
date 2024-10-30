=== LTL Freight Quotes - Day & Ross Edition ===
Contributors: enituretechnology
Tags: eniture,Day & Ross,LTL freight rates,LTL freight quotes, shipping estimates
Requires at least: 6.4
Tested up to: 6.6.2
Stable tag: 2.1.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Real-time LTL freight quotes from Day & Ross. Fifteen day free trial.

== Description ==

Day & Ross is a privately owned company headquartered in Elmont, NY. Its core business is less-than-truckload (LTL)freight, but it provides a variety of other freight and logistics services. If you don’t have an Day & Ross account, contact them at 1-866-329-7677.

**Key Features**

* Displays negotiated LTL shipping rates in the shopping cart.
* Provide quotes for shipments within the United States.
* Custom label results displayed in the shopping cart.
* Display transit times with returned quotes.
* Product specific freight classes.
* Support for variable products.
* Define multiple warehouses.
* Identify which products drop ship from vendors.
* Product specific shipping parameters: weight, dimensions, freight class.
* Option to determine a product's class by using the built in density calculator.
* Option to include residential delivery fees.
* Option to include fees for lift gate service at the destination address.
* Option to mark up quoted rates by a set dollar amount or percentage.
* Works seamlessly with other quoting apps published by Eniture Technology.

**Requirements**

* WooCommerce 6.4 or newer.
* Day & Ross customer number.
* Your username and password to dylt.com.
* A API key from Eniture Technology.

== Installation ==

**Installation Overview**

Before installing this plugin you should have the following information handy:

* Your Day & Ross Bill To Account Number.
* Your username and password to dylt.com.

If you need assistance obtaining any of the above information, contact your local Day & Ross office
or call the [Day & Ross](http://dylt.com/) at 1-866-329-7677.

A more comprehensive and graphically illustrated set of instructions can be found on the *Documentation* tab at
[eniture.com](https://eniture.com/woocommerce-day-ross-ltl-freight/).

**1. Install and activate the plugin**
In your WordPress dashboard, go to Plugins => Add New. Search for "LTL Freight Quotes - Day & Ross Edition", and click Install Now.
After the installation process completes, click the Activate Plugin link to activate the plugin.

**2. Get a API key from Eniture Technology**
Go to [Eniture Technology](https://eniture.com/woocommerce-day-ross-ltl-freight/) and pick a
subscription package. When you complete the registration process you will receive an email containing your API key and
your login to eniture.com. Save your login information in a safe place. You will need it to access your customer dashboard
where you can manage your API keys and subscriptions. A credit card is not required for the free trial. If you opt for the free
trial you will need to login to your [Eniture Technology](http://eniture.com) dashboard before the trial period expires to purchase
a subscription to the API key. Without a paid subscription, the plugin will stop working once the trial period expires.

**3. Establish the connection**
Go to WooCommerce => Settings =>  Day & Ross Freight. Use the *Connection* link to create a connection to your Day & Ross account.

**5. Select the plugin settings**
Go to WooCommerce => Settings => Day & Ross Freight. Use the *Quote Settings* link to enter the required information and choose
the optional settings.

**6. Enable the plugin**
Go to WooCommerce => Settings => Shipping. Click on the link for Day & Ross Freight and enable the plugin.

**7. Configure your products**
Assign each of your products and product variations a weight, Shipping Class and freight classification. Products shipping LTL freight should have the Shipping Class set to “LTL Freight”. The Freight Classification should be chosen based upon how the product would be classified in the NMFC Freight Classification Directory. If you are unfamiliar with freight classes, contact the carrier and ask for assistance with properly identifying the freight classes for your  products.

== Frequently Asked Questions ==

= What happens when my shopping cart contains products that ship LTL and products that would normally ship FedEx or UPS? =

If the shopping cart contains one or more products tagged to ship LTL freight, all of the products in the shopping cart
are assumed to ship LTL freight. To ensure the most accurate quote possible, make sure that every product has a weight, dimensions and a freight classification recorded.

= What happens if I forget to identify a freight classification for a product? =

In the absence of a freight class, the plugin will determine the freight classification using the density calculation method. To do so the products weight and dimensions must be recorded. This is accurate in most cases, however identifying the proper freight class will be the most reliable method for ensuring accurate rate estimates.

= Why was the invoice I received from Day & Ross Freight more than what was quoted by the plugin? =

One of the shipment parameters (weight, dimensions, freight class) is different, or additional services (such as residential
delivery, lift gate, delivery by appointment and others) were required. Compare the details of the invoice to the shipping
settings on the products included in the shipment. Consider making changes as needed. Remember that the weight of the packaging
materials, such as a pallet, is included by the carrier in the billable weight for the shipment.

= How do I find out what freight classification to use for my products? =

Contact your local Day & Ross Freight office for assistance. You might also consider getting a subscription to ClassIT offered
by the National Motor Freight Traffic Association (NMFTA). Visit them online at classit.nmfta.org.

= How do I get a Day & Ross Freight account? =

Check your phone book for local listings or call 804-353-1900.

= Where do I find my Day & Ross username and password? =

Email and passwords to Day & Ross online shipping system are issued by Day & Ross. Go to [Day & Ross](http://dylt.com) and click the Sign Up link at the top right of the page in "Login to My Day & Ross" window. You will be redirected to a page where you can register as a new user.

= How do I get a API key for my plugin? =

You must register your installation of the plugin, regardless of whether you are taking advantage of the trial period or
purchased a API key outright. At the conclusion of the registration process an email will be sent to you that will include the
API key. You can also login to eniture.com using the username and password you created during the registration process
and retrieve the API key from the My API keys tab.

= How do I change my plugin API key from the trail version to one of the paid subscriptions? =

Login to eniture.com and navigate to the My API keys tab. There you will be able to manage the licensing of all of your
Eniture Technology plugins.

= How do I install the plugin on another website? =

The plugin has a single site API key. To use it on another website you will need to purchase an additional API key.
If you want to change the website with which the plugin is registered, login to eniture.com and navigate to the My API keys tab.
There you will be able to change the domain name that is associated with the API key.

= Do I have to purchase a second API key for my staging or development site? =

No. Each API key allows you to identify one domain for your production environment and one domain for your staging or
development environment. The rate estimates returned in the staging environment will have the word “Sandbox” appended to them.

= Why isn’t the plugin working on my other website? =

If you can successfully test your credentials from the Connection page (WooCommerce > Settings > Day & Ross Freight > Connections)
then you have one or more of the following licensing issues:

1) You are using the API key on more than one domain. The API keys are for single sites. You will need to purchase an additional API key.
2) Your trial period has expired.
3) Your current API key has expired and we have been unable to process your form of payment to renew it. Login to eniture.com and go to the My API keys tab to resolve any of these issues.

== Screenshots ==

1. Quote settings page
2. Warehouses and Drop Ships page
3. Quotes displayed in cart

== Changelog ==

== Changelog ==

= 2.1.6 =
* Fix: Resolved "Save Settings" issue on the connection tab. 

= 2.1.5 =
* Fix: Resolved UI compatibility issue with WooCommerce versions later than 9.0.0

= 2.1.4 =
* Update: Updated connection tab according to wordpress requirements 

= 2.1.3 =
* Update: Introduced an option in the connection settings to select between dimension-based or class-based rating.

= 2.1.2 =
* Update: Introduced capability to suppress parcel rates once the weight threshold has been reached.
* Update: Compatibility with WordPress version 6.5.2
* Update: Compatibility with PHP version 8.2.0
* Fix:  Incorrect product variants displayed in the order widget.

= 2.1.1 =
* Fix: Fixed the product ID and product title in the metadata required for freightdesk.online.

= 2.1.0 =
* Update: Display “Free Shipping” at checkout when handling fee in the quote settings is -100% .
* Update: Introduced the Shipping Logs feature.
* Update: Introduced “product level markup” and “origin level markup”.

= 2.0.8 =
* Update: Compatibility with WooCommerce HPOS(High-Performance Order Storage)

= 2.0.7 =
* Update: Updated logs end point URLS. 

= 2.0.6 =
* Update: Modified expected delivery message at front-end from “Estimated number of days until delivery” to “Expected delivery by”.
* Fix: nherent Flat Rate value of parent to variations.

= 2.0.5 =
* Update: Compatibility with PHP version 8.1.
* Update: Compatibility with WordPress version 5.9.

= 2.0.4 =
* Tweak: Fix in version 2.0.3

= 2.0.3 =
* Tweak: str_replace function should not call on empty string.

= 2.0.2 =
* Update: Introduced product nesting property and hazardous features.

= 2.0.1 =
* Fix: Fixed password issue on test connection Ref ticket#565038768.

= 2.0.0 =
* Update: Updated programming structure.

= 1.2.0 =
* Update: Added feature for Pallet packaging

= 1.1.2 =
* Update: Added images URL for freightdesk.online portal

= 1.1.0 =
* Update: Added feature for Order widget details and quotes are returning on the order page

= 1.0.1 =
* Update: Compatibility with RAD addon

= 1.0 =
* Initial release.

== Upgrade Notice ==