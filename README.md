# Magento2 Remove URL from Sitemap
Magento2 free extension to remove specific URLs from sitemap.xml file | Nadeem Khan
<!-- 
<img src="https://i.ibb.co/MpFR77S/Magento2-linneo-member-discount.png" alt="Magento2-linneo-member-discount" border="0">
 -->
## Features:
1. Admin can enable/disable the Extension from backend.
2. Admin can mentioned the URL in box that needed to be romove.
3. Works Like a Magento Core Functionality.

# Installation Instruction

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

# Contribution

Want to contribute to this extension? The quickest way is to <a href="https://help.github.com/articles/about-pull-requests/">open a pull request</a> on GitHub.

# Screenshots & Support

If you encounter any problems or bugs, please <a href="https://github.com/mageprince/magento2-buynow/issues">open an issue</a> on GitHub.

<b>CART PAGE</b>

<img src="https://i.ibb.co/1KXZbZ8/Store-Configuration.png" alt="Store-Configuration" border="0">

## Prerequisites

### Use the following table to verify you have the correct prerequisites to install this Extension.
<table>
	<tbody>
		<tr>
			<th>Prerequisite</th>
			<th>How to check</th>
			<th>For more information</th>
		</tr>
	<tr>
		<td>Apache 2.2 or 2.4</td>
		<td>Ubuntu: <code>apache2 -v</code><br>
		CentOS: <code>httpd -v</code></td>
		<td><a href="https://devdocs.magento.com/guides/v2.2/install-gde/prereq/apache.html">Apache</a></td>
	</tr>
	<tr>
		<td>PHP 7.*.*</td>
		<td><code>php -v</code></td>
		<td><a href="http://devdocs.magento.com/guides/v2.2/install-gde/prereq/php-ubuntu.html">PHP Ubuntu</a><br><a href="http://devdocs.magento.com/guides/v2.2/install-gde/prereq/php-centos.html">PHP CentOS</a></td>
	</tr>
	<tr><td>MySQL 5.6.x</td>
	<td><code>mysql -u [root user name] -p</code></td>
	<td><a href="http://devdocs.magento.com/guides/v2.2/install-gde/prereq/mysql.html">MySQL</a></td>
	</tr>
</tbody>
</table>

### Feedback and Support 

<a href="mailto:khannadeem243@gmail.com">khannadeem243@gmail.com</a>
