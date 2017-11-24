<?php
/**
 * Created by Pavel Popov
 */

namespace Metaer\CurlWrapperBundle;


interface CurlWrapperInterface
{
    public function getQueryResult(array $curlOptions);
    public function getRequestUrl();
    public function getRequestBody();
    public function getResponseBody();
}
