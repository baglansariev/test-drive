<?php
    namespace controllers;
    use core\engine\Controller;

    class AlbumController extends Controller
    {
        public function indexAction()
        {
            $this->view->asset->setCss('/public/style/3d-gallery/css/style.css');
            $this->view->asset->setJs('/public/style/3d-gallery/js/modernizr.custom.53451.js');
            $this->view->asset->setJs('/public/style/3d-gallery/js/jquery.gallery.js');
            $this->view->asset->setJs('/public/style/owl-carousel/album-image-owl.js');

            $album_model = $this->load->model('albums/Albums');
            $uriParams = explode('/', $this->request->getUriWithoutParams());
            if($uriParams[0] == 'album'){
                $album_id = $uriParams[1];
            }
            $data = array();

            if((int)$album_id){
                $album = $album_model->getAlbumById($album_id);
                $data['album'] = array();

                if($album){
                    $this->view->asset->setTitle($album['name']);
                    $data['album']['name'] = $album['name'];
                    $data['album']['date'] = $album['date_insert'];
                    $data['album']['main_img'] = $this->yandexDisk->getResource($album['main_img'])->getLink();
                }

                $data['images'] = array();
                $images = $album_model->getImagesOfAlbum($album_id);
                if($images){
                    foreach($images as $key => $image){
                        $data['images'][$key]['id'] = $image['id'];
                        $data['images'][$key]['img_url'] = $this->yandexDisk->getResource($image['img_url'])->getLink();
                        $data['images'][$key]['download_url'] = $this->yandexDisk->getResource($image['img_url'])->file;
                        $data['images'][$key]['thumbnail'] = $image['thumbnail'];
                    }
                }

                $data['videos'] = array();
                $videos = $album_model->getVideosOfAlbum($album_id);
                if($videos){
                    foreach($videos as $key => $video){
                        $data['videos'][$key]['id'] = $video['id'];
                        $data['videos'][$key]['video_url'] = $this->yandexDisk->getResource($video['video_url'])->getLink();
                    }
                }
            }


            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');
            $this->view->response('Albums/album-page', $data);
        }

        public function placeListAction()
        {
            $this->view->asset->setTitle('Заведения');

            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');
            $this->view->response('Albums/places', $data);
        }
    }