<?php
    namespace controllers\account;
    use core\engine\Controller;

    class MyGallery extends Controller
    {
        public function index()
        {
            $account_model = $this->load->model('account/account');
            $this->deleteAlbum();
            $albums = $account_model->getAlbums($this->session->get('user')['id']);
            $data = array();

            $uri_params = explode('/', $this->request->getUriWithoutParams());
            if(isset($uri_params[2]) && $uri_params[2] == 'album'){
                $album_id = (int)$uri_params[3];

                return $this->load->view('Account/album', $this->album($album_id));
            }

            $data['albums'] = array();
            if($albums){
                foreach($albums as $key => $album){
                    $data['albums'][$key]['id'] = $album['id'];
                    $data['albums'][$key]['name'] = $album['name'];
                    $data['albums'][$key]['main_img'] = $album['main_img'];
                }
            }
            return $this->load->view('Account/my_gallery', $data);
        }

        public function album($album_id)
        {
            $account_model = $this->load->model('account/account');
            $data = array();
            $images = $account_model->getImagesOfAlbum($album_id);

            $data['images'] = array();
            if($images){
                foreach($images as $key => $image){
                    $data['images_preview'][$key] = $this->yandexDisk->getResource($image['img_url'])->preview;
                    $data['images'][$key] = $this->yandexDisk->getResource($image['img_url'])->getLink();
                }
            }

            return $data;
        }

        public function deleteAlbum()
        {
            if($this->request->has('album_del', 'post')){
                $account_model = $this->load->model('account/account');
                $album = $account_model->getAlbumById($this->request->post['album_del']);
                $resource = $this->yandexDisk->getResource($album['dir_path']);
                $account_model->deleteAlbumById($album['id']);
                $account_model->deleteImagesByAlbum($album['id']);
                $resource->delete(true);
            }
        }

    }