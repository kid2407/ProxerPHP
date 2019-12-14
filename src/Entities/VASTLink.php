<?php


namespace ProxerPHP\Entities;


use ProxerPHP\Api\AnimeApi\AnimeApi;

/**
 * Class VASTLink
 *
 * @package ProxerPHP\Entities
 *
 * @property string link Der Link zum Stream, gleichwertig mit {@see AnimeApi::getStreamLink()}
 * @property string adTag Enthaelt den VAST-Tag, ein leerer String wenn keine Werbung angezeigt werden soll
 */
class VASTLink extends Entity {

}