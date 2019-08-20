<?php
    namespace core\lib;

    class ImageEditor
    {
        public $transfer_dir;
        public $thumbnail_dir;
        public $thumbnail_abs_dir;

        public function __construct()
        {
            ini_set("gd.jpeg_ignore_warning", 1);
            $this->transfer_dir = IMAGES_PATH . 'image-transfer/';
            $this->thumbnail_abs_dir = IMAGES_PATH . 'thumbnails/';
            $this->thumbnail_dir = '/public/images/thumbnails/';
        }

        public function getImageType($fileType)
        {
            $type = $this->getType($fileType);

            if($this->isPhoto($type)){
                return $type;
            }
        }

        public function getVideoType($fileType)
        {
            $type = $this->getType($fileType);

            if($this->isVideo($type)){
                return $type;
            }
        }

        public function getFileType($fileType)
        {
            $type = $this->getType($fileType);

            if($this->isPhoto($type)){
                return $type;
            }
            else if ($this->isVideo($type)){
                return $type;
            }
            return false;
        }

        public function isPhoto($type)
        {
            if($type == 'jpg' || $type == 'jpeg' || $type == 'png' || $type == 'gif'){
                return true;
            }
            return false;
        }

        public function isVideo($type)
        {
            if($type == 'mp4' || $type == 'mpeg4' || $type == 'avi'){
                return true;
            }
            return false;
        }

        public function hasType($response, $type, $message)
        {
            if(!$type){
                $json['error_msg'] = $message;
                $response->outputJSON($json);
                die();
            }
        }

        public function imageStamp($img_url, $img_type = 'jpg')
        {
            $stamp_url = IMAGES_PATH . 'stamp.png';

            if(is_file($img_url) && is_file($stamp_url)){
                // Загрузка штампа и фото, для которого применяется водяной знак (называется штамп или печать)
                $stamp = imagecreatefrompng($stamp_url);

                if($img_type == 'jpg' || $img_type == 'jpeg'){
                    $img = imagecreatefromjpeg($img_url);
                }
                elseif($img_type == 'png'){
                    $img = imagecreatefrompng($img_url);
                }

                // Установка полей для штампа и получение высоты/ширины штампа
                $marge_right = 10;
                $marge_bottom = 10;
                $sx = imagesx($stamp);
                $sy = imagesy($stamp);

                // Копирование изображения штампа на фотографию с помощью смещения края
                // и ширины фотографии для расчета позиционирования штампа.
                imagecopy($img, $stamp, imagesx($img) - $sx - $marge_right, imagesy($img) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

                // Сохранение и освобождение памяти
                imagepng($img, $img_url);
                imagedestroy($img);
            }

        }

        public function imgSetFilter($img_url, $img_type)
        {
            if(file_exists($img_url)){
                if($img_type = 'png'){
                    $img = imagecreatefrompng($img_url);

                    imagefilter($img, IMG_FILTER_CONTRAST, -10);

                    imagepng($img, $img_url);
                    imagedestroy($img);
                }
                else if($img_type = 'jpeg'){
                    $img = imagecreatefromjpeg($img_url);

                    imagefilter($img, IMG_FILTER_CONTRAST, -10);

                    imagejpeg($img, $img_url);
                    imagedestroy($img);
                }
            }
        }

        public function resizeImage($src, $fileName, $album_name, $fileType){
            list($takenWidth, $takenHeight) = getimagesize($src);

            $maxWidth = $takenWidth;
            $maxHeight = $takenHeight;

            if($takenWidth >= 1500){
                $maxWidth = $takenWidth / 3;
                $maxHeight = $takenHeight / 3;
            }
            else if($takenWidth < 1500 && $takenWidth >= 1000){
                $maxWidth = $takenWidth / 2;
                $maxHeight = $takenHeight / 2;
            }

            if($fileType == 'jpg' || $fileType == 'jpeg'){
                $image = imagecreatefromjpeg($src);
            }
            else if ($fileType == 'png'){
                $image = imagecreatefrompng($src);
            }

            if($image){
                $newImage = imagecreatetruecolor($maxWidth, $maxHeight);
                if($newImage){
                    imagecopyresampled($newImage, $image, 0, 0, 0, 0, $maxWidth, $maxHeight, $takenWidth, $takenHeight);

                    if($fileType == 'jpg' || $fileType == 'jpeg'){
                        if(!file_exists($this->thumbnail_abs_dir . $album_name)){
                            mkdir($this->thumbnail_abs_dir . $album_name);
                            imagejpeg($newImage, $this->thumbnail_abs_dir . $album_name . '/' . $fileName);
                        }
                        else{
                            imagejpeg($newImage, $this->thumbnail_abs_dir . $album_name . '/' . $fileName);
                        }
                    }
                    else if ($fileType == 'png'){
                        if(!file_exists($this->thumbnail_abs_dir . $album_name)){
                            mkdir($this->thumbnail_abs_dir . $album_name);
                            imagepng($newImage, $this->thumbnail_abs_dir . $album_name . '/' . $fileName);
                        }
                        else{
                            imagepng($newImage, $this->thumbnail_abs_dir . $album_name . '/' . $fileName);
                        }
                    }
                }
            }
        }

        private function getType($fileType){
            $arr = explode('/', $fileType);
            return array_pop($arr);
        }
    }