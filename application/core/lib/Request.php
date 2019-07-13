<?
    namespace application\core\lib;

    use application\core\lib\Session;

    class Request
    {
        public $get = array();
        public $post = array();
        public $session;
        private $uri;

        public function __construct()
        {
            $this->uri = trim($_SERVER['REQUEST_URI'], '/');
            $this->get = $this->getValue($_GET);
            $this->post = $this->getValue($_POST);
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

        private function getValue($data)
        {
            return $data;
        }
    }
