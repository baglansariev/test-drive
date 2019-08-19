<?php
    namespace models\albums;
    use core\engine\Model;

    class Albums extends Model
    {
        public function getAlbumById($album_id)
        {
            $query = "SELECT * FROM " . DB_PREFIX . "albums WHERE id = '" . $album_id . "'";
            return $this->db->getRow($query);
        }

        public function getImagesOfAlbum($album_id)
        {
            $query = "SELECT * FROM " . DB_PREFIX . "album_images WHERE album_id = '" . $album_id . "'";
            return $this->db->getAllRows($query);
        }

        public function getVideosOfAlbum($album_id)
        {
            $query = "SELECT * FROM " . DB_PREFIX . "album_videos WHERE album_id = '" . $album_id . "'";
            return $this->db->getAllRows($query);
        }
    }