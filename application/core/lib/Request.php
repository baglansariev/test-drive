<?
namespace application\core\lib;

class Request
{
    public $get = array();
    public $post = array();
    private $uri;

    public function __construct()
    {
        $this->uri = trim($_SERVER['REQUEST_URI'], '/');
        $this->get = $this->getValue($_GET);
        $this->post = $this->getValue($_POST);
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

    public function getValue($data)
    {
        return $data;
    }
}
