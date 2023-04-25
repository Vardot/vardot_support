# Vardot Subscriptions

This is a private Vardot feature.

Vardot Support subscription widget.


## How to add to your project by the composer

* Add the following to your project composer.json file under:
```
  "repositories": {
    "drupal": {
      "type": "composer",
      "url": "https://packages.drupal.org/8"
      },
    "assets": {
      "type": "composer",
      "url": "https://asset-packagist.org"
    },
    "vardot_subscription": {
      "vendor-alias": "vardot-proprietary",
      "type": "git",
      "url":  "git@bitbucket.org:vardot/vardot_subscription.git",
      "trunk-path": "Trunk",
      "branches-path": "Branches",
      "tags-path": "Tags"
    }
  }
```

And for the extra settings:
```

    "installer-paths": {
      "docroot/modules/custom/{$name}": ["type:drupal-custom-module"]
    },
```

* After that you could do:

```
composer require vardot-proprietary/vardot_subscription:^8.1.1" 
```

or add the following in your composer.json file

```
"vardot-proprietary/vardot_subscription": "^8.1.1"
```

or for development
```
  "vardot-proprietary/vardot_subscription": "dev-8.x-1.x"
```

