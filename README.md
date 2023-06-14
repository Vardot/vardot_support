# Vardot Support Module

# Features

"Vardot Support" is a module used by Vardot for enhancing customer's Drupal sites by:

1. A list of dependencies we want installed in every site, such as:
   - Site Audit
   - Backup Migrate
   - Raven for Sentry support.
2. A standard global `settings.php` file.
   - Sets standard Drupal settings across projects.
   - Automatic Acquia hosting config.
   - Automatic Lando config.
   - Automatic inclusion of "settings.production.php" for various hosts when in "Production Mode".
3. Vardot Support-specific Site Audit Plugins.
4. Helpful composer bin scripts such as `git-rm-ignored`.
5. Boilerplate files for easy copying into projects, such as composer.json, .lando.yml, drush files, etc.

## Settings

This module is designed to make settings.php as automatic as possible.

The [settings.vardot.php](./settings/settings.vardot.php) file is designed to be included by your project's settings.php.

The [settings.default.php](./settings/settings.default.php) file is designed to be copied into new projects settings.php files.

When starting a new project with `composer create-project vardot/varbase_project`, the settings.php file will be copied automatically.

If updating a new project, review your current settings.php file and either replace it or alter it to include the contents of [settings.default.php](./settings/settings.default.php). 

### Acquia

The `drupal/vardot_support` global settings file will include the default Acquia settings file, or the `acquia/blt` settings file, if it exists and `AH_ENVIRONMENT` was detected.

See [settings.vardot.php, line 54](./settings/settings.vardot.php) for details.

### Custom Hosts

Vardot Support module will automatically set Drupal's `$databases` connection array using environment variables, if available.

To use this feature:

- Add `loadEnvironment.php` file (included in `vardot/varbase_project`).
- Add `"autoload": {"files": ["loadEnvironment.php]}` to `composer.json`.
- Write an `.env` file to the composer root containing the database credentials.

### Lando

The `drupal/vardot_support` global settings file will include [settings.lando.php](./settings/settings.lando.php) if `LANDO` is detected.

This offers a few features:

- Sets `DRUSH_OPTIONS_URI` so all drush calls have the right URL set.
- No need to add LANDO environment detection and settings to a project's `settings.php`.
- Automatically configures `$databases` from `LANDO_INFO`.
- Sets `$settings['hash_salt']`.
- Sets `$settings['trusted_host_patterns']` for lndo.site and lando's "share" feature, localtunnel.me.
- Enables "Developer mode" automatically by including Drupal's `example.settings.local.php`. (To skip this feature, set `LANDO_PROD_MODE` in lando.yml.)
- Disables redirect to www when using `drupal/httpswww` module.
- More TBD.
