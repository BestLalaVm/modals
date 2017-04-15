<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 2/25/2017
 * Time: 11:33 AM
 */
function ensureDirectory($path)
{
    $dirName = dirname($path);
   if(!is_dir($dirName))
   {
        mkdir($dirName);
   }
}