# UCF Departments Taxonomy Plugin #

Provides a taxonomy for describing departments

## Description ##

Provides a taxonomy for describing departments. In addition, if the [UCF Colleges Taxonomy](https://github.com/UCF/UCF-Colleges-Tax-Plugin) plugin is installed, you can map departments to colleges.

The departments taxonomy is applied to the 'degree' and 'person' post types by default.


## Installation ##

### Manual Installation ###
1. Upload the plugin files (unzipped) to the `/wp-content/plugins` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the "Plugins" screen in WordPress

### WP CLI Installation ###
1. `$ wp plugin install --activate https://github.com/UCF/UCF-Departments-Tax-Plugin/archive/master.zip`.  See [WP-CLI Docs](http://wp-cli.org/commands/plugin/install/) for more command options.


## Changelog ##

### 1.0.1 ###
Bug Fixes:
* Fixed rewrite rule flushing on plugin activation and deactivation.
* Removed `post_type_exists()` check that returned false positives in `UCF_Departments_Taxonomy::register()`.

Enhancements:
* Added helper functions `UCF_Departments_Common::get_website_link()` and `UCF_Departments_Common::get_name_or_alias()`.

### 1.0.0 ###
* Initial release


## Upgrade Notice ##

n/a


## Installation Requirements ##

None


## Development & Contributing ##

NOTE: this plugin's readme.md file is automatically generated.  Please only make modifications to the readme.txt file, and make sure the `gulp readme` command has been run before committing readme changes.
