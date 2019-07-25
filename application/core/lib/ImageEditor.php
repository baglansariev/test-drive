<?php
    namespace core\lib;

    class ImageEditor
    {
        public function getImageType($image)
        {
            $arr = explode('.', $image);
            $type = array_pop($arr);

            if($type == 'jpg' || $type == 'jpeg' || $type == 'png'){
                return $type;
            }
        }

        public function imageStamp($img_url, $stamp_url, $img_type)
        {
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
//            header('Content-type: image/png');
            imagepng($img, $img_url);
            imagedestroy($img);

        }

        public function imgSetFilter($img_url, $img_type, $filter)
        {
            if($img_type == 'jpg' || $img_type == 'jpeg'){
                $img = imagecreatefromjpeg($img_url);
            }
            elseif($img_type == 'png'){
                $img = imagecreatefrompng($img_url);
            }

            if($filter == 'gray'){
                imagefilter($img, IMG_FILTER_GRAYSCALE);
            }
            elseif($filter == 'green'){
                imagefilter($img, IMG_FILTER_COLORIZE, 191,79,79, 50);
            }
            elseif($filter == 'purple'){
                imagefilter($img, IMG_FILTER_COLORIZE, 41,25,88, 50);
            }

            imagefilter($img, IMG_FILTER_GRAYSCALE);

            imagepng($img, $img_url);
        }
    }