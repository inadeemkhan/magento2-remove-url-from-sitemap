<?php
declare(strict_types=1);

namespace Nadeem\Sitemap\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{

    const STORE_CONFIG_IS_ENABLE = "s_general/s_sitemap/is_enable";
    const STORE_CONFIG_URL_TO_BE_REMOVE = "s_general/s_sitemap/url_to_remove_from_sitemap";

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    protected $_scopeConfig;

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->_scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        $isEnable = $this->_scopeConfig->getValue(self::STORE_CONFIG_IS_ENABLE, 
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return $isEnable;
    }

    /**
     * @return steing
     */
    public function getUrlList()
    {
        $urlsArray = $this->_scopeConfig->getValue(self::STORE_CONFIG_URL_TO_BE_REMOVE, 
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return $urlsArray;
    }
}

