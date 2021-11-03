<?php

function escape($str, $allow_html = false) {
    if ($allow_html == false) {
        $str = strip_tags($str);
    } else {
        $str = preg_replace('#<script(.*?)>(.*?)</script>|<audio(.*?)>(.*?)</audio>|(<iframe(.*?)>)|</iframe>|<video(.*?)>(.*?)</video>#is', '', $str);
    }

    return addslashes(trim($str));
}

function unescape($str) {
    return stripslashes($str);
}
