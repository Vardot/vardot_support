# Project Boilerplate

## About
*
* Name: client/project
* Description: The Title of the Site
* Support:
  * issues: https://vardot.atlassian.net/browse/X
  * source: https://bitbucket.org/Vardot/y/src
  * chat: https://vardot.slack.com/channels/abcdefg
  * hosting: https://vardot.io

NOTE: This metadata is stored in `composer.json` and rendered after `composer install`.

When there are changes to this information, update it there, then copy the results here.

## Tips

1. To quickly open the git repo page, run: `composer browse`.
2. TBD

## Codebase

See https://bitbucket.org/Vardot/PROJECT/src.

1. The codebase must be installed with `composer install`.
2. Vendor libraries, including Drupal are not committed to the repo. .gitignore files are in place to prevent this.
3. All 5 sites (will soon) run from this single codebase

## Settings

TBD

## Config

Drupal configs are exported for each site in the [config/sync](config/sync folder).

### Syncing Config

To quickly pull config from a site into your local codebase, you can use the `drush config:pull` command:

```
drush config:pull @PROJECT.prod @self
```

Once complete, check that the changes were made against the right site before you commit.

## Hosting

- **Hosting Provider:** _______________
- **Dashboard:** https://cloud.console.dashboard.link.here


