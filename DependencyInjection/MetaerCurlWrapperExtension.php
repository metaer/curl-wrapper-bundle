<?php

namespace Metaer\CurlWrapperBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class MetaerCurlWrapperExtension extends Extension
{
    const ALIAS_ID = 'metaer_curl_wrapper.curl_wrapper';

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $container->setAlias(self::ALIAS_ID, $config['wrapper']);

        $alias = $container->getAlias(self::ALIAS_ID);

        if (method_exists($alias, 'setPrivate')) {
            $alias->setPrivate(false);
        } else {
            $alias->setPublic(true);
        }

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
