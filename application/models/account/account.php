<?php
    namespace application\models\account;
    use application\core\engine\Model;

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
        public function tester($user_email)
        {
            $query = "SELECT id AS user_id FROM " . DB_PREFIX . "users WHERE email = '" . $user_email . "'";
            $result = $this->db->getRow($query);
            return $result;
        }

        public function emailCHeck($email)
        {
            $query = "SELECT COUNT(*) AS 'count' FROM " . DB_PREFIX . "users WHERE email = '" . $email . "'";
            $result = $this->db->getRow($query);

            return $result['count'];
        }
    }