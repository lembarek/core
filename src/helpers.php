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
    shell_exec("cd $path && git init && git add . && git commit -m 'first init'");
}

/**
* delete dir
*
* @param  string  $dir
* @return void
*/
function deleteDir($dir)
{
    if (file_exists($dir)) {
        return exec("rm -R $dir");
    }
}

function get_subdir_files($main_dir)
{
    $dirs = scandir($main_dir);
    $result  = [];
    foreach ($dirs as $dir) {
        if ($dir === '.' || $dir === '..' || $dir === '.git') {
            continue;
        }
        if (is_file($main_dir.'/'.$dir)) {
            $result[] = "$main_dir/$dir";
        } else {
            $result = array_merge($result, get_subdir_files("$main_dir/$dir"));
        }
    }
    return $result;
}

function get_subdir_dirs($main_dir)
{
    $dirs = scandir($main_dir);
    $result  = [];
    foreach ($dirs as $dir) {
        if ($dir === '.' || $dir === '..' || $dir === '.git') {
            continue;
        }
        if (is_file("$main_dir/$dir")) {
            continue;
        }
        $result[] = "$main_dir/$dir";
        $result = array_merge($result, get_subdir_dirs("$main_dir/$dir"));
    }
    return $result;
}

function get_column_type($table, $column)
{
    try {
        return \DB::connection()->getDoctrineColumn($table, $column)->getType()->getName();
    } catch (Doctrine\DBAL\DBALException $e) {
        return 'enum';
    }
}

function  getStatistics(Array $arr,Array $columns)
{
    $result = [];
    foreach($columns as $column){
        $results[$column] = getStatisticsForColumn($arr, $column);
    }
    return $results;
}

function getStatisticsForColumn(Array $arr, $column)
{
    $results = [];
    foreach($arr as $element){
        $key= $element[$column];
        if(is_array($key)) $key = array_pop($key);
        if(!array_key_exists($key, $results))
            $results[$key] = 1;
        else
            $results[$key] = ++$results[$key];
    }
    return $results;
}

/**
 * Return sizes readable by humans
 */
function human_filesize($bytes, $decimals = 2)
{
  $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
  $factor = floor((strlen($bytes) - 1) / 3);

  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .
      @$size[$factor];
}

/**
 * Is the mime type an image
 */
function is_image($mimeType)
{
    return starts_with($mimeType, 'image/');
}
