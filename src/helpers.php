<?php

$files = ['others', 'git', 'string', 'files', 'filesystem', 'db'];

foreach($files as $file){
    include_once(__DIR__.'/helpers/'.$file.'.php');
}
