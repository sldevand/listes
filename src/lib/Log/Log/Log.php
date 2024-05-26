<?php

namespace Log\Log;

/**
 * Class Log
 * @package Log\Log
 */
class Log
{
    /**
     * @param mixed $data
     */
    public static function info($data)
    {
        echo '<pre><span  style="color:red;">--Debug--</span><br> ';
        if (is_array($data) || is_object($data)) {
            var_dump($data);
        } else {
            echo htmlspecialchars($data) . '<br>';
        }

        echo '<span  style="color:red;">--End of Debug--</span> </pre>';
    }
}
