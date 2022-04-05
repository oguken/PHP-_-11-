<?php
namespace Views;

class ViewBase
{
    public static function render($fileName, $params = [])
    {
        $filePath = ROOT_PATH.'/Views/'.$fileName;
        extract($params);

        ob_start();
        ob_implicit_flush(0);
        require $filePath;

        $content = ob_get_clean();
        
        echo $content;
        exit;
    }
}