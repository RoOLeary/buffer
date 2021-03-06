<?php
namespace Craft;

class BufferPlugin extends BasePlugin
{
    function getName()
    {
        return Craft::t('Buffer');
    }

    public function getDescription()
    {
        return 'Send social updates to Twitter, Facebook, etc. through Buffer.com via Twig templates, URLs, and plugins.';
    }

    public function getDocumentationUrl()
    {
        return 'https://github.com/nystudio107/buffer/blob/master/README.md';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/nystudio107/buffer/master/releases.json';
    }

    public function getVersion()
    {
        return '1.0.3';
    }

    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    function getDeveloper()
    {
        return 'nystudio107';
    }

    function getDeveloperUrl()
    {
        return 'http://nystudio107.com';
    }

    public function hasCpSection()
    {
        return false;
    }

    public function addTwigExtension()
    {
        Craft::import('plugins.buffer.twigextensions.BufferTwigExtension');

        return new BufferTwigExtension();
    }

    protected function defineSettings()
    {
        return array(
            'bufferAccessToken' => array(AttributeType::String, 'label' => 'Buffer Access Token', 'default' => ''),
            'bufferClientId' => array(AttributeType::String, 'label' => 'Buffer Client ID', 'default' => ''),
            'bufferClientSecret' => array(AttributeType::String, 'label' => 'Buffer Client Secret', 'default' => ''),
            'bufferRedirectUri' => array(AttributeType::String, 'label' => 'Buffer Redirect URI', 'default' => ''),
            'twitterProfileId' => array(AttributeType::String, 'label' => 'Twitter Profile ID', 'default' => ''),
            'facebookProfileId' => array(AttributeType::String, 'label' => 'Facebook Profile ID', 'default' => ''),
            'googlePlusProfileId' => array(AttributeType::String, 'label' => 'Google+ Profile ID', 'default' => ''),
            'pinterestProfileId' => array(AttributeType::String, 'label' => 'Pinterest Profile ID', 'default' => ''),
            'linkedInProfileId' => array(AttributeType::String, 'label' => 'LinkedIn Profile ID', 'default' => ''),
        );
    }

    public function getSettingsHtml()
    {
       return craft()->templates->render('buffer/settings', array(
           'settings' => $this->getSettings()
       ));
    }

}