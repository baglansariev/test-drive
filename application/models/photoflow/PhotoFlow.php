<?php
    namespace models\photoflow;
    use core\engine\Model;

    class PhotoFlow extends Model
    {
        public function getAllPhotos()
        {
            $query = "SELECT * FROM " . DB_PREFIX . "album_images";
            return $this->db->getAllRows($query);
        }
    }