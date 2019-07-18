<?php
    namespace core\lib;

    class Response
    {
        public function addHeader($param)
        {
            header($param);
        }

        public function output($param)
        {
            echo $param;
        }

        public function redirect($location)
        {
            header('Location: ' . $location);
        }
    }