<?php

namespace App\Classes;

// use GeoIp2\Database\Reader;

class GetLocation
{
    public $api;

    public function __construct()
    {
        if( !$this->check_session() ) {
            $this->import_to_session();
        }
    }

    public function get_all()
    {
        $result = $this->print_session_location();
        return $result;
    }

    public function import_to_session()
    {
        $userIp = get_user_ip();
        $api = $this->get_sx_location();
        if ($api == false) {
            $api = $this->get_by_api();
        }
        if ($api) {
            $json = json_encode($api);
            $_SESSION['locations'][$userIp] = base64_encode($json);
        }
    }

    public function get_sx_location()
    {
        $this->check_sx_database();
        $data = implode(DIRECTORY_SEPARATOR, [__DIR__, '..', 'SxGeoCity.dat']);
        if (!file_exists($data)) {
            return false;
        }

        $sxGeo = new SxGeo('SxGeoCity.dat');
        $ip = get_user_ip();
        $info  = $sxGeo->getCityFull($ip);

        $result = [];
        $result['ip'] = $ip;
        if (isset($info['country'])) {
            $result['full_name'] = $info['country']['name_en'];
            $result['country'] = $info['country']['iso'];
        }
        if (isset($info['city']['name_en'])) {
            $result['city'] = $info['city']['name_en'];
        }
        
        return $result;
    }

    public function check_sx_database()
    {
        $data = implode(DIRECTORY_SEPARATOR, [__DIR__, '..', 'SxGeoCity.dat']);
        $destination = implode(DIRECTORY_SEPARATOR, [__DIR__, '..', 'SxGeoCity.zip']);
        if (!file_exists($data)) {
            $file = 'https://sypexgeo.net/files/SxGeoCity_utf8.zip';
            $load = exec("wget -O {$destination} {$file}");
        }
        if (file_exists($destination)) {
            $unzip = exec("unzip -o {$destination}");
            $delete = exec("rm -rf {$destination}");
        }
    }

    public function check_session()
    {
        $userIp = get_user_ip();
        return isset($_SESSION['locations'][$userIp]);
    }

    public function print_session_location()
    {
        $userIp = get_user_ip();
        
        if ($userIp == false) {
            return false;
        }

        $base = $_SESSION['locations'][$userIp];
        $json = base64_decode($base);
        return json_decode($json, 1);
    }

    public function get_by_api()
    {
        $userIp = get_user_ip();
        $settings = get_settings();

        if ($userIp == false) {
            return false;
        }

        $defaultToken = '8b50524357b6bc';
        $token = (isset($settings['intlToken'])) ? $settings['intlToken'] : $defaultToken;
        $apiUrl = "http://ipinfo.io/{$userIp}?token={$token}";

        // $apiUrl = 'http://138.68.94.189/api/get_location/' . $userIp;

        $raw = @file_get_contents($apiUrl);
        if (!empty($raw)) {
            $json = json_decode($raw, 1);
            if (is_array($json) && isset($json['country'])) {
                return $json;
            }
        }
        return false;
    }

    public function get_country_name()
    {
        $result = $this->print_session_location();
        if ($result == false) {
            return [
                'EN' => '',
                'RU' => '',
                'code' => ''
            ];
        }
        $names = $this->import_country_names();
        if (!empty($result) && isset($result['country'])) {
            $code = $result['country'];
            foreach ($names as $name) {
                if ($name['alpha2'] == $code) {
                    return [
                        'EN' => $name['english'],
                        'RU' => $name['name'],
                        'code' => $code
                    ];
                }
            }
        }
    }

    public function import_country_names()
    {
        $path = implode(DIRECTORY_SEPARATOR, [__DIR__, '..', 'country_names.json']);
        if (!file_exists($path)) {
            return [];
        }
        $raw = file_get_contents($path);
        $array = json_decode($raw, 1);
        return $array;
    }
}