<?php

if (!function_exists('getDir')) {
    /**
     * Determines the text direction (LTR or RTL) based on the presence of Latin characters.
     *
     * @param string $text
     * @return string
     */
    function getDir($text) {
        $clean = strip_tags((string)$text);
        return preg_match('/[a-zA-Z]/', $clean) ? 'ltr' : 'rtl';
    }
}

if (!function_exists('getAlign')) {
    /**
     * Determines the text alignment (left or right) based on text direction.
     *
     * @param string $text
     * @return string
     */
    function getAlign($text) {
        return getDir($text) === 'ltr' ? 'left' : 'right';
    }
}
