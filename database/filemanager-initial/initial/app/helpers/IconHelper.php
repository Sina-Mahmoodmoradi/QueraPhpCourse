<?php

class IconHelper
{
    public static function getIconClass($file_path)
    {
        if (is_dir($file_path)) {
            return 'fa fa-folder-o';
        }
        $class_names = [
            // Image
            'ai' => 'fa fa-file-image-o',
            'bmp' => 'fa fa-file-image-o',
            'eps' => 'fa fa-file-image-o',
            'gif' => 'fa fa-file-image-o',
            'jpg' => 'fa fa-file-image-o',
            'jpeg' => 'fa fa-file-image-o',
            'png' => 'fa fa-file-image-o',
            'ps' => 'fa fa-file-image-o',
            'psd' => 'fa fa-file-image-o',
            'svg' => 'fa fa-file-image-o',
            'tga' => 'fa fa-file-image-o',
            'tif' => 'fa fa-file-image-o',
            'drw' => 'fa fa-file-image-o',
            
            // Data
            'csv' => 'fa fa-file-excel-o',
            
            // Code
            'c' => 'fa fa-file-code-o',
            'class' => 'fa fa-file-code-o',
            'cpp' => 'fa fa-file-code-o',
            'css' => 'fa fa-css3',
            'erb' => 'fa fa-file-code-o',
            'htm' => 'fa fa-html5',
            'html' => 'fa fa-html5',
            'java' => 'fa fa-file-code-o',
            'js' => 'fa fa-file-code-o',
            'php' => 'fa fa-file-code-o',
            'pl' => 'fa fa-file-code-o',
            'py' => 'fa fa-file-code-o',
            'rb' => 'fa fa-file-code-o',
            'xhtml' => 'fa fa-file-code-o',
            'xml' => 'fa fa-file-code-o',
            
            // Documents
            'doc' => 'fa fa-file-word-o',
            'docx' => 'fa fa-file-word-o',
            'odt' => 'fa fa-file-word-o',
            'pdf' => 'fa fa-file-pdf-o',
            'ppt' => 'fa fa-file-powerpoint-o',
            'pptx' => 'fa fa-file-powerpoint-o',
            'xls' => 'fa fa-file-excel-o',
            'xlsx' => 'fa fa-file-excel-o',
            
            // Archives
            '7z' => 'fa fa-file-zip-o',
            'bz' => 'fa fa-file-zip-o',
            'gz' => 'fa fa-file-zip-o',
            'rar' => 'fa fa-file-zip-o',
            'tar' => 'fa fa-file-zip-o',
            'zip' => 'fa fa-file-zip-o',
            
            // Audio
            'aac' => 'fa fa-music',
            'flac' => 'fa fa-music',
            'mid' => 'fa fa-music',
            'midi' => 'fa fa-music',
            'mp3' => 'fa fa-music',
            'ogg' => 'fa fa-music',
            'wma' => 'fa fa-music',
            'wav' => 'fa fa-music',
            
            // Databases
            'accdb' => 'fa fa-database',
            'db' => 'fa fa-database',
            'dbf' => 'fa fa-database',
            'mdb' => 'fa fa-database',
            'pdb' => 'fa fa-database',
            'sql' => 'fa fa-database',
            
            // Executables
            'app' => 'fa fa-window-maximize',
            'com' => 'fa fa-window-maximize',
            'exe' => 'fa fa-window-maximize',
            'jar' => 'fa fa-window-maximize',
            'msi' => 'fa fa-window-maximize',
            'vb' => 'fa fa-window-maximize',
            
            // Fonts
            'eot' => 'fa fa-font',
            'otf' => 'fa fa-font',
            'ttf' => 'fa fa-font',
            'woff' => 'fa fa-font',
            
            // Game Files
            'gam' => 'fa fa-gamepad',
            'nes' => 'fa fa-gamepad',
            'rom' => 'fa fa-gamepad',
            'sav' => 'fa fa-save',
            
            // Package Files
            'box' => 'fa fa-file-archive-o',
            'deb' => 'fa fa-file-archive-o',
            'rpm' => 'fa fa-file-archive-o',
            
            // Scripts
            'bat' => 'fa fa-terminal',
            'cmd' => 'fa fa-terminal',
            'sh' => 'fa fa-terminal',
            
            // Video
            'avi' => 'fa fa-file-video-o',
            'flv' => 'fa fa-file-video-o',
            'mkv' => 'fa fa-file-video-o',
            'mov' => 'fa fa-file-video-o',
            'mp4' => 'fa fa-file-video-o',
            'mpg' => 'fa fa-file-video-o',
            'ogv' => 'fa fa-file-video-o',
            'webm' => 'fa fa-file-video-o',
            'wmv' => 'fa fa-file-video-o',
            'swf' => 'fa fa-file-video-o',
            
            // Miscellaneous
            'bak' => 'fa fa-save',
            'lock' => 'fa fa-lock',
            'msg' => 'fa fa-envelope-o',
        ];
        $ext = pathinfo($file_path, PATHINFO_EXTENSION);

        return isset($class_names[$ext]) ? $class_names[$ext] : 'fa fa-file-o';
    }
}
