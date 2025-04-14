<?php
namespace Themestar\SocialCard\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class CardType implements OptionSourceInterface
{
    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'summary', 'label' => __('Summary')],
            ['value' => 'summary_large_image', 'label' => __('Summary Large Image')],
            ['value' => 'app', 'label' => __('App')],
            ['value' => 'player', 'label' => __('Player')],
        ];
    }
}
