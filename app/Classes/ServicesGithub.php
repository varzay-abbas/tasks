<?php

namespace App\Classes {

    
class ServicesGithub
{
    /*
    |--------------------------------------------------------------------------
    | Github Services Class
    |--------------------------------------------------------------------------
    |
    | This Class handles functionalities on the data from github api .
    |
    */

    /**
     * users from github.
     *
     * @var array type
     */
    private static $users = [];

    /**
     * Get data from github api.
     *
     * @param
     *
     * @return users
     */
    private static function getApiData()
    {
        $str = file_get_contents('https://gitlab.iterato.lt/snippets/3/raw');
        self::$users = json_decode($str, false);
    }

    /**
     * Get users github api.
     *
     * @param
     *
     * @return users
     */
    public static function getUsers()
    {
        self::getApiData();

        return self::$users;
    }

    /**
     * Get user ids from github api users.
     *
     * @param
     *
     * @return user ids
     */
    public static function getUserIds()
    {
        self::getApiData();
        $ids = [];
        $users = self::$users;
        foreach ($users->data as $user) {
            $ids[] = $user->id;
        }

        return $ids;
    }
}
}
