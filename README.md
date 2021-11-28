# test-case

## Create a library to interact with Medium REST API using Integration Tokens.

/application/libraries/MediumAPI.php

## Create a Controller called profile. GET current profile via library and display only the name & url.

/application/controllers/Profile.php

## Create a Controller called post. Listen to get params (title & content) and submit a post to medium via library as draft.

/application/controllers/Post.php

## Create a Controller called publications. GET publications of associated medium account via library and display output.

/application/controllers/Publications.php

## Develop using CodeIgniter 3.X

v3.1.11

## Store Medium Integration Token in constants config file

/application/config/constants.php

```
/* Media integration Token*/
defined('MEDIA_INTEGRATION_TOKEN')  OR define('MEDIA_INTEGRATION_TOKEN', '22522d67ca9039f2d6ad68f4cb8e7ce0524f6f7936742c6fd7c8b9b8e529e5f75');
```

## Do not use any third-party libraries or packages

OK

