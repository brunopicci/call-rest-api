<?php

namespace Services\Bundle\Rest;

use Symfony\Component\HttpKernel\Bundle\Bundle  as BaseBundle;

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