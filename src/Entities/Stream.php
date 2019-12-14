<?php


namespace ProxerPHP\Entities;

use DateTime;
use ProxerPHP\Util\AnimeLanguage;

/**
 * Repraesentiert einen Stream fuer einen bestimmten Anime einer bestimmten Episode fuer eine bestimmte {@see AnimeLanguage}
 *
 * @package ProxerPHP\Entities
 *
 * @property int id Die ID des Streams
 * @property string entryname Der Name des Entrys
 * @property int count Die Maximalzahl der Episoden
 * @property string type Auf welchem Hoster der Stream liegt
 * @property string name Der Name des Hosters (Klartext)
 * @property string img Das Anzeigebild des Hosters
 * @property bool legal Zeigt an, ob es sich um einen legalen Hoster handelt (wie z.B. Crunchyroll)(0=false, 1=true)
 * @property bool public Zeigt an, ob ein Stream für Gäste zugänglich ist.
 * @property string uploader Die ID des Uploaders
 * @property string username Der Name des Uploaders
 * @property DateTime timestamp Der Verlinkzeitpunkt (Unix-Timestamp als Integer)
 * @property string|null tid Die ID der zugewiesenen Subgruppe, null wenn nicht vorhanden.
 * @property string|null tname Der Name der zugewiesenen Subgruppe, null wenn nicht vorhanden.
 * @property string htype Der Typ des Hosters (iframe,embed,js,code,link)
 */
class Stream extends Entity {

    protected $dataTypesForFields = [
        'timestamp' => Entity::TYPE_DATE,
        'legal'     => Entity::TYPE_BOOLEAN,
        'public'    => Entity::TYPE_BOOLEAN
    ];

}