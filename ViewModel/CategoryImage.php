<?php

declare(strict_types=1);

namespace Magelearn\CustomImage\ViewModel;

use Magelearn\CustomImage\Helper\Category as CategoryHelper;
use Magento\Catalog\Helper\Data as CatalogData;
use Magento\Catalog\Model\Category;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class CategoryImage implements ArgumentInterface
{
    public function __construct(
        private readonly CatalogData $catalogData,
        private readonly CategoryHelper $categoryHelper
    ) {
    }

    public function getCategory(): ?Category
    {
        $category = $this->catalogData->getCategory();

        return $category instanceof Category ? $category : null;
    }

    public function getImageUrl(string $imageCode): ?string
    {
        $category = $this->getCategory();

        if (!$category) {
            return null;
        }

        $image = $category->getData($imageCode);

        if (!$image) {
            return null;
        }

        return $this->categoryHelper->getImageUrl($image);
    }
}