<?php

namespace SFram\Traits;

/**
 * Trait Block
 * @package SFram\Traits
 */
trait Block
{
    /**
     * @param $fileName
     * @param mixed ...$args
     * @return false|string
     */
    public function getBlock($fileName, ...$args)
    {
        ob_start();
        if (file_exists($fileName)) {
            require $fileName;
        }
        return ob_get_clean();
    }
}