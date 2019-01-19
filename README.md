# Simple-Checkout-System

Section 2: Simple Checkout System
Digi-X is starting a computer store. You have been engaged to build the checkout system.
We will start with the following products in our catalogue:
| SKU | Name | Price |
| -------- |:--------------------:| --------:|
| ipd | Super iPad | $549.99 |
| mbp | MacBook Pro | $1399.99 |
| atv | Apple TV | $109.50 |
| vga | VGA adapter | $30.00 |
As we're launching our new computer store, we would like to have a few opening day specials.
● We're going to have a 3 for 2 deal on Apple TVs. For example, if you buy 3 units of
Apple TVs, you will only pay for the price of 2 units
● The brand new Super iPad will have a bulk discount applied, where the price will drop to
$499.99 each, if someone buys more than 4 units
● We will bundle in a VGA adapter free of charge with every MacBook Pro sold
Our checkout system can scan items in any order.
(continued on next page)
The interface to our checkout looks like this (example shown in php):
php
Checkout co = new Checkout(pricingRules);
co->scan(item1);
co->scan(item2);
co->total();
Your task is to implement a checkout system that fulfils the requirements described above.
Example scenarios:
SKUs Scanned: atv, atv, atv, vga
Total expected: $249.00
SKUs Scanned: atv, ipd, ipd, atv, ipd, ipd, ipd
Total expected: $2718.95
SKUs Scanned: mbp, vga, ipd
Total expected: $1949.98
Implementation reminders:
● Try not to spend more than 3 hours on this - we don't want you to lose a weekend over
this!
● Don't build GUIs etc - we're more interested in your approach to solving the given task,
not how shiny it looks
● Don't worry about making a command line interface to the application
● Don't use any frameworks (laravel, cakephp, lumen, Symphony etc), or any external
modules (unless it's for testing)
● Don’t worry about creating databases with tables, you can use a simple json, xml as your
data
