Curl wrapper bundle
===
Curl Wrapper bundle for symfony framework

Installation
---
``` sh
composer require metaer/curl-wrapper-bundle
```

If you use Symfony 2 or 3 (without symfony flex): add to AppKernel.php:
``` php 
new \Metaer\CurlWrapperBundle\MetaerCurlWrapperBundle(),
```


Basic Usage:
---
``` php
$options = [
    CURLOPT_URL => 'http://example.ex',
    CURLOPT_RETURNTRANSFER => true,
];
        
$cw = $this->get('metaer_curl_wrapper.curl_wrapper');

try{
    $result = $cw->getQueryResult($options);
} catch (CurlWrapperException $e) {
    //handle exception
}
```

Basic Usage with autowire in another service:
---
``` php
<?php
namespace App\Service;

use Metaer\CurlWrapperBundle\CurlWrapper;
use Metaer\CurlWrapperBundle\CurlWrapperException;

class MyService
{
    /**
     * @var CurlWrapper
     */
    private $curlWrapper;
    
    /**
     * MyService constructor.
     * @param CurlWrapper $curlWrapper
     */
    public function __construct(CurlWrapper $curlWrapper)
    {
        $this->curlWrapper = $curlWrapper;
    }
    
    $options = [
        CURLOPT_URL => 'http://example.ex',
        CURLOPT_RETURNTRANSFER => true,
    ];

    try{
        $result = $this->curlWrapper->getQueryResult($options);
    } catch (CurlWrapperException $e) {
        //handle exception
    }
```

How simply change service behaviour or extend
---
Symfony-4 example
``` yaml
# config/packages/metaer_curl_wrapper.yaml
metaer_curl_wrapper:
    wrapper: custom_curl_wrapper
```
``` yaml
# services.yaml
services:
    # your services
    #...
    
    custom_curl_wrapper:
        class: 'App\MyCurlWrapper'
```
``` php
// src/MyCurlWrapper.php
namespace App;

use Metaer\CurlWrapperBundle\CurlWrapper;

class MyCurlWrapper extends CurlWrapper
{
    public function getQueryResult(array $curlOptions)
    {
        //your code here
        return 'something';
    }
    
    public function myCustomMethod()
    {
        //something else
    }
}
```

So, you do not need copy-paste full class code. Only methods which you want change.
Another way to do the same thing:

``` yaml
# services.yaml
services:
    # your services
    #...
    
    metaer_curl_wrapper.curl_wrapper:
        class: 'App\MyCurlWrapper'
```
