<?php

namespace App\Base\Constants\Auth;

class Role
{
    const USER = 'user';
    const SUPER_ADMIN = 'super-admin';
    const ADMIN = 'admin';
    const DRIVER = 'driver';
    const DISPATCHER = 'dispatcher';
    const OWNER = 'owner';


    /**
     * Get all the admin roles.
     *
     * @return array
     */
    public static function adminRoles()
    {
        return [
            self::SUPER_ADMIN,
            self::ADMIN,
            self::DISPATCHER,
            self::OWNER,
        ];
    }
    /**
     * Get all the admin roles.
     *
     * @return array
     */
    public static function exceptSuperAdminRoles()
    {
        return [
            self::ADMIN,
            self::OWNER,
            self::OWNER,
        ];
    }

    /**
     * Get all the web panel roles.
     *
     * @return array
     */
    public static function webPanelLoginRoles()
    {
        return [
            self::SUPER_ADMIN,
            self::ADMIN,
            self::OWNER,
        ];
    }
    /**
    * Get all the web panel roles.
    *
    * @return array
    */
    public static function webShowableRoles()
    {
        return [
            self::SUPER_ADMIN,
            self::ADMIN,
            self::OWNER,

        ];
    }

    /**
     * Get all the Merchant and Admin roles
     * @return array
     */
    public static function masterDataAccessRoles()
    {
        return [
            self::ADMIN,
            self::SUPER_ADMIN,
            self::OWNER,


        ];
    }

    /**
     * Get all the user and Admin roles
     * @return array
     */
    public static function userAndAdminRoles()
    {
        return [
            self::USER,
            self::SUPER_ADMIN,
            self::ADMIN,
            self::OWNER,

        ];
    }

    /**
     * Get all the user and driver roles
     * @return array
     */
    public static function mobileAppRoles()
    {
        return [
            self::USER,
            self::DRIVER,
            self::OWNER,

        ];
    }
}
