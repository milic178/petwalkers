<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 25.5.2017
 * Time: 20:05
 */

namespace app\components;

use yii\i18n\MissingTranslationEvent;

class TranslationEventHandler
{
    public static function handleMissingTranslation(MissingTranslationEvent $event)
    {
        $event->translatedMessage = "@MISSING: {$event->category}.{$event->message} FOR LANGUAGE {$event->language} @";
    }
}