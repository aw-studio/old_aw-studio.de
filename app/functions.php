<?php

if (!function_exists('b64')) {
    function b64($media)
    {
        $path   = $media->getPath('thumb');
        if (!file_exists($path)) return;

        $type   = pathinfo($path, PATHINFO_EXTENSION);
        $data   = file_get_contents($path);

        return 'data:application/' . $type . ';base64,' . base64_encode($data);
    }
}
