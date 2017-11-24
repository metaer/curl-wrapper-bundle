Basic Usage:

``` php
$cw = $this->get('metaer_curl_wrapper.curl_wrapper');

try{
    $result = $cw->getQueryResult($options);
} catch (CurlWrapperException $e) {
    //handle exception
}
```