<?php
/**
 * Created by Pavel Popov
 */

namespace Metaer\CurlWrapperBundle\Tests;


use Metaer\CurlWrapperBundle\CurlWrapper;
use Metaer\CurlWrapperBundle\CurlWrapperException;
use PHPUnit\Framework\TestCase;

class CurlWrapperTest extends TestCase
{
    const GOOD_URL = 'https://php.net';
    const BAD_URL = 'https://www.g.commmm';

    public function testSuccessRequest() {
        $result = $this->makeRequest(self::GOOD_URL);
        $this->assertTrue(strpos($result, 'html') !== false);
    }

    public function testErrorRequest() {
        $result = $this->makeRequest(self::BAD_URL);
        $this->assertTrue(strpos($result, 'An error has occurred') !== false);
    }

    private function makeRequest($url)
    {
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
        ];

        $cw = new CurlWrapper();

        try {
            return $cw->getQueryResult($options);
        } catch (CurlWrapperException $e) {
            return $e->getMessage();
        }
    }
}
