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

The [settings.vardot.php](./settings/settings.vardot.php) file provides default settings for various hosting providers in one place.

To use, include (or symlink) this file to your `sites/default/settings.php` file

### Acquia

The `drupal/vardot_support` global settings file will include the default Acquia settings file, or the `acquia/blt` settings file, if it exists and `AH_ENVIRONMENT` was detected.

See [settings.vardot.php, line 54](./settings/settings.vardot.php) for details.

### Lando

The `drupal/vardot_support` global settings file will include [settings.lando.php](./settings/settings.lando.php) if `LANDO` is detected.

This offers a few features:

- Automatically configures `$databases` from `LANDO_INFO`.
- If using multisite, and a database service exists with the same name as the `sites/X` folder, The `$databases` will connect using that service's credentials.
- Sets `$settings['hash_salt']`.
- Sets `$settings['trusted_host_patterns']` for lndo.site and lando's "share" feature, localtunnel.me.
- Includes Drupal's `example.settings.local.php` to enable development settings.
  - To skip this feature, set `LANDO_PROD_MODE` in lando.yml.
- Disables redirect to www when using `drupal/httpswww` module.
