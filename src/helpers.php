<?php

 /**
    * Open haystack, find and replace needles, save haystack.
    *
    * @param  string $oldFile The haystack
    * @param  mixed  $search  String or array to look for (the needles)
    * @param  mixed  $replace What to replace the needles for?
    * @param  string $newFile Where to save, defaults to $oldFile
    *
    * @return void
*/
function replaceAndSave($oldFile, $search, $replace, $newFile = null)
{
    $newFile = ($newFile == null) ? $oldFile : $newFile;
    $file = file_get_contents($oldFile);
    $replacing = str_replace($search, $replace, $file);
    file_put_contents($newFile, $replacing);
}


/**
    * init git
    *
    * @return void
*/
function initGit($path)
{
    system("cd $path && git init && git add . && git commit -m 'first init'");
}

/**
* delete dir
*
* @param  string  $dir
* @return void
*/
function deleteDir($dir)
{
    if(file_exists($dir))
        return exec("rm -R $dir");
}

function get_subdir_files($main_dir) {
    $dirs = scandir($main_dir);
    $result  = [];
    foreach($dirs as $dir)  {
        if ($dir === '.' || $dir === '..' || $dir === '.git') continue;
        if(is_file($main_dir.'/'.$dir)) $result[] = "$main_dir/$dir";
        else $result = array_merge($result, get_subdir_files("$main_dir/$dir"));
    }
    return $result;
}

function get_subdir_dirs($main_dir) {
    $dirs = scandir($main_dir);
    $result  = [];
    foreach($dirs as $dir){
        if ($dir === '.' || $dir === '..' || $dir === '.git') continue;
        if(is_file("$main_dir/$dir")) continue;
        $result[] = "$main_dir/$dir";
        $result = array_merge($result, get_subdir_dirs("$main_dir/$dir"));
    }
    return $result;
}
