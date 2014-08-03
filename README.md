# Rollbar Yii2 Error Handler

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
php composer.phar require --prefer-dist ladamalina/yii2-rollbar "*"
```

or add

```json
"ladamalina/yii2-rollbar": "*"
```

to the require section of your `composer.json` file.

## Usage

All of these blocks may be included in one config file (frontend/config/main-local.php) for 
quite simple applications, but here I`m describing installation for real "advanced" monsters
like our [elections platform](http://igraprestolov.vybory.tv/).

Your most global main.php file:

```php
'bootstrap' => ['rollbar'],
'components' => [
    'rollbar' => [
        'class' => 'ladamalina\yii2_rollbar\RollbarComponent',
        'accessToken' => 'POST_SERVER_ITEM_ACCESS_TOKEN',
    ],
],
```

main-local.php (common/config/main-local.php for advanced app template):

```php
'components' => [
  'rollbar' => [
      'environment' => 'production', // you environment name
  ],
],
```

and finally app local config (frontend/config/main-local.php for advanced app template):

```php
'components' => [
  'errorHandler' => [
      // handling uncaught PHP exceptions, execution and fatal errors
      'class' => 'ladamalina\yii2_rollbar\WebErrorHandler',
  ],
],
```

## TBD: ConsoleErrorHandler
