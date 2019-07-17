<?
    namespace core\lib;

    use core\lib\Session;

    class Request
    {
        public $get = array();
        public $post = array();
        public $request = array();
        public $files = array();
        public $session;
        private $uri;

        public function __construct()
        {
            $this->uri = trim($_SERVER['REQUEST_URI'], '/');
            $this->get = $this->getValue($_GET);
            $this->post = $this->getValue($_POST);
            $this->request = $this->getValue($_REQUEST);
            $this->files = $this->getValue($_FILES);
            $this->session = new Session;
        }

        public function getUri()
        {
            return $this->uri;
        }

        public function getUriWithoutParams()
        {
            $uri = explode('?', $this->uri);

            if(is_array($uri)){
                return array_shift($uri);
            }

            return $this->uri;
        }

        public function has($key, $request_method = 'request')
        {
            if(isset($this->$request_method[$key])){
                return true;
            }
            return false;

        }

        private function getValue($data)
        {
            return $data;
        }
    }
