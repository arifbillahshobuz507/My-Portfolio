<?php

namespace App\Helper;
class FileHelper
{
  
    public static function uploadFile($file, $directory = "demo", $customName = null)
    {
        if (!$file) {
            return null;
        }

        // Get original file name without extension
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        
        // Get file extension
        $extension = $file->getClientOriginalExtension();
        
        // Generate file name
        if ($customName) {
            $fileName = $customName . '_' . date('Ymdhis') . '.' . $extension;
        } else {
            $fileName = $originalName . '_' . date('Ymdhis') . '.' . $extension;
        }
        
        // Move file to directory
        $file->move(public_path($directory), $fileName);
        
        return $fileName;
    }
    public static function uploadMultipleFiles($files)
    {
        $uploadedFiles = [];
        
        foreach ($files as $key => $file) {
            $uploadedFiles[$key] = self::uploadFile($file);
        }
        
        return $uploadedFiles;
    }
    public static function deleteFile($fileName, $directory = "demo")
    {
        if (!$fileName) {
            return false;
        }
        
        $filePath = public_path("{$directory}/{$fileName}");
        
        if (file_exists($filePath)) {
            return unlink($filePath);
        }
        
        return false;
    }   
    public static function deleteMultipleFiles($fileNames, $directory = "demo")
    {
        $results = [];
        
        foreach ($fileNames as $fileName) {
            $results[$fileName] = self::deleteFile($fileName, $directory);
        }
        
        return $results;
    }

    //Get full URL of a file  
    public static function getFileUrl($fileName, $directory = "demo")
    {
        if (!$fileName) {
            return null;
        }
        
        return url("{$directory}/{$fileName}");
    }
}