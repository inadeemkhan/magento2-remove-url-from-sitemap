# Mage2 Module Nadeem Sitemap

    ``nadeem/module-sitemap``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
Magento2 free extension to remove specific URLs from sitemap.xml file

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Nadeem`
 - Enable the module by running `php bin/magento module:enable Nadeem_Sitemap`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require nadeem/module-sitemap`
 - enable the module by running `php bin/magento module:enable Nadeem_Sitemap`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration

 - is_enable (general/sitemap/is_enable)

 - rul_to_remove_from_sitemap (general/sitemap/rul_to_remove_from_sitemap)


## Specifications

 - Helper
	- Nadeem\Sitemap\Helper\Data

 - Plugin
	- after_getSitemapRow - Magento\Sitemap\Model\Sitemap > Nadeem\Sitemap\Plugin\Magento\Sitemap\Model\Sitemap

 - Plugin
	- afterGetCollection - Magento\Sitemap\Model\ResourceModel\Catalog\Product > Nadeem\Sitemap\Plugin\Magento\Sitemap\Model\ResourceModel\Catalog\Product


## Attributes



