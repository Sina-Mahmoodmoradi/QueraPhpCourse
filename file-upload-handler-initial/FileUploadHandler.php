<?php

class FileUploadHandler
{
    public function __construct(private string $fieldName) {}

    public function getName(): ?string
    {
        if(empty($_FILES[$this->fieldName])){
            return null;
        }
        return $_FILES[$this->fieldName]['name'];
    }

    public function getMimeType(): ?string
    {
        if(empty($_FILES[$this->fieldName])){
            return null;
        }
        return $_FILES[$this->fieldName]['type'];
    }

    public function getTempPath(): ?string
    {
        if(empty($_FILES[$this->fieldName])){
            return null;
        }
        return $_FILES[$this->fieldName]['tmp_name'];
    }

    public function getSize(): ?int
    {
        if(empty($_FILES[$this->fieldName])){
            return null;
        }
        return $_FILES[$this->fieldName]['size'];
    }

    public function getError(): ?int
    {
        if(empty($_FILES[$this->fieldName])){
            return null;
        }
        return $_FILES[$this->fieldName]['error'];
    }

    public function save(string $path): bool
    {
        if(empty($_FILES[$this->fieldName])){
            return false;
        }
        if(!file_exists($path)){
            mkdir($path, 0777, true);
        }
        move_uploaded_file($this->getTempPath(),$path);
    }
}
