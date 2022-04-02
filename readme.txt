=== Admin Code Editor Fix ===
Contributors: ishihara takashi
Tags: bug fixed
Requires at least: 5.9.2
Tested up to: 5.1.1
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Adjustment to avoid fatal errors that occur when editing php files in the theme editor and plugin editor in the admin panel.

* Added a filter hook for the problem of not being able to edit on multisite.
* Adjustment of SSL validation and CURL failure in 5.2 series.

If you do not use the editor, we recommend disabling it.