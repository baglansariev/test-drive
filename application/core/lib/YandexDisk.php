<?php
    namespace core\lib;
    use Arhitector\Yandex\Disk;

    class YandexDisk extends Disk
    {
        const accessToken = 'AgAAAAAU90OOAAXHOTi2kjMkKEeRmXT7FLbvPUQ';

        public function __construct()
        {
            parent::__construct(self::accessToken);
        }
    }