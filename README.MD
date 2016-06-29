# Extension for Yii2.

Adds the ability to ping the search engines, ie report on the need for indexing of your site, or a new article online

# Install
```
php composer.phar require --prefer-dist molchanovvg/yii2-pingator "*"
```
# Usage
```
use molchanovvg\ping\Ping;

Ping::send('Domain name','Site Address','Need to update the URL','RSS URL');
```