<?php

namespace Craft;

class FocusPointPlugin extends BasePlugin
{

    public function getName()
    {
        return Craft::t('Focus Point');
    }

    public function getVersion()
    {
        return '1.0.0';
    }

    public function getDeveloper()
    {
        return 'Mutation digitale';
    }

    public function getDeveloperUrl()
    {
        return 'http://mutation.io';
    }

    public function getPluginUrl()
    {
        return 'https://github.com/surrealpistach/Craft-FocusPoint';
    }

    public function getDocumentationUrl()
    {
        return $this->getPluginUrl() . '/blob/master/README.md';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/surrealpistach/Craft-FocusPoint/master/changelog.json';
    }

    public function init()
    {
        craft()->on('elements.onBeforeDeleteElements', function (Event $event) {
            $elementIds = $event->params['elementIds'];
            foreach ($elementIds as $elementId) {
                craft()->focusPoint_focusPoint->deleteFocusPointRecordsBySourceId($elementId);
            }
        });
    }

}