<?php
    namespace models\account;
    use core\engine\Model;

    class Account extends Model
    {
        public function registerNewUser($place_name, $user_fullname, $user_email, $user_password)
        {
            $userQuery = "INSERT INTO " . DB_PREFIX . "users SET name = '" . $user_fullname . "', email = '" . $user_email . "', password = '" . $user_password . "'";

            if($this->db->changeData($userQuery)){
                $query = "SELECT id AS user_id FROM " . DB_PREFIX . "users WHERE email = '" . $user_email . "'";
                $result = $this->db->getRow($query);

                if($result){
                    $placeQuery = "INSERT INTO " . DB_PREFIX . "places SET name = '" . $place_name . "', user_id = '" . $result['user_id'] . "'";
                    $this->db->changeData($placeQuery);
                }
                return true;
            }
            return false;
        }

        public function getUser($user_email)
        {
            $query = "SELECT * FROM " . DB_PREFIX . "users WHERE email = '" . $user_email . "'";
            return $this->db->getRow($query);
        }

        public function getUserData($user_email)
        {
            $query = "SELECT pk_users.email AS user_email, pk_users.name AS user_fullname, pk_places.name AS place_name, pk_places.id AS place_id, pk_places.user_id FROM " . DB_PREFIX . "users LEFT JOIN " . DB_PREFIX . "places ON pk_users.id = pk_places.user_id WHERE email = '" . $user_email . "'";
            return $this->db->getRow($query);
        }

        public function getUserFullData($user_email)
        {
            $query = "SELECT pk_users.id AS user_id, pk_users.email AS user_email, pk_users.name AS user_fullname, pk_users.status AS user_status, pk_users.password as user_password, pk_places.name AS place_name, pk_places.id AS place_id, pk_places.user_id FROM " . DB_PREFIX . "users LEFT JOIN " . DB_PREFIX . "places ON pk_users.id = pk_places.user_id WHERE email = '" . $user_email . "'";
            return $this->db->getRow($query);
        }

        public function getAlbum($album_name)
        {
            $query = "SELECT * FROM " . DB_PREFIX . "albums WHERE name = '" . $album_name . "'";
            return $this->db->getRow($query);
        }

        public function getAlbums($user_id)
        {
            $query = "SELECT * FROM " . DB_PREFIX . "albums WHERE user_id = '" . $user_id . "'";
            return $this->db->getAllRows($query);
        }

        public function getImagesOfAlbum($album_id)
        {
            $query = "SELECT * FROM " . DB_PREFIX . "album_images WHERE album_id = '" . $album_id . "'";
            return $this->db->getAllRows($query);
        }

        public function setNewAlbum($album_name, $main_img_url, $user_id)
        {
            $query = "INSERT INTO " . DB_PREFIX . "albums SET name = '" . $album_name . "', main_img = '" . $main_img_url . "', user_id = '" . (int)$user_id . "'";
            $this->db->changeData($query);
        }

        public function setNewImage($img_url, $album_id)
        {
            $query = "INSERT INTO " . DB_PREFIX . "album_images SET img_url = '" . $img_url . "', album_id = '" . $album_id . "'";
            $this->db->changeData($query);
        }

        public function hasEmail($email)
        {
            $query = "SELECT COUNT(*) AS 'count' FROM " . DB_PREFIX . "users WHERE email = '" . $email . "'";
            $result = $this->db->getRow($query);

            return $result['count'];
        }

        public function hasAlbum($album, $user_id)
        {
            $query = "SELECT COUNT(*) AS 'count' FROM " . DB_PREFIX . "albums WHERE name = '" . $album . "' AND user_id = '" . $user_id . "'";
            $result = $this->db->getRow($query);

            return $result['count'];
        }

        public function hasPlace($place_name)
        {
            $query = "SELECT COUNT(*) AS 'count' FROM " . DB_PREFIX . "places WHERE name = '" . $place_name . "'";
            $result = $this->db->getRow($query);

            return $result['count'];
        }
    }