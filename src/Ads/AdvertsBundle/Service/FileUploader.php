<?php
namespace Ads\AdvertsBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $targetDir;
    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }
    public function upload(UploadedFile $file,$photo)
    {
        $current_file = $this->targetDir.'/'.$photo;
        if (file_exists($current_file) and $photo!=null)
        {
            unlink($current_file);
        }
        $fileName = md5(uniqid()).'.'.$file->guessExtension();
        $file->move($this->getTargetDir(), $fileName);
        return $fileName;
    }
    public function getTargetDir()
    {
        return $this->targetDir;
    }

}