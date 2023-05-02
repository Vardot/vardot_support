<?php

$lando_info = json_decode(getenv('LANDO_INFO'), TRUE);
putenv('DRUSH_OPTIONS_URI=' . $lando_info['appserver']['urls'][1]);
