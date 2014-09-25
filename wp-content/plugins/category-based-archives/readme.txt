=== Category Based Archives===
Contributors: echoz
Author URI: http://and.thirdly.org
Tags: category, loop, template, date
Tested up to: 2.6
Requires at least: 2.5
Stable tag: 1.0.5

Allows date based archives to be listed by category.

== Description ==

The archives within WordPress are pretty limited in a sense that they do not offer much configuration beyond what they do. Date based will be date based, like category based archives will only display categories. This plugin mitigates the issue by giving date based archives the ability to list content by categories as well.

This is done via modification of the rewrite rules to allow for the ability to have permalinks like http://yourblog.com/2008/in-blog/. This basically is a date based archive that shows only entries from the "blog" category.

This plugin can also work without the usage of rewrite rules. It currently supports date based archives for years and months.

== Installation ==

1. Upload category-based-archives.php into your plugins folder.
2. Activate and you're done.

== Usable Commands for Theme Developers ==

The PHP commands for theme developers to use are pretty straight forward.

*cba_get_category_id()* returns the current category ID of the archive.

*cba_the_year()* returns the current year of the date based archive.

*cba_the_month()* returns the current month of the date based archive.

*cba_auto_thedate()* gets the string representation of the date.

*cba_get_year_link($year)* returns the permalink for the year archive based on the current category.