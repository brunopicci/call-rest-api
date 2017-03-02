<?php

namespace Services\Bundle\Rest;

use Symfony\Component\HttpKernel\Bundle\Bundle  as BaseBundle;

/**
 * Bundle class
 *
 * Class ServicesRestBundle
 * @package Services\Bundle\Rest
 */
class ServicesRestBundle extends BaseBundle
{
    /**
     * {@inheritdoc}
     */
    public function getNamespace()
    {
        return __NAMESPACE__;
    }

    /**
     * {@inheritdoc}
     */
    public function getPath()
    {
        return strtr(__DIR__, '\\', '/');
    }
}