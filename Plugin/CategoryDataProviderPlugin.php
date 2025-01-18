<?php

namespace Magelearn\CustomImage\Plugin;

class CategoryDataProviderPlugin
{
    public function afterGetData(
        \Magento\Catalog\Model\Category\DataProvider $subject,
        $result
    ) {
        // Modify the data here
        if (isset($result['custom_image'])) {
            unset($result['custom_image']);
        }
        return $result;
    }

    public function afterGetFieldsMap(
        \Magento\Catalog\Model\Category\DataProvider $subject,
        $result
    ) {
        $result['content'][] = 'custom_image';
        return $result;
    }
}