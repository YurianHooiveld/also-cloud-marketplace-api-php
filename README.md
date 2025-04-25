## Requirements
PHP 7.2 

If you want to use the api with PHP 8.2 go to the [original repository](https://github.com/inserveit/also-cloud-marketplace-api-php/)



## Status

![workflow](https://github.com/inserveit/also-cloud-marketplace-api-php/actions/workflows/build-actions.yml/badge.svg)
[![Latest Stable Version](https://poser.pugx.org/inserve/also-cloud-marketplace-api-php/v)](https://packagist.org/packages/inserve/also-cloud-marketplace-api-php)
[![Latest Unstable Version](https://poser.pugx.org/inserve/also-cloud-marketplace-api-php/v/unstable)](https://packagist.org/packages/inserve/also-cloud-marketplace-api-php)
[![License](https://poser.pugx.org/inserve/also-cloud-marketplace-api-php/license)](https://packagist.org/packages/inserve/also-cloud-marketplace-api-php)

## About
A PHP Wrapper for [ALSO Cloud Marketplace](https://app.swaggerhub.com/apis/Marketplace_SimpleAPI/Marketplace_SimpleAPI/1.0.0#/)

## Installation
`composer require inserve/also-cloud-marketplace-api-php`

## Usage example


```php
<?php

use Inserve\ALSOCloudMarketplaceAPI;

require 'vendor/autoload.php';

$api = new ALSOCloudMarketplaceAPI\MarketplaceAPIClient();

$api->authenticate('user', 'password');
$subscriptions = $api->subscriptions->get(12345);

```
