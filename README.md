# ProxerPHP

## What is this?
This is a Library for the API of the website [proxer.me](https://www.proxer.me). The current Version of the supported API is `v1`

> Note: This is still in the middle of developement, so things might work or work not.

## Installation with Composer

`composer require kid2407/proxerPHP`

## Usage

To use ProxerPHP, you have to provide your own API-Key from https://proxer.me/api.

To get started create an instance of the ProxerPHP class:
```php
$proxerPHP = new ProxerPHP\Api\ProxerPHP($apiKey);
```

Now you are ready to go. Starting from the ProxerPHP instance, you can start calling the API.
Example for getting the link to an Anime stream:
```php
$entryId = 894; // The ID of the entry
$episode = 2; // Episode to show
$language = new ProxerPHP\Util\AnimeLanguage(ProxerPHP\Util\AnimeLanguage::ENG_SUB); // The language in which the streams should be

$streams = $proxerPHP->anime()->getStreams($entryId, $episode, $language);
$streamLink = $proxerPHP->anime()->getStreamLink($streams->first());
```