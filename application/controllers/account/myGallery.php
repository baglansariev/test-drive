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
            $this->deleteImage();
            $account_model = $this->load->model('account/account');
            $data = array();
            $images = $account_model->getImagesOfAlbum($album_id);
            $videos = $account_model->getVideosOfAlbum($album_id);

            $data['images'] = array();
            $data['videos'] = array();
            if($images){
                foreach($images as $key => $image){
                    $data['images'][$key]['url'] = $this->yandexDisk->getResource($image['img_url'])->getLink();
                    $data['images'][$key]['thumbnail'] = $image['thumbnail'];
                    $data['images'][$key]['id'] = $image['id'];
                }
            }
            if($videos){
                foreach($videos as $key => $video){
                    $data['videos'][$key]['url'] = $this->yandexDisk->getResource($video['video_url'])->getLink();
                    $data['videos'][$key]['id'] = $video['id'];
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
                $images = $account_model->getImagesOfAlbum($album['id']);
                foreach ($images as $image) {
                    if(file_exists(DOCUMENT_ROOT . $image['thumbnail'])){
                        unlink(DOCUMENT_ROOT . $image['thumbnail']);
                    }
                }
                $account_model->deleteAlbumById($album['id']);
                $account_model->deleteVideosByAlbum($album['id']);
                $account_model->deleteImagesByAlbum($album['id']);
                $resource->delete(true);
            }
        }

        public function deleteImage()
        {
            if($this->request->has('del_id')){
                $account_model = $this->load->model('account/account');
                $image = $account_model->getImageById($this->request->post['del_id']);
                $resource = $this->yandexDisk->getResource($image['img_url']);
                $resource->delete(true);
                $account_model->deleteImageById($this->request->post['del_id']);
                if(file_exists(DOCUMENT_ROOT . $image['thumbnail'])){
                    unlink(DOCUMENT_ROOT . $image['thumbnail']);
                }

                $json['del_image'] = $this->form->success_msg['del_image'];
                $this->response->outputJSON($json['del_image']);
                exit;
            }
        }

    }