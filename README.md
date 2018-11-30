Curl wrapper bundle
===
Curl Wrapper bundle for symfony framework

Install:
---
* composer require metaer/curl-wrapper-bundle

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

Basic Usage with autowire:
---
Just add in services.yaml
``` yaml
# services.yaml
services:
    # your services
    #...
    
    #alias for metaer_curl_wrapper.curl_wrapper
    Metaer\CurlWrapperBundle\CurlWrapper: "@metaer_curl_wrapper.curl_wrapper"
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
