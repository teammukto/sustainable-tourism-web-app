<?php

namespace Larubel\Libs\Helpers;

class Helper{

    public static function splitStringLast($name, $delimeter){
        
        $parts = explode($delimeter, $name);
        $last = end($parts);
        return $last;
    }

    public static function getValueFromClassProperty($className, $classProperty){
        
        $obj = new $className;
        $ref = new \ReflectionObject($obj);
        $property = $ref->getProperty($classProperty);
        $property->setAccessible(true);

        return $property->getValue($obj);
    }

    public static function uploadFile($file){
        $uploadDir = 'assets/img/';
        $fileType = pathinfo(basename($file['name']), PATHINFO_EXTENSION);
        $fileName = basename(basename($file['name']), '.' . $fileType);
        $targetFile = $fileName . '_' . time() . '.' . $fileType;
        $targetFilePath = $uploadDir . $targetFile;

        if(move_uploaded_file($file['tmp_name'], $targetFilePath)){
            return $targetFilePath;
        }
        
        return null;  
    }
    
}