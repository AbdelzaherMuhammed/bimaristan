<?php

namespace App\Services;

class ImageManagerService
{
    /**
    * Validates the file from the request & persists it into storage
    * @param String $fileName from request
    * @param String $folder
    * @param String $disk
    * @return Sting $path
    */
    public function upload($fileName = null, $folder = '', $disk = 'public'){
        $path = null;
        if(request()->hasFile($fileName) && request()->file($fileName)->isValid()){
            $path = 'storage/'.request()->file($fileName)->store($folder, $disk);
        }
        return $path;
    }

    /**
    * Validates the file from the request & persists it into storage then unlink old one
    * @param String $fileName from request
    * @param String $folder
    * @param String $oldPath
    * @return Sting $path
    */
    public function update($oldPath, $fileName = null, $folder = ''){
        $path = null;
        if(request()->hasFile($fileName) && request()->file($fileName)->isValid()){
            $path = $this->upload($fileName,$folder);
            if(file_exists($oldPath)) {
                unlink($oldPath);
            }
        }
        return $path;
    }

    /**
    * Delete the file from the path
    * @param String $oldPath
    */

    public function delete($oldPath){
        if(file_exists($oldPath)) {
            unlink($oldPath);
        }
    }
}
