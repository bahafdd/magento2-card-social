<?php

namespace Themestar\SocialCard\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_SOCIALCARD = 'socialcard_settings/socialcard/';

    public function isEnabled(): bool
    {
        return $this->getConfigValue('enabled');
    }

    public function getUsername(): string
    {
        return ltrim($this->getConfigValue('twitter_username'), '@');
    }

    public function getAuthor(): string
    {
        return ltrim($this->getConfigValue('twitter_author'), '@');
    }

    public function getProductCardType(): string
    {
        $value = $this->getConfigValue('product_card_type');
        return is_string($value) && $value !== '' ? $value : 'summary';
    }

    public function getCategoryCardType(): string
    {
        $value = $this->getConfigValue('category_card_type');
        return is_string($value) && $value !== '' ? $value : 'summary';
    }

    public function getCmsCardType(): string
    {
        $value = $this->getConfigValue('cms_card_type');
        return is_string($value) && $value !== '' ? $value : 'summary';
    }

    public function getFallbackImage(): ?string
    {
        $image = $this->getConfigValue('fallback_image');
        return $image ? 'socialcard/' . ltrim($image, '/') : null;
    }

    private function getConfigValue(string $field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_SOCIALCARD . $field,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }
}
