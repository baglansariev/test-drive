<?php
    namespace models\home;
    use core\engine\Model;

    class Home extends Model
    {
        public function getAlbums()
        {
            return $this->db->getAllRows("SELECT * FROM " . DB_PREFIX . "albums ORDER BY date_insert DESC");
        }
    }