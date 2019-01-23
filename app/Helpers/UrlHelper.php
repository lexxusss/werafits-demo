<?php
/**
 * Created by: alextsyk.
 * Email: alexxx.tsyk@gmail.com
 * IDE: PhpStorm
 * Date: December / 2018
 */

namespace App\Helpers;


class UrlHelper
{
    public static function getFullUrlToImage($url)
    {
        if (str_contains($url, 'http://') || str_contains($url, 'https://') || substr($url, 0, 2) === '//') {
            return $url;
        }

        return str_replace(storage_path('app/public'), '/storage', $url);
    }

    public static function getIpViaServerVars() {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }

        return $ip;
    }

    /**
     * Get client real public IP
     *
     * @param bool $openDns
     * @param bool $ipify
     * @return mixed
     */
    public static function getUserIP($openDns = false, $ipify = false) {
        if ($openDns) {
            return trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));
        }
        if ($ipify) {
            return (new \GuzzleHttp\Client())->get('https://api.ipify.org')->getBody()->getContents();
        }

        return self::getIpViaServerVars();
    }
}
