php-slack-notifier
==================

A very humble, __lightweight__ library to send messages to slack.
That's it. Nothing else.

# Installation

Install via composer. Installation help and versions at [Packagist](https://packagist.org/packages/tailored-tunes/php-slack-notifier)

# Usage

```php

use TailoredTunes\SlackNotifier;

$slackWebhookUrl = "http://team.slack.com/whatever";

$slack = new SlackNotifier($slackWebhookUrl);
$slack->send('Hi from php code', '#random');

```
