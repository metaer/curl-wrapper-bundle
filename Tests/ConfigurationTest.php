<?php
/**
 * Created by Pavel Popov
 */

namespace Metaer\CurlWrapperBundle\Tests;


use Metaer\CurlWrapperBundle\DependencyInjection\Configuration;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Definition\Processor;

class ConfigurationTest extends TestCase
{
    public function testConfiguration() {
        $config = [];

        $processor = new Processor();
        $configuration = new Configuration();
        $config = $processor->processConfiguration($configuration, [$config]);

        $this->assertArrayHasKey('wrapper', $config);
        $this->assertEquals('metaer_curl_wrapper.curl_wrapper.default', $config['wrapper']);
    }
}
