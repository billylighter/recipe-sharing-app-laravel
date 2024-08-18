<?php
use Illuminate\Support\Str;

if (! function_exists('excerpt')) {
    function excerpt($content, $limit = 100) {
        return Str::limit($content, $limit);
    }
}
