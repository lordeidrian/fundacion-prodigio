<?php
// app/Helpers/helpers.php

if (!function_exists('hex2rgb')) {
    function hex2rgb(string $hexColor): string
    {
        $hexColor = ltrim($hexColor, '#');
        if (strlen($hexColor) == 3) {
            $hexColor = $hexColor[0] . $hexColor[0] . $hexColor[1] . $hexColor[1] . $hexColor[2] . $hexColor[2];
        }
        $r = hexdec(substr($hexColor, 0, 2));
        $g = hexdec(substr($hexColor, 2, 2));
        $b = hexdec(substr($hexColor, 4, 2));
        return "$r, $g, $b";
    }
}
