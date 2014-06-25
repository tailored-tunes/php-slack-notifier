php-slack-notifier
==================

Used to send messages to slack.

The requirements of this package are constantly evolving with the development of [Tailored Tunes](http://www.tailored-tunes.com)

If you feel like you need a feature, please open an issue or a pull request!

# Installing

Install via composer. Installation help and versions at [Packagist](https://packagist.org/packages/tailored-tunes/php-slack-notifier)

# Usage

```php

use TailoredTunes\SlackNotifier;

$slackWebhookUrl = "http://team.slack.com/whatever";

$slack = new SlackNotifier($slackWebhookUrl);
$slack->send('Hi from php code', '#random');

```
