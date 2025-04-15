<?php

namespace Themestar\SocialCard\Block;

use Magento\Framework\View\Element\Template;
use Themestar\SocialCard\Helper\Data;
use Magento\Framework\Registry;

class Meta extends Template
{
    protected $helper;
    protected $registry;

    public function __construct(
        Template\Context $context,
        Data $helper,
        Registry $registry,
        array $data = []
    ) {
        $this->helper = $helper;
        $this->registry = $registry;
        parent::__construct($context, $data);
    }

    public function getTwitterData()
    {
        if (!$this->helper->isEnabled()) {
            return [];
        }

        $mediaUrl = $this->getMediaUrl();
        $fallbackImage = $this->helper->getFallbackImage();
        $imageUrl = $this->getMainImage($fallbackImage ? $mediaUrl . $fallbackImage : null);

        return [
            'username' => $this->helper->getUsername(),
            'author' => $this->helper->getAuthor(),
            'card_type' => $this->detectCardType(),
            'title' => $this->getPageTitle(),
            'description' => $this->getPageDescription(),
            'image' => $imageUrl,
            'url' => $this->_urlBuilder->getCurrentUrl()
        ];
    }

    protected function detectCardType(): string
    {
        if ($this->registry->registry('current_product')) {
            return $this->helper->getProductCardType();
        }

        if ($this->registry->registry('current_category')) {
            return $this->helper->getCategoryCardType();
        }

        if ($this->registry->registry('cms_page')) {
            return $this->helper->getCmsCardType();
        }

        return 'summary';
    }

    protected function getPageTitle(): string
    {
        return $this->pageConfig->getTitle()->get();
    }

    protected function getPageDescription(): string
    {
        foreach ($this->pageConfig->getMetadata() as $name => $content) {
            if ($name === 'description') {
                return $content;
            }
        }
        return '';
    }

    protected function getMediaUrl(): string
    {
        return $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
    }

    protected function getMainImage(?string $fallback): ?string
    {
        if ($product = $this->registry->registry('current_product')) {
            $image = $product->getData('twitter_image') ?: $product->getImage();
            if ($image && $image !== 'no_selection') {
                return $this->getMediaUrl() . 'catalog/product' . $image;
            }
        }

        if ($this->registry->registry('current_category') || $this->registry->registry('cms_page')) {
            return $fallback;
        }

        return $fallback;
    }
}
