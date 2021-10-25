<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Nadeem\Sitemap\Model;

class Sitemap extends \Magento\Sitemap\Model\Sitemap
{    

    /**
     * Get sitemap row
     *
     * @param string $url
     * @param null|string $lastmod
     * @param null|string $changefreq
     * @param null|string $priority
     * @param null|array|\Magento\Framework\DataObject $images
     * @return string
     * Sitemap images
     */
    protected function _getSitemapRow($url, $lastmod = null, $changefreq = null, $priority = null, $images = null)
    {
        
        $sitemapURL     = $this->_getUrl($url);

        // Creating Helper instance to access method.
        $objectManager  = \Magento\Framework\App\ObjectManager::getInstance();
        $dataHelper     = $objectManager->create('Nadeem\Sitemap\Helper\Data');

        $isEnable       = $dataHelper->isEnabled();
        $urlDataArray   = $dataHelper->getUrlList();

        if ($isEnable) {

            // Converting List into Array 
            $RemoveUrlArray = explode(",", $urlDataArray);

            // Checking if URL exist in array and module is enabled.
            if (!in_array($sitemapURL, $RemoveUrlArray) && $isEnable) {
                $row = '<loc>' . $this->_escaper->escapeUrl($sitemapURL) . '</loc>';
                if ($lastmod) {
                    $row .= '<lastmod>' . $this->_getFormattedLastmodDate($lastmod) . '</lastmod>';
                }
                if ($changefreq) {
                    //$row .= '<changefreq>' . $this->_escaper->escapeHtml($changefreq) . '</changefreq>';
                }
                if ($priority) {
                    $row .= sprintf('<priority>%.1f</priority>', $this->_escaper->escapeHtml($priority));
                }
                if ($images) {
                    // Add Images to sitemap
                    foreach ($images->getCollection() as $image) {
                        $row .= '<image:image>';
                        $row .= '<image:loc>' . $this->_escaper->escapeUrl($image->getUrl()) . '</image:loc>';
                        $row .= '<image:title>' . $this->_escaper->escapeHtml($images->getTitle()) . '</image:title>';
                        if ($image->getCaption()) {
                            $row .= '<image:caption>' . $this->_escaper->escapeHtml($image->getCaption()) . '</image:caption>';
                        }
                        $row .= '</image:image>';
                    }
                    // Add PageMap image for Google web search
                    $row .= '<PageMap xmlns="http://www.google.com/schemas/sitemap-pagemap/1.0"><DataObject type="thumbnail">';
                    $row .= '<Attribute name="name" value="' . $this->_escaper->escapeHtml($images->getTitle()) . '"/>';
                    $row .= '<Attribute name="src" value="' . $this->_escaper->escapeUrl($images->getThumbnail()) . '"/>';
                    $row .= '</DataObject></PageMap>';
                }

                return '<url>' . $row . '</url>';
            } 
        }
    }
}
