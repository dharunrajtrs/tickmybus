<?php

namespace Database\Seeders;

use App\Base\Constants\Auth\Permission as PermissionSlug;
use App\Base\Constants\Auth\Role as RoleSlug;
use App\Models\Access\Permission;
use App\Models\Access\Role;
use Illuminate\Database\Seeder;
use DB;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
      * List of all the permissions to be created.
      *
      * @var array
      */

    protected $permissions = [

//Dashboard and Configurations
       PermissionSlug::ACCESS_DASHBOARD => [
            'name' => 'Access-Dashboard',
            'description' => 'Access Dashboard',
            'main_menu' => 'dashboard',
            'sub_menu' => null,
            'sort' => 1,
            'main_link' => 'dashboard',
            'icon' => 'fa fa-tachometer'
        ],
        PermissionSlug::GET_ALL_ROLES => [
            'name' => 'Get-All-Roles',
            'description' => 'Get-All-Roles',
            'main_menu'=>'settings',
            'sub_menu'=>'roles',
            'sub_link'=>'roles',
        ],
        PermissionSlug::EDIT_ROLES => [
            'name' => 'edit-roles',
            'description' => 'Edit all roles',
            'main_menu'=>'settings',
            'sub_menu'=>'roles',
            'sub_link'=>'roles',
            ],
        PermissionSlug::CREATE_ROLES => [
            'name' => 'create-roles',
            'description' => 'Create Roles',
            'main_menu' => 'settings',
            'sub_menu' => null,
            'sort' => 12,
            'icon' => 'fa fa-cogs'
        ],
        PermissionSlug::GET_ALL_PERMISSIONS => [
            'name' => 'Get-All-Permissions',
            'description' => 'Get all permissions',
            'main_menu'=>'settings',
            'sub_menu'=>'roles',
        ],

        PermissionSlug::SETTINGS => [
            'name' => 'view-all-settings',
            'description' => 'View All Settings',
            'main_menu' => 'settings',
            'sub_menu' => null,
            'sort' => 12,
            'icon' => 'fa fa-cogs'
        ],
        PermissionSlug::VIEW_SYSTEM_SETINGS => [
            'name' => 'view-system-settings',
            'description' => 'view-system-settings',
            'main_menu' => 'settings',
            'sub_menu' => null,
            'sort' => 12,
            'icon' => 'fa fa-cogs'
        ],
        PermissionSlug::VIEW_TRANSLATIONS => [
            'name' => 'view-translations',
            'description' => 'View Translations',
            'main_menu' => 'settings',
            'sub_menu' => null,
            'sort' => 12,
            'icon' => 'fa fa-cogs'
        ],
/* Master */
        PermissionSlug::MASTER => [
            'name' => 'master-data',
            'description' => 'View All Master Data',
            'main_menu' => 'master',
            'sub_menu' => null,
            'sort' => 17,
            'icon' => 'fa fa-code-fork'
        ],

   // Manage Driver Needed Doc
        PermissionSlug::MANAGE_DRIVER_NEEDED_DOC => [
            'name' => 'manage-driver-needed-document',
            'description' => 'List driver needed documents',
            'main_menu'=>'master',
            'sub_menu'=>'needed_doc',
            'sub_link'=>'needed_doc',
        ],
        PermissionSlug::ADD_DRIVER_NEEEDED_DOC => [
            'name' => 'add-driver-needed-document',
            'description' => 'Add driver needed documents',
            'main_menu'=>'master',
            'sub_menu'=>'needed_doc',
            'sub_link'=>'needed_doc',
        ],
        PermissionSlug::EDIT_DRIVER_NEEEDED_DOC => [
            'name' => 'edit-driver-needed-document',
            'description' => 'Edit driver needed documents',
            'main_menu'=>'master',
            'sub_menu'=>'needed_doc',
            'sub_link'=>'needed_doc',
        ],
        PermissionSlug::DELETE_DRIVER_NEEEDED_DOC => [
            'name' => 'delete-driver-needed-document',
            'description' => 'Delete driver needed documents',
            'main_menu'=>'master',
            'sub_menu'=>'needed_doc',
            'sub_link'=>'needed_doc',
        ],
        PermissionSlug::TOGGLE_DRIVER_NEEEDED_DOC => [
            'name' => 'toggle-driver-needed-documentt',
            'description' => 'toggle-driver-needed-document',
            'main_menu'=>'master',
            'sub_menu'=>'needed_doc',
            'sub_link'=>'needed_doc',
        ],
     //Manage Fleet Needed Doc
        PermissionSlug::MANAGE_FLEET_NEEDED_DOC => [
            'name' => 'manage-fleet_needed-document',
            'description' => 'List fleet needed documents',
            'main_menu'=>'master',
            'sub_menu'=>'fleet_needed_doc',
            'sub_link'=>'fleet_needed_doc',
        ],
        PermissionSlug::ADD_FLEET_NEEEDED_DOC => [
            'name' => 'add-fleet-needed-document',
            'description' => 'Add fleet needed documents',
            'main_menu'=>'master',
            'sub_menu'=>'fleet_needed_doc',
            'sub_link'=>'fleet_needed_doc',
        ],
        PermissionSlug::EDIT_FLEET_NEEEDED_DOC => [
            'name' => 'edit-fleet-needed-document',
            'description' => 'Edit fleet needed documents',
            'main_menu'=>'master',
            'sub_menu'=>'fleet_needed_doc',
            'sub_link'=>'fleet_needed_doc',
        ],
        PermissionSlug::DELETE_FLEET_NEEEDED_DOC => [
            'name' => 'delete-fleet-needed-document',
            'description' => 'Delete fleet needed documents',
            'main_menu'=>'master',
            'sub_menu'=>'fleet_needed_doc',
            'sub_link'=>'fleet_needed_doc',
        ],
        PermissionSlug::TOGGLE_FLEET_NEEEDED_DOC => [
            'name' => 'toggle-fleet-needed-documentt',
            'description' => 'toggle-fleet-needed-document',
            'main_menu'=>'master',
            'sub_menu'=>'fleet_needed_doc',
            'sub_link'=>'fleet_needed_doc',
        ],
        // Manage Owner Needed Doc
        PermissionSlug::MANAGE_OWNER_NEEDED_DOC => [
            'name' => 'manage-owner-needed-document',
            'description' => 'List owner needed documents',
            'main_menu'=>'master',
            'sub_menu'=>'owner_needed_doc',
            'sub_link'=>'owner_needed_doc',
        ],
        PermissionSlug::ADD_OWNER_NEEEDED_DOC => [
            'name' => 'add-owner-needed-document',
            'description' => 'Add Owner needed documents',
            'main_menu'=>'master',
            'sub_menu'=>'owner_needed_doc',
            'sub_link'=>'owner_needed_doc',
        ],
        PermissionSlug::EDIT_OWNER_NEEEDED_DOC => [
            'name' => 'edit-owner-needed-document',
            'description' => 'Edit Owner needed documents',
            'main_menu'=>'master',
            'sub_menu'=>'owner_needed_doc',
            'sub_link'=>'owner_needed_doc',
        ],
        PermissionSlug::DELETE_OWNER_NEEEDED_DOC => [
            'name' => 'delete-owner-needed-document',
            'description' => 'Delete Owner needed documents',
            'main_menu'=>'master',
            'sub_menu'=>'owner_needed_doc',
            'sub_link'=>'owner_needed_doc',
        ],
        PermissionSlug::TOGGLE_OWNER_NEEEDED_DOC => [
            'name' => 'toggle-owner-needed-document',
            'description' => 'toggle Owner needed document',
            'main_menu'=>'master',
            'sub_menu'=>'owner_needed_doc',
            'sub_link'=>'owner_needed_doc',
        ],
    //country
       PermissionSlug::MANAGE_COUNTRY => [
            'name' => 'manage-country',
            'description' => 'List country',
            'main_menu'=>'master',
            'sub_menu'=>'country',
            'sub_link'=>'country',
        ],
        PermissionSlug::EDIT_COUNTRY => [
            'name' => 'edit-country',
            'description' => 'Edit country',
            'main_menu'=>'master',
            'sub_menu'=>'country',
            'sub_link'=>'country',
        ],
      /* service-Location */
        PermissionSlug::SERVICE_LOCATION => [
            'name' => 'Service_Location',
            'description' => 'Available location for app',
            'main_menu'=>'service_location',
            'sub_menu'=> null,
            'main_link'=>'service_location',
            'sort' => 2,
            'icon' => 'fa fa-map-marker'
        ],
        PermissionSlug::ADD_SERVICE_LOCATION => [
            'name' => 'Add_Service_Location',
            'description' => 'Add location for app',
            'main_menu'=>'service_location',
            'sub_menu'=> null,
            'main_link'=>'service_location',
            'sort' => 2,
            'icon' => 'fa fa-map-marker'
        ],
        PermissionSlug::EDIT_SERVICE_LOCATION => [
            'name' => 'Edit_Service_Location',
            'description' => 'Edit location for app',
            'main_menu'=>'service_location',
            'sub_menu'=> null,
            'main_link'=>'service_location',
            'sort' => 2,
            'icon' => 'fa fa-map-marker'
        ],
        PermissionSlug::DELETE_SERVICE_LOCATION => [
            'name' => 'Delete_Service_Location',
            'description' => 'Delete location for app',
            'main_menu'=>'service_location',
            'sub_menu'=> null,
            'main_link'=>'service_location',
            'sort' => 2,
            'icon' => 'fa fa-map-marker'
        ],
        PermissionSlug::TOGGLE_SERVICE_LOCATION => [
            'name' => 'Toggle_Service_Location',
            'description' => 'toggle location for app',
            'main_menu'=>'service_location',
            'sub_menu'=> null,
            'main_link'=>'service_location',
            'sort' => 2,
            'icon' => 'fa fa-map-marker'
        ],
    /* manage-owner */
         PermissionSlug::MANAGE_OWNER => [
            'name' => 'manage_owners',
            'description' => 'Owner list and create',
            'main_menu' => 'manage_owners',
            'sub_menu' => 'owner',
            'sort' => 3,
            'icon' => 'fa fa-briefcase',
            'main_link' => 'owners',
        ],
        PermissionSlug::CREATE_OWNER => [
            'name' => 'add-owner',
            'description' => 'Add Owner',
            'main_menu' => 'manage_owners',
            'sub_menu' => 'owner'
        ],
        PermissionSlug::EDIT_OWNER => [
            'name' => 'edit-owner',
            'description' => 'Edit Owner',
            'main_menu' => 'manage_owners',
            'sub_menu' => 'owner'
        ],
        PermissionSlug::DELETE_OWNER => [
            'name' => 'delete-owner',
            'description' => 'Delete Owner',
            'main_menu' => 'manage_owners',
            'sub_menu' => 'owner'
        ],
        PermissionSlug::TOGGLE_OWNER_STATUS => [
            'name' => 'toggle-owner-status',
            'description' => 'Toggle Owner Status',
            'main_menu' => 'manage_owners',
            'sub_menu' => 'owner'
        ],
        PermissionSlug::VIEW_OWNER_DOCUMENT => [
            'name' => 'view-owner-document',
            'description' => 'View Owner Document',
            'main_menu' => 'manage_owners',
            'sub_menu' => 'owner'
        ],
  /* Manage Fleet */
         PermissionSlug::MANAGE_FLEET => [
            'name' => 'manage-fleet',
            'description' => 'Manage fleets add edit delete',
            'main_menu' => 'manage_fleet',
            'sub_menu' => null,
            'sort' => 18,
            'icon' => 'fa fa-taxi',
            'main_link' => 'fleets',
        ],
        PermissionSlug::CREATE_FLEET => [
            'name' => 'add-fleet',
            'description' => 'Create new fleet',
            'main_menu' => 'manage_fleet',
            'sub_menu' => 'manage_fleet'
        ],
        PermissionSlug::EDIT_FLEET => [
            'name' => 'edit-fleet',
            'description' => 'Edit fleet',
            'main_menu' => 'manage_fleet',
            'sub_menu' => 'manage_fleet'
        ],
        PermissionSlug::DELETE_FLEET => [
            'name' => 'delete-fleet',
            'description' => 'Delete fleet',
            'main_menu' => 'manage_fleet',
            'sub_menu' => 'manage_fleet'
        ],
        PermissionSlug::FLEET_TOGGLE_STATUS => [
            'name' => 'toggle-fleet-status',
            'description' => 'Change status of fleet',
            'main_menu' => 'manage_fleet',
            'sub_menu' => 'manage_fleet'
        ],
        PermissionSlug::FLEET_APPROVE_STATUS => [
            'name' => 'toggle-fleet-approval',
            'description' => 'Change Approve status of fleet',
            'main_menu' => 'manage_fleet',
            'sub_menu' => 'manage_fleet'
        ],
        PermissionSlug::VIEW_FLEET_DOCUMENT => [
            'name' => 'view-fleet-document',
            'description' => 'View Fleet Document',
            'main_menu' => 'manage_fleet',
            'sub_menu' => 'manage_fleet'
        ],
    /* manage-seatlayout */
             PermissionSlug::SEAT_LAYOUT => [
            'name' => 'seatlayout',
            'description' => 'seatlayout list',
            'main_menu' => 'seatlayout',
            'sub_menu' => 'seatlayout',
        ],
         PermissionSlug::MANAGE_SEAT_LAYOUT => [
            'name' => 'manage-seatlayout',
            'description' => 'seatlayout list',
            'main_menu' => 'manage_seatlayout',
            'sub_menu' => 'seatlayout',
        ],
        PermissionSlug::CREATE_SEAT_LAYOUT => [
            'name' => 'add-seatlayout',
            'description' => 'Add Seatlayout',
            'main_menu' => 'manage_seatlayout',
            'sub_menu' => 'seatlayout'
        ],
        PermissionSlug::EDIT_SEAT_LAYOUT => [
            'name' => 'edit-seatlayout',
            'description' => 'Edit Seatlayout',
            'main_menu' => 'manage_seatlayout',
            'sub_menu' => 'seatlayout',
        ],
        PermissionSlug::DELETE_SEAT_LAYOUT => [
            'name' => 'delete-seatlayout',
            'description' => 'Delete Seatlayout',
            'main_menu' => 'manage_seatlayout',
            'sub_menu' => 'seatlayout',
        ],
        PermissionSlug::TOGGLE_SEAT_LAYOUT => [
            'name' => 'toggle-seatlayout',
            'description' => 'Toggle seatlayout status',
            'main_menu' => 'manage_seatlayout',
            'sub_menu' => 'seatlayout',
        ],
      /* Journey */
        PermissionSlug::JOURNEY => [
            'name' => 'journey',
            'description' => 'Journey List',
            'main_menu'=>'view_journey',
            'sub_menu'=> 'journey',
        ],
        PermissionSlug::VIEW_JOURNEY => [
            'name' => 'view_journey',
            'description' => 'view journey',
            'main_menu'=>'view_journey',
            'sub_menu'=> 'jorney',
        ],
        PermissionSlug::COMPLETED_JOURNEY => [
            'name' => 'completed-journey',
            'description' => 'completed journey',
            'main_menu'=>'view_journey',
            'sub_menu'=> 'completed_journey',
        ],
        PermissionSlug::CREATE_JOURNEY => [
            'name' => 'create-journey',
            'description' => 'create journey',
            'main_menu'=>'view_journey',
            'sub_menu'=> 'jorney',
        ],
        PermissionSlug::EDIT_JOURNEY => [
            'name' => 'edit-journey',
            'description' => 'edit journey',
            'main_menu'=>'view_journey',
            'sub_menu'=> 'jorney',
        ],
        PermissionSlug::DELETE_JOURNEY => [
            'name' => 'delete-journey',
            'description' => 'delete journey',
            'main_menu'=>'view_journey',
            'sub_menu'=> 'jorney',
        ],
        PermissionSlug::ASSIGN_DRIVER => [
            'name' => 'assign-driver',
            'description' => 'assign driver journey',
            'main_menu'=>'view_journey',
            'sub_menu'=> 'jorney',
        ],
        PermissionSlug::TOGGLE_JOURNEY => [
            'name' => 'toggle-jorney-status',
            'description' => 'toggle status journey',
            'main_menu'=>'view_journey',
            'sub_menu'=> 'jorney',
        ],

  /* Manage tickets */
         PermissionSlug::VIEW_TICKETS => [
            'name' => 'view_tickets',
            'description' => 'Manage tickets',
            'main_menu' => 'view_tickets',
            'sub_menu' => null,
        ],
        PermissionSlug::BOOKED_TICKETS => [
            'name' => 'booked_tickets',
            'description' => 'booked tickets',
            'main_menu' => 'view_tickets',
            'sub_menu' => 'booked_tickes',
        ],
        PermissionSlug::CANCELLED_TICKETS => [
            'name' => 'cancelled_tickets',
            'description' => 'booked tickets',
            'main_menu' => 'view_tickets',
            'sub_menu' => 'cancelled_tickes',
        ],
        PermissionSlug::VIEW_PASSENGER_LIST => [
            'name' => 'view_passender_list',
            'description' => 'View Passenger List',
            'main_menu' => 'view_tickets',
            'sub_menu' => 'booked_tickes',
        ],
          PermissionSlug::CANCELLED_TICKET_DETAIL => [
            'name' => 'cancelled_ticket_detail',
            'description' => 'cancelled ticket List',
            'main_menu' => 'view_tickets',
            'sub_menu' => 'cancelled_tickes',
        ],

       /* Admin */
        PermissionSlug::ADMIN => [
            'name' => 'Admin',
            'description' => 'Admin User List',
            'main_menu'=>'admin',
            'sub_menu'=> null,
            'main_link'=>'admins',
            'sort' => 3,
            'icon' => 'fa fa-user-circle-o'
        ],
        PermissionSlug::CREATE_ADMIN => [
            'name' => 'add-admin',
            'description' => 'create admin',
            'main_menu'=>'admin',
            'sub_menu'=> null,
            'main_link'=>'admins',
            'sort' => 3,
            'icon' => 'fa fa-user-circle-o'
        ],
        PermissionSlug::EDIT_ADMIN => [
            'name' => 'edit-admin',
            'description' => 'Edit Admin',
            'main_menu'=>'admin',
            'sub_menu'=> null,
            'main_link'=>'admins',
            'sort' => 3,
            'icon' => 'fa fa-user-circle-o'
        ],
        PermissionSlug::DELETE_ADMIN => [
            'name' => 'delete-admin',
            'description' => 'Delete Admin',
            'main_menu'=>'admin',
            'sub_menu'=> null,
            'main_link'=>'admins',
            'sort' => 3,
            'icon' => 'fa fa-user-circle-o'
        ],
        PermissionSlug::TOGGLE_ADMIN => [
            'name' => 'toggle-admin-status',
            'description' => 'toggle status admin',
            'main_menu'=>'admin',
            'sub_menu'=> null,
            'main_link'=>'admins',
            'sort' => 3,
            'icon' => 'fa fa-user-circle-o'
        ],

/* Zone */
        PermissionSlug::MAP_MENU => [
            'name' => 'map',
            'description' => 'View all map related menus',
            'main_menu' => 'map',
            'sub_menu' => null,
            'sort' => 8,
            'icon' => 'fa fa-map'
        ],
        PermissionSlug::VIEW_ZONE_MAP => [
            'name' => 'view-zone-map',
            'description' => 'map-view',
            'main_menu'=>'map',
            'sub_menu'=>'zone',
            'sub_link'=>'zone',
        ],
        PermissionSlug::VIEW_ZONE => [
            'name' => 'Get-All-zones',
            'description' => 'Get all zones',
            'main_menu'=>'map',
            'sub_menu'=>'zone',
            'sub_link'=>'zone',
        ],
        PermissionSlug::ADD_ZONE => [
            'name' => 'add-zones',
            'description' => 'Add zones',
            'main_menu'=>'map',
            'sub_menu'=>'zone',
            'sub_link'=>'zone',
        ],
        PermissionSlug::EDIT_ZONE => [
            'name' => 'edit-zones',
            'description' => 'Edit zones',
            'main_menu'=>'map',
            'sub_menu'=>'zone',
            'sub_link'=>'zone',
        ],
        PermissionSlug::DELETE_ZONE => [
            'name' => 'delete-zones',
            'description' => 'Get all zones',
            'main_menu'=>'map',
            'sub_menu'=>'zone',
            'sub_link'=>'zone',
        ],
        PermissionSlug::TOGGLE_ZONE => [
            'name' => 'toggle-status-zones',
            'description' => 'Toggle Status Zones',
            'main_menu'=>'map',
            'sub_menu'=>'zone',
            'sub_link'=>'zone',
        ],
        PermissionSlug::SURGE_ZONE => [
            'name' => 'surge-zones',
            'description' => 'Surge zones',
            'main_menu'=>'map',
            'sub_menu'=>'zone',
            'sub_link'=>'zone',
        ],
         PermissionSlug::LIST_AIRPORTS => [
            'name' => 'Get-All-Airports',
            'description' => 'Get all airports',
            'main_menu'=>'map',
            'sub_menu'=>'airport',
            'sub_link'=>'aiports',
        ],
        PermissionSlug::ADD_AIRPORTS => [
            'name' => 'Add-Airports',
            'description' => 'Add airports',
            'main_menu'=>'map',
            'sub_menu'=>'airport',
            'sub_link'=>'aiports',
        ],
        PermissionSlug::EDIT_AIRPORTS => [
            'name' => 'Edit-Airports',
            'description' => 'Edit airports',
            'main_menu'=>'map',
            'sub_menu'=>'airport',
            'sub_link'=>'aiports',
        ],
        PermissionSlug::DELETE_AIRPORTS => [
            'name' => 'Delete-Airports',
            'description' => 'Delete airports',
            'main_menu'=>'map',
            'sub_menu'=>'airport',
            'sub_link'=>'aiports',
        ],
        PermissionSlug::MAP_VIEW_AIRPORTS => [
            'name' => 'Map-view-Airports',
            'description' => 'Map-view-Airports',
            'main_menu'=>'map',
            'sub_menu'=>'airport',
            'sub_link'=>'aiports',
        ],
        PermissionSlug::TOGGLE_AIRPORTS => [
            'name' => 'Toggle-Airports',
            'description' => 'Toggle-Airports',
            'main_menu'=>'map',
            'sub_menu'=>'airport',
            'sub_link'=>'aiports',
        ],

/* Fleet Drivers  */
    PermissionSlug::FLEET_DRIVERS_MENU => [
        'name' => 'fleet-drivers-menu',
        'description' => 'fleet-drivers',
        'main_menu' => 'fleet-drivers',
        'sub_menu' => null,
        'sort' => 4,
        'icon' => 'fa fa-users'
    ],
    PermissionSlug::VIEW_APPROVED_FLEET_DRIVERS => [
        'name' => 'view-approved-fleet-drivers',
        'description' => 'Get all drivers',
        'main_menu'=>'fleet-drivers',
        'sub_menu'=>'fleet-driver_details',
        'sub_link'=>'fleet-drivers',
    ],
    PermissionSlug::FLEET_DRIVERS_WAITING_FOR_APPROVAL => [
        'name' => 'fleet-drivers-waiting-for-approval',
        'description' => 'fleet-drivers-waiting-for-approval',
        'main_menu'=>'fleet-drivers',
        'sub_menu'=>'fleet-driver_details',
        'sub_link'=>'fleet-drivers',
    ],
    PermissionSlug::EDIT_FLEET_DRIVERS => [
        'name' => 'edit-fleet-drivers',
        'description' => 'edit-fleet-drivers',
        'main_menu'=>'fleet-drivers',
        'sub_menu'=>'driver_details',
        'sub_link'=>'fleet-drivers',
    ],
    PermissionSlug::TOGGLE_FLEET_DRIVERS => [
        'name' => 'toggle-fleet-drivers',
        'description' => 'toggle-fleet-drivers',
        'main_menu'=>'fleet-drivers',
        'sub_menu'=>'driver_details',
        'sub_link'=>'fleet-drivers',
    ],
    PermissionSlug::UPDATE_FLEET_DRIVERS => [
        'name' => 'update-fleet-drivers',
        'description' => 'update-fleet-drivers',
        'main_menu'=>'drivers',
        'sub_menu'=>'driver_details',
        'sub_link'=>'fleet-drivers',
    ],
    PermissionSlug::DELETE_FLEET_DRIVERS => [
        'name' => 'delete-fleet-drivers',
        'description' => 'delete-fleet-drivers',
        'main_menu'=>'fleet-drivers',
        'sub_menu'=>'driver_details',
        'sub_link'=>'fleet-drivers',
    ],
    PermissionSlug::ADD_FLEET_DRIVERS => [
        'name' => 'add-fleet-drivers',
        'description' => 'add-fleet-drivers',
        'main_menu'=>'fleet-drivers',
        'sub_menu'=>'driver_details',
        'sub_link'=>'fleet-drivers',
    ],
    PermissionSlug::VIEW_FLEET_DRIVER_REQUEST_LIST => [
        'name' => 'view-fleet-driver-request-list',
        'description' => 'view-fleet-driver-request-list',
        'main_menu'=>'fleet-drivers',
        'sub_menu'=>'driver_details',
        'sub_link'=>'fleet-drivers',
    ],
    PermissionSlug::FLEET_DRIVER_PAYMENT_HISTORY => [
        'name' => 'fleet-driver-payment-history',
        'description' => 'fleet-driver-payment-history',
        'main_menu'=>'fleet-drivers',
        'sub_menu'=>'driver_details',
        'sub_link'=>'fleet-drivers',
    ],
    PermissionSlug::VIEW_FLEET_DRIVER_PROFILE => [
        'name' => 'view-fleet-driver-profile',
        'description' => 'view-fleet-driver-profile',
        'main_menu'=>'fleet-drivers',
        'sub_menu'=>'driver_details',
        'sub_link'=>'fleet-drivers',
    ],
    /*Fleet Driver Document */
    PermissionSlug::FLEET_DRIVER_DOCUMENT => [
        'name' => 'fleet-driver-document',
        'description' => 'fleet-driver-document',
        'main_menu'=>'fleet-drivers',
        'sub_menu'=>'fleet-driver_details',
        'sub_link'=>'fleet-drivers',
    ],
    PermissionSlug::FLEET_DRIVER_DOCUMENT_VIEW => [
        'name' => 'fleet-driver-document-view',
        'description' => 'fleet-driver-document-view',
        'main_menu'=>'fleet-drivers',
        'sub_menu'=>'fleet-driver_details',
        'sub_link'=>'fleet-drivers',
    ],
    PermissionSlug::FLEET_DRIVER_DOCUMENT_VIEW_IMAGE => [
        'name' => 'fleet-driver-document-view-image',
        'description' => 'fleet-driver-document-view',
        'main_menu'=>'drivers',
        'sub_menu'=>'fleet-driver_details',
        'sub_link'=>'fleet-drivers',
    ],
    PermissionSlug::FLEET_DRIVER_DOCUMENT_EDIT => [
        'name' => 'fleet-driver-document-edit',
        'description' => 'fleet-driver-document-edit',
        'main_menu'=>'fleet-drivers',
        'sub_menu'=>'fleet-driver_details',
        'sub_link'=>'fleet-drivers',
    ],
    PermissionSlug::FLEET_DRIVER_DOCUMENT_UPLOAD => [
        'name' => 'fleet-driver-document-upload',
        'description' => 'fleet-driver-document-upload',
        'main_menu'=>'fleet-drivers',
        'sub_menu'=>'fleet-driver_details',
        'sub_link'=>'fleet-drivers',
    ],
    PermissionSlug::FLEET_DRIVER_DOCUMENT_TOGGLE => [
        'name' => 'fleet-driver-document-toggle',
        'description' => 'fleet-driver-document-toggle',
        'main_menu'=>'fleet-drivers',
        'sub_menu'=>'fleet-driver_details',
        'sub_link'=>'fleet-drivers',
    ],

//Notifications
         PermissionSlug::NOTIFICATIONS => [
            'name' => 'notifications',
            'description' => 'notifications',
            'main_menu'=>'notifications',
            'main_link'=>'notifications',

        ],
        PermissionSlug::VIEW_NOTIFICATIONS => [
            'name' => 'view-notifications',
            'description' => 'view notifications',
            'main_menu'=>'notifications',
            'main_link'=>'notifications',

        ],
        PermissionSlug::SEND_PUSH => [
            'name' => 'send-push',
            'description' => 'toggle-promo',
            'main_menu'=>'notifications',
            'main_link'=>'notifications',
        ],
        PermissionSlug::DELETE_NOTIFICATIONS => [
            'name' => 'delete-notification',
            'description' => 'delete-notifications',
            'main_menu'=>'notifications',
            'main_link'=>'notifications',
        ],
/* Users */
    PermissionSlug::USER_MENU => [
        'name' => 'user-menu',
        'description' => 'View all user related menus',
        'main_menu' => 'users',
        'sub_menu' => null,
        'sort' => 5,
        'icon' => 'fa fa-user'
    ],
    PermissionSlug::VIEW_USERS => [
        'name' => 'Get-All-Users',
        'description' => 'Get all Users',
        'main_menu'=>'users',
        'sub_menu'=>'user_details',
        'sub_link'=>'users',
    ],
    PermissionSlug::ADD_USER => [
        'name' => 'add-users',
        'description' => 'add user',
        'main_menu'=>'users',
        'sub_menu'=>null,
        'sub_link'=>null,
        'main_link'=>'users',

    ],
    PermissionSlug::EDIT_USER => [
        'name' => 'edit-user',
        'description' => 'edit user',
        'main_menu'=>'users',
        'sub_menu'=>null,
        'sub_link'=>null,
        'main_link'=>'users',

    ],
    PermissionSlug::DELETE_USER => [
        'name' => 'delete-user',
        'description' => 'delete user',
        'main_menu'=>'users',
        'sub_menu'=>null,
        'sub_link'=>null,
        'main_link'=>'users',

    ],
    PermissionSlug::TOGGLE_USER => [
        'name' => 'toggle-user',
        'description' => 'toggle-user',
        'main_menu'=>'users',
        'sub_menu'=>null,
        'sub_link'=>null,
        'main_link'=>'users',
    ],
    PermissionSlug::VIEW_USER_REQUEST_LIST => [
        'name' => 'view-user-request-list',
        'description' => 'view-user-request-list',
        'main_menu'=>'users',
        'sub_menu'=>null,
        'sub_link'=>null,
        'main_link'=>'users',
    ],
    PermissionSlug::USER_PAYMENT_HISTORY => [
        'name' => 'user-payment-history',
        'description' => 'user-payment-history',
        'main_menu'=>'users',
        'sub_menu'=>null,
        'sub_link'=>null,
        'main_link'=>'users',
    ],

/* SOS */
        PermissionSlug::VIEW_SOS => [
            'name' => 'view-sos',
            'description' => 'Emergency Numbers',
            'main_menu'=>'sos',
            'sub_menu'=> null,
            'main_link'=>'sos',
            'sort' => 6,
            'icon' => 'fa fa-heartbeat'
        ],
        PermissionSlug::ADD_SOS => [
            'name' => 'add-sos',
            'description' => 'add sos',
            'main_menu'=>'sos',
            'main_link'=>'sos',

        ],
        PermissionSlug::EDIT_SOS => [
            'name' => 'edit-sos',
            'description' => 'edit sos',
            'main_menu'=>'sos',
            'main_link'=>'sos',

        ],
        PermissionSlug::DELETE_SOS => [
            'name' => 'delete-sos',
            'description' => 'delete sos',
            'main_menu'=>'sos',
            'main_link'=>'sos',

        ],
        PermissionSlug::TOGGLE_SOS => [
            'name' => 'toggle-sos',
            'description' => 'toggle-sos',
            'main_menu'=>'sos',
            'main_link'=>'sos',
        ],
    // manage-FAQ

         PermissionSlug::MANAGE_FAQ => [
            'name' => 'manage-faq',
            'description' => 'View Promo code',
            'main_menu'=>'faq',
            'sub_menu'=> null,
            'sub_link'=>null,
            'main_link'=>'faq',
            'icon' => 'fa fa-gift'
        ],
        PermissionSlug::ADD_FAQ => [
            'name' => 'add-faq',
            'description' => 'add Promo code',
            'main_menu'=>'faq',
            'sub_menu'=> null,
            'sub_link'=>null,
            'main_link'=>'faq',

        ],
        PermissionSlug::EDIT_FAQ => [
            'name' => 'edit-faq',
            'description' => 'edit faq',
            'main_menu'=>'faq',
            'sub_menu'=>null,
            'sub_link'=>null,
            'main_link'=>'faq',

        ],
        PermissionSlug::DELETE_FAQ => [
            'name' => 'delete-faq',
            'description' => 'delete faq',
            'main_menu'=>'faq',
            'sub_menu'=>null,
            'sub_link'=>null,
            'main_link'=>'faq',

        ],
        PermissionSlug::TOGGLE_FAQ => [
            'name' => 'toggle-faq',
            'description' => 'toggle-faq',
            'main_menu'=>'faq',
            'sub_menu'=>null,
            'sub_link'=>null,
            'main_link'=>'faq',
        ],
   // manage-cancellation reason

      PermissionSlug::CANCELLATION_REASON => [
            'name' => 'manage-cancellation',
            'description' => 'View Promo code',
            'main_menu'=>'cancellation',
            'sub_menu'=> null,
            'sub_link'=>null,
            'main_link'=>'cancellation',
            'icon' => 'fa fa-gift'
        ],
        PermissionSlug::ADD_CANCELLATION => [
            'name' => 'add-cancellation',
            'description' => 'add cancellation',
            'main_menu'=>'cancellation',
            'sub_menu'=> null,
            'sub_link'=>null,
            'main_link'=>'cancellation',

        ],
        PermissionSlug::EDIT_CANCELLATION => [
            'name' => 'edit-cancellation',
            'description' => 'edit cancellation',
            'main_menu'=>'cancellation',
            'sub_menu'=>null,
            'sub_link'=>null,
            'main_link'=>'cancellation',

        ],
        PermissionSlug::DELETE_CANCELLATION => [
            'name' => 'delete-cancellation',
            'description' => 'delete cancellation',
            'main_menu'=>'cancellation',
            'sub_menu'=>null,
            'sub_link'=>null,
            'main_link'=>'cancellation',

        ],
        PermissionSlug::TOGGLE_CANCELLATION => [
            'name' => 'toggle-cancellation',
            'description' => 'toggle-cancellation',
            'main_menu'=>'cancellation',
            'sub_menu'=>null,
            'sub_link'=>null,
            'main_link'=>'cancellation',
        ],
/*complaint-title*/

      PermissionSlug::COMPLAINT_TITLE => [
            'name' => 'complaint-title',
            'description' => 'View Complaint Title',
            'main_menu'=>'complaints',
            'sub_menu'=> 'complaint-title',
            'sub_link'=>'complaint/title',
            'sort' => 15.1,
            'icon' => 'fa fa-circle-thin'
        ],

      PermissionSlug::ADD_COMPLAINT_TITLE => [
            'name' => 'add-complaint-title',
            'description' => 'View Complaint Title',
            'main_menu'=>'complaints',
            'sub_menu'=> 'complaint-title',
            'sub_link'=>'complaint/title',
            'sort' => 15.1,
        ],
      PermissionSlug::EDIT_COMPLAINT_TITLE => [
            'name' => 'edit-complaint-title',
            'description' => 'View Complaint Title',
            'main_menu'=>'complaints',
            'sub_menu'=> 'complaint-title',
            'sub_link'=>'complaint/title',
            'sort' => 15.1,
        ],
      PermissionSlug::DELETE_COMPLAINT_TITLE => [
            'name' => 'delete-complaint-title',
            'description' => 'View Complaint Title',
            'main_menu'=>'complaints',
            'sub_menu'=> 'complaint-title',
            'sub_link'=>'complaint/title',
            'sort' => 15.1,
        ],
      PermissionSlug::TOGGLE_COMPLAINT_TITLE => [
            'name' => 'toggle-complaint-title',
            'description' => 'View Complaint Title',
            'main_menu'=>'complaints',
            'sub_menu'=> 'complaint-title',
            'sub_link'=>'complaint/title',
            'sort' => 15.1,
        ],
/*Reports*/

        PermissionSlug::REPORTS => [
            'name' => 'reports',
            'description' => 'View reports',
            'main_menu'=>'reports',
            'sub_menu'=> null,
            'main_link'=>'reports',
            'sort' => 16,
            'icon' => 'fa fa-file-pdf-o'
        ],
        PermissionSlug::USER_REPORT => [
            'name' => 'user-report',
            'description' => 'Download User Report',
            'main_menu'=>'reports',
            'sub_menu'=> 'user_report',
            'sub_link'=>'reports/user',
            'sort' => 16.1,
            'icon' => 'fa fa-circle-thin'
        ],
        PermissionSlug::DRIVER_REPORT => [
            'name' => 'driver-report',
            'description' => 'Download Driver Report',
            'main_menu'=>'reports',
            'sub_menu'=> 'driver_report',
            'sub_link'=>'reports/driver',
            'sort' => 16.2,
            'icon' => 'fa fa-circle-thin'
        ],
        PermissionSlug::FINANCE_REPORT => [
            'name' => 'finance-report',
            'description' => 'Download Finance Report',
            'main_menu'=>'reports',
            'sub_menu'=> 'travel_report',
            'sub_link'=>'reports/travel',
            'sort' => 16.3,
            'icon' => 'fa fa-circle-thin'
        ],
        PermissionSlug::OWNER_REPORT => [
            'name' => 'owner-report',
            'description' => 'Download Owner Report',
            'main_menu'=>'reports',
            'sub_menu'=> 'owner_report',
            'sub_link'=>'reports/owner',
            'sort' => 16.3,
            'icon' => 'fa fa-circle-thin'
        ],
        PermissionSlug::DRIVER_DUTIES_REPORT => [
            'name' => 'driver-duities-report',
            'description' => 'Download driver-duities-report',
            'main_menu'=>'reports',
            'sub_menu'=> 'driver_report',
            'sub_link'=>'reports/driver',
            'sort' => 16.2,
            'icon' => 'fa fa-circle-thin'
        ],
/*geo-fencing*/
        PermissionSlug::MANAGE_MAP => [
            'name' => 'manage-map',
            'description' => 'Manage Map',
            'main_menu'=>'map',
            'sub_menu'=> null,
            'main_link'=>'map',
            'sort' => 17,
            'icon' => 'fa fa-globe'
        ],
        PermissionSlug::HEAT_MAP => [
            'name' => 'heat-map',
            'description' => 'View Heat Map',
            'main_menu'=>'map',
            'sub_menu'=> 'heat_map',
            'sub_link'=>'map/heatmap',
            'sort' => 16.1,
            'icon' => 'fa fa-circle-thin'
        ],
          PermissionSlug::MAP_VIEW => [
            'name' => 'map-view',
            'description' => 'Map View',
            'main_menu'=>'map',
            'sub_menu'=> null,
            'main_link'=>'map',
            'sort' => 17,
            'icon' => 'fa fa-globe'
        ],
// cms
        PermissionSlug::CMS => [
            'name' => 'cms',
            'description' => 'Manage Cms',
            'main_menu'=>'cms',
            'sub_menu'=> null,
            'main_link'=>'cms',
            'sort' => 17,
            'icon' => 'fa fa-globe'
        ],

        PermissionSlug::MAP_MENU => [
            'name' => 'map',
            'description' => 'View all map related menus',
            'main_menu' => 'map',
            'sub_menu' => null,
            'sort' => 8,
            'icon' => 'fa fa-map'
        ],

        PermissionSlug::DISPATCH_REQUEST => [
            'name' => 'Dispatch-Request',
            'description' => 'Dispatch manual requests from admin panel',
            'main_menu'=>'dispatch_request',
            'sub_menu'=> null,
            'main_link'=>'dispatch',
            'sort' => 3,
            'icon' => 'fa fa-tripadvisor'
        ],
       PermissionSlug::VERIFY_PURCHASECODE => [
            'name' => 'verify_purchasecodel',
            'description' => 'verify-purchasecode',
            'main_menu' => 'verify_purchasecode',
            'sub_menu' => 'verify_purchasecode'
        ],
        PermissionSlug::MANAGE_AMENTITY => [
            'name' => 'manage_amentity',
            'description' => 'manage_amentity',
            'main_menu' => 'manage_amentity',
            'sub_menu' => 'manage_amentity'
        ],
        PermissionSlug::EDIT_AMENTITY => [
            'name' => 'edit-amentity',
            'description' => 'edit-amentity',
            'main_menu' => 'edit-amentity',
            'sub_menu' => 'edit-amentity'
        ],
        PermissionSlug::MANAGE_CITY => [
            'name' => 'manage-city',
            'description' => 'manage-city',
            'main_menu' => 'manage-city',
            'sub_menu' => 'manage-city'
        ],
        PermissionSlug::MANAGE_BOARDING_POINT => [
            'name' => 'manage-boarding-point',
            'description' => 'manage-boarding-point',
            'main_menu' => 'manage-boarding-point',
            'sub_menu' => 'manage-boarding-point'
        ],


];

    /**
     * List of all the roles to be created along with their permissions.
     *
     * @var array
     */
    protected $roles = [
        RoleSlug::SUPER_ADMIN => [
            'name' => 'Super Admin',
            'description' => 'Admin group with unrestricted access',
            'all' => true,
        ],
        RoleSlug::USER => [
            'name' => 'Normal User',
            'description' => 'Normal user with standard access',
            'permissions' => []
        ],
        RoleSlug::ADMIN => [
            'name' => 'Admin',
            'description' => 'Admin group with restricted access',
            'permissions' => [PermissionSlug::GET_ALL_ROLES, PermissionSlug::GET_ALL_PERMISSIONS,PermissionSlug::ACCESS_DASHBOARD,PermissionSlug::SETTINGS,PermissionSlug::VIEW_ZONE,PermissionSlug::MAP_MENU,PermissionSlug::VIEW_SYSTEM_SETINGS,PermissionSlug::USER_MENU,PermissionSlug::VIEW_USERS,PermissionSlug::SERVICE_LOCATION,PermissionSlug::ADMIN,PermissionSlug::DISPATCH_REQUEST,PermissionSlug::LIST_AIRPORTS,PermissionSlug::ADD_AIRPORTS,PermissionSlug::EDIT_AIRPORTS],
        ],

         RoleSlug::OWNER=>[
            'name' => 'Owner',
            'description' => 'Owner for company management',
            'permissions' => [
                 PermissionSlug::ACCESS_DASHBOARD,PermissionSlug::MANAGE_FLEET,PermissionSlug::CREATE_FLEET,PermissionSlug::EDIT_FLEET,PermissionSlug::DELETE_FLEET,PermissionSlug::FLEET_TOGGLE_STATUS,PermissionSlug::FLEET_DRIVERS_MENU,PermissionSlug::VIEW_APPROVED_FLEET_DRIVERS,PermissionSlug::FLEET_DRIVERS_WAITING_FOR_APPROVAL,PermissionSlug::EDIT_FLEET_DRIVERS,PermissionSlug::TOGGLE_FLEET_DRIVERS,PermissionSlug::UPDATE_FLEET_DRIVERS,PermissionSlug::DELETE_FLEET_DRIVERS,PermissionSlug::ADD_FLEET_DRIVERS,PermissionSlug::VIEW_FLEET_DRIVER_PROFILE,PermissionSlug::FLEET_DRIVER_DOCUMENT,PermissionSlug::FLEET_DRIVER_DOCUMENT_VIEW,PermissionSlug::FLEET_DRIVER_DOCUMENT_VIEW_IMAGE,PermissionSlug::FLEET_DRIVER_DOCUMENT_EDIT,PermissionSlug::FLEET_DRIVER_DOCUMENT_UPLOAD,PermissionSlug::FLEET_DRIVER_DOCUMENT_TOGGLE,PermissionSlug::SEAT_LAYOUT,PermissionSlug::MANAGE_SEAT_LAYOUT,PermissionSlug::CREATE_SEAT_LAYOUT,PermissionSlug::EDIT_SEAT_LAYOUT,PermissionSlug::DELETE_SEAT_LAYOUT,PermissionSlug::TOGGLE_SEAT_LAYOUT,PermissionSlug::JOURNEY,PermissionSlug::VIEW_JOURNEY ,PermissionSlug::COMPLETED_JOURNEY,PermissionSlug::CREATE_JOURNEY ,PermissionSlug::EDIT_JOURNEY,PermissionSlug::DELETE_JOURNEY,PermissionSlug::ASSIGN_DRIVER,PermissionSlug::TOGGLE_JOURNEY, PermissionSlug::VIEW_TICKETS,PermissionSlug::BOOKED_TICKETS,PermissionSlug::CANCELLED_TICKETS,PermissionSlug::VIEW_PASSENGER_LIST,PermissionSlug::MANAGE_FLEET,PermissionSlug::ADMIN,PermissionSlug::FLEET_APPROVE_STATUS,PermissionSlug::DELETE_FLEET_NEEEDED_DOC,PermissionSlug::MANAGE_AMENTITY,PermissionSlug::EDIT_AMENTITY,PermissionSlug::MANAGE_CITY,PermissionSlug::MANAGE_BOARDING_POINT
            ],
        ],
        RoleSlug::DRIVER=>[
            'name' => 'Driver',
            'description' => 'Driver user with standard access',
            'permissions' => [],
        ],

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            foreach ($this->permissions as $permissionSlug => $attributes) {
                // Create permission if it doesn't exist
                Permission::firstOrCreate(['slug' => $permissionSlug], $attributes);
            }

            foreach ($this->roles as $roleSlug => $role) {
                // Create role if it doesn't exist
                $createdRole = Role::firstOrCreate(
                    ['slug' => $roleSlug],
                    array_merge(array_except($role, ['permissions']), ['locked' => true])
                );

                // Sync permissions
                if (isset($role['permissions'])) {
                    $rolePermissions = $role['permissions'];
                    $rolePermissionIds = Permission::whereIn('slug', $rolePermissions)->pluck('id');
                    $createdRole->permissions()->sync($rolePermissionIds);
                }
            }

            /**
             * Delete all unused permissions
             */
            $existingPermissions = Permission::pluck('slug')->toArray();

            $newPermissions = array_keys($this->permissions);

            $permissionsToDelete = array_diff($existingPermissions, $newPermissions);

            Permission::whereIn('slug', $permissionsToDelete)->delete();
        });
    }
}
