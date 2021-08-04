<?php

function getDrivePath($array, $key, $value)
{
    foreach ($array as $subarray) {
        if (isset($subarray[$key]) && $subarray[$key] == $value)
            return $subarray;
    }
}
