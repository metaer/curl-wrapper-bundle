Curl wrapper bundle
===
Curl Wrapper bundle for symfony framework

Install:
---
* composer require metaer/curl-wrapper-bundle
* add to AppKernel.php:
<br>
new \Metaer\CurlWrapperBundle\MetaerCurlWrapperBundle(),


Basic Usage:
---
``` php
$options = [
            CURLOPT_URL => 'http://example.ex'
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => 'example',
        ];
        
$cw = $this->get('metaer_curl_wrapper.curl_wrapper');

try{
    $result = $cw->getQueryResult($options);
} catch (CurlWrapperException $e) {
    //handle exception
}
```