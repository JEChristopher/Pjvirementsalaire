<?php

namespace App\Helpers;

class Helpers
{
    /**
     * Ajout de nouveau fichier
     *
     * @param $file
     * @param string $dirName
     * @return string[]
     */
    public static function addFile($file, string $dirName)
    {
        try {
            $path = public_path() . DIRECTORY_SEPARATOR . 'storage'. DIRECTORY_SEPARATOR . $dirName;

            if(is_dir($path) === false)
            {
                mkdir($path);
            }

            $fileName = date('Ymd.His') . '-' . $file->getClientOriginalName();
            $fileName = str_replace(' ', '-', $fileName);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            $fileName = md5($fileName) . '.' . $fileType;

            $file->move($path, $dirName . DIRECTORY_SEPARATOR . $fileName);

            return ['ext' => $fileType, 'fileName' => $fileName];
        } catch (\Exception $e) {
            dump($e->getMessage());
            die();
        }
    }

    public static function generateToken($url, $data)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }

public static function CurlRequest($params, $url, $method = 'POST')
{
    if (function_exists('curl_version')) {
        try {
            $curl = curl_init();
            if ($method == 'POST') {
                $postfield = '';
                foreach ($params as $index => $value) {
                    $postfield .= $index . '=' . $value . "&";
                }
                $postfield = substr($postfield, 0, -1);
            } else {
                $postfield = null;
            }
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 45,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $method,
                CURLOPT_POSTFIELDS => $postfield,
                CURLOPT_HTTPHEADER => array(
                    "cache-control: no-cache",
                    "content-type: application/x-www-form-urlencoded",
                ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                throw new \Exception("Error :" . $err);
            } else {
                return $response;
            }
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    } elseif (ini_get('allow_url_fopen')) {
        try {
            // Build Http query using params
            $query = http_build_query($params);
            // Create Http context details
            $options = array(
                'http' => array(
                    'header' => "Content-Type: application/x-www-form-urlencoded\r\n" .
                        "Content-Length: " . strlen($query) . "\r\n" .
                        "User-Agent:MyAgent/1.0\r\n",
                    'method' => "POST",
                    'content' => $query,
                ),
            );
            // Create context resource for our request
            $context = stream_context_create($options);
            // Read page rendered as result of your POST request
            $result = file_get_contents(
                $url, // page url
                false,
                $context
            );
            return trim($result);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    } else {
        throw new \Exception("Vous devez activer curl ou allow_url_fopen pour utiliser CinetPay");
    }
}
}
