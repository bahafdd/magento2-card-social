<?php

namespace Themestar\SocialCard\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_SOCIALCARD = 'socialcard_settings/socialcard/';

    /**
     * Check if module is enabled
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->getConfigValue('enabled');
    }

    /**
     * Get Twitter Username (without @)
     *
     * @return string
     */
    public function getUsername(): string
    {
        return ltrim($this->getConfigValue('twitter_username'), '@');
    }

    /**
     * Get Twitter Author
     *
     * @return string
     */
    public function getAuthor(): string
    {
        return ltrim($this->getConfigValue('twitter_author'), '@');
    }

 /**
 * Get Product Card Type
 *
 * @return string
 */
public function getProductCardType(): string
{
    $value = $this->getConfigValue('product_card_type');
    return is_string($value) && $value !== '' ? $value : 'summary';
}


/**
 * Get Category Card Type
 *
 * @return string
 */
public function getCategoryCardType(): string
{
    $value = $this->getConfigValue('category_card_type');
    return is_string($value) && $value !== '' ? $value : 'summary'; // Default to 'summary' if empty or not set
}


    /**
     * Get config value from path
     *
     * @param string $field
     * @param null|int $storeId
     * @return mixed
     */
    public function getConfigValue(string $field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_SOCIALCARD . $field,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    public function getDefaultCardType()
    {
        return $this->scopeConfig->getValue('socialcard/socialcard_settings/card_type', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

public function getFallbackImages()
{
    // Get the fallback images from the configuration
    $fallbackImages = $this->scopeConfig->getValue('socialcard/socialcard_settings/fallback_images', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

    // If the value is null or empty, return an empty array
    if (!$fallbackImages) {
        return [];
    }

    // Otherwise, explode the comma-separated string into an array and trim each item
    return array_map('trim', explode(',', $fallbackImages)); // Converts CSV to an array
}


public function getCmsCardType(): string
{
    $value = $this->getConfigValue('cms_card_type');
    return is_string($value) && $value !== '' ? $value : 'summary';
}

    public function getFallbackImage()
    {
        return $this->scopeConfig->getValue('socialcard/socialcard_settings/fallback_image', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}
