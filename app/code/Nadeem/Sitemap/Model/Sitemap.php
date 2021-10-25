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
     * @see http://support.google.com/webmasters/bin/answer.py?hl=en&answer=178636
     *
     * Sitemap PageMap
     * @see http://support.google.com/customsearch/bin/answer.py?hl=en&answer=1628213
     */
    protected function _getSitemapRow($url, $lastmod = null, $changefreq = null, $priority = null, $images = null)
    {
        
        $url = $this->_getUrl($url);
        $RemoveUrlArray = array(
                                "https://example.com/url/1", 
                                "https://example.com/url/2",
                                "https://example.com/url/3"
                            );

        if (!in_array($url, $RemoveUrlArray)) {
            $row = '<loc>' . $this->_escaper->escapeUrl($url) . '</loc>';
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
