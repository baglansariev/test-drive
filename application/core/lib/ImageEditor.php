<?php
    namespace core\lib;

    class ImageEditor
    {
        public function __construct()
        {
            ini_set("gd.jpeg_ignore_warning", 1);
        }

        public function getImageType($imageType)
        {
            $arr = explode('/', $imageType);
            $type = array_pop($arr);

            if($type == 'jpg' || $type == 'jpeg' || $type == 'png' || $type == 'gif'){
                return $type;
            }
        }

        public function getVideoType($videoType)
        {
            $arr = explode('/', $videoType);
            $type = array_pop($arr);

            if($type == 'mp4' || $type == 'mpeg4' || $type == 'avi'){
                return $type;
            }
        }

        public function getFileType($file)
        {
            $arr = explode('/', $file);
            $type = array_pop($arr);

            if($type == 'jpg' || $type == 'jpeg' || $type == 'png' || $type == 'gif'){
                return 'photo';
            }
            else if ($type == 'mp4' || $type == 'mpeg4' || $type == 'avi'){
                return 'video';
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
    }