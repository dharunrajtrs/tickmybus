<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use App\Base\Constants\Setting\Settings as SettingSlug;
use App\Base\Constants\Setting\SettingCategory;
use App\Base\Constants\Setting\SettingSubGroup;
use App\Base\Constants\Setting\SettingValueType;

class SettingsSeeder extends Seeder
{
    /**
     * List of all the settings_from_seeder to be created along with their details.
     *
     * @var array
     */
    protected $settings_from_seeder = [

        SettingSlug::SERVICE_TAX => [
            'category'=>SettingCategory::TRIP_SETTINGS,
            'value' => 30,
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
        SettingSlug::ADMIN_COMMISSION_TYPE => [
            'category'=>SettingCategory::TRIP_SETTINGS,
            'value' => 1,
            'field' => SettingValueType::SELECT,
            'option_value' => '{"percentage":1,"fixed":2}',
            'group_name' => null,
        ],
            SettingSlug::ADMIN_COMMISSION => [
            'category'=>SettingCategory::TRIP_SETTINGS,
            'value' => 30,
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
        SettingSlug::MINIMUM_WALLET_AMOUNT_FOR_TRANSFER => [
            'category'=>SettingCategory::WALLET,
            'value' => 500,
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
        SettingSlug::ADMIN_COMMISSION_TYPE_FOR_BUS_COMPANY => [
            'category'=>SettingCategory::TRIP_SETTINGS,
            'value' => 1,
            'field' => SettingValueType::SELECT,
            'option_value' => '{"percentage":1,"fixed":2}',
            'group_name' => null,
        ],
            SettingSlug::ADMIN_COMMISSION_FOR_BUS_COMPANY => [
            'category'=>SettingCategory::TRIP_SETTINGS,
            'value' => 30,
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
    //General category settings
        SettingSlug::LOGO => [
            'category'=>SettingCategory::GENERAL,
            'value' => null,
            'field' => SettingValueType::FILE,
            'option_value' => null,
            'group_name' => null,
        ],
        SettingSlug::FAVICON => [
            'category'=>SettingCategory::GENERAL,
            'value' => null,
            'field' => SettingValueType::FILE,
            'option_value' => null,
            'group_name' => null,
        ],
        SettingSlug::APP_NAME => [
            'category'=>SettingCategory::GENERAL,
            'value' => 'TRS',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
        SettingSlug::CURRENCY => [
            'category'=>SettingCategory::GENERAL,
            'value' => 'INR',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
        SettingSlug::CURRENCY_SYMBOL => [
            'category'=>SettingCategory::GENERAL,
            'value' => '₹',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
        SettingSlug::DEFAULT_COUNTRY_CODE_FOR_MOBILE_APP => [
            'category'=>SettingCategory::GENERAL,
            'value' => 'IN',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
        SettingSlug::CONTACT_US_MOBILE1 => [
            'category'=>SettingCategory::GENERAL,
            'value' => '0000000000',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
        SettingSlug::CONTACT_US_MOBILE2 => [
            'category'=>SettingCategory::GENERAL,
            'value' => '0000000000',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
        SettingSlug::CONTACT_US_LINK => [
            'category'=>SettingCategory::GENERAL,
            'value' => '',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
        // Installation settings

           SettingSlug::ENABLE_STRIPE => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => '1',
            'field' => SettingValueType::SELECT,
            'option_value' => '{"yes":1,"no":0}',
            'group_name' => SettingSubGroup::STRIPE_SETTINGS,
        ],

         SettingSlug::STRIPE_ENVIRONMENT => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'test',
            'field' => SettingValueType::TEXT,
             'option_value' => '{"test":"test","production":"production"}',
            'group_name' => SettingSubGroup::STRIPE_SETTINGS,
        ],

         SettingSlug::STRIPE_TEST_PUBLISHABLE_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'pk_test_51IuYWUSBCHfacuRqacrdy8IOlL3uUPq1XI0BZaRlqDPPcNsmywe6rSqjpM9HhVmELhXWhx95CH1pvNyQ8pvQEil900eGE0jXN8',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::STRIPE_SETTINGS,
        ],

        SettingSlug::STRIPE_LIVE_PUBLISHABLE_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'pk_test_51IuYWUSBCHfacuRqacrdy8IOlL3uUPq1XI0BZaRlqDPPcNsmywe6rSqjpM9HhVmELhXWhx95CH1pvNyQ8pvQEil900eGE0jXN8',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::STRIPE_SETTINGS,
        ],

        SettingSlug::STRIPE_TEST_SECRET_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'sk_test_51IuYWUSBCHfacuRqT79sG9pzvqyQqpwClyvlcrEm4ZvshYDdS5TGkYfIS2uYbcxcwhNES1J2cI03l8zxFPelK0yk007d8XvEAd',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::STRIPE_SETTINGS,
        ],

        SettingSlug::STRIPE_LIVE_SECRET_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'sk_test_51IuYWUSBCHfacuRqT79sG9pzvqyQqpwClyvlcrEm4ZvshYDdS5TGkYfIS2uYbcxcwhNES1J2cI03l8zxFPelK0yk007d8XvEAd',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::STRIPE_SETTINGS,
        ],

        SettingSlug::ENABLE_PAYSTACK => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => '1',
            'field' => SettingValueType::SELECT,
            'option_value' => '{"yes":1,"no":0}',
            'group_name' => SettingSubGroup::PAYSTACK_SETTINGS,
        ],
        SettingSlug::PAYSTACK_ENVIRONMENT => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'test',
            'field' => SettingValueType::TEXT,
             'option_value' => '{"test":"test","production":"production"}',
            'group_name' => SettingSubGroup::PAYSTACK_SETTINGS,
        ],
        SettingSlug::PAYSTACK_TEST_SECRET_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'sk_test_afe3ea4a86db618f26157dcbb69aa4998db4cb99',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::PAYSTACK_SETTINGS,
        ],
        SettingSlug::PAYSTACK_PRODUCTION_SECRET_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'sk_test_afe3ea4a86db618f26157dcbb69aa4998db4cb99',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::PAYSTACK_SETTINGS,
        ],

        SettingSlug::PAYSTACK_TEST_PUBLISHABLE_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'pk_test_b4cb479fa0d654cb6db52663b27a019973ecfaf5',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::PAYSTACK_SETTINGS,
        ],
        SettingSlug::PAYSTACK_PRODUCTION_PUBLISHABLE_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'pk_test_b4cb479fa0d654cb6db52663b27a019973ecfaf5',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::PAYSTACK_SETTINGS,
        ],
       SettingSlug::ENABLE_FLUTTER_WAVE => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => '1',
            'field' => SettingValueType::SELECT,
            'option_value' => '{"yes":1,"no":0}',
            'group_name' => SettingSubGroup::FLUTTERWAVE_SETTINGS,
        ],
         SettingSlug::FLUTTER_WAVE_ENVIRONMENT => [
            'category'=>SettingCategory::INSTALLATION,
            'field' => SettingValueType::SELECT,
            'option_value' => '{"test":"test","production":"production"}',
            'group_name' => SettingSubGroup::FLUTTERWAVE_SETTINGS,
        ],
        SettingSlug::FLUTTER_WAVE_TEST_SECRET_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'your-key',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::FLUTTERWAVE_SETTINGS,
        ],
        SettingSlug::FLUTTER_WAVE_PRODUCTION_SECRET_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'your-key',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::FLUTTERWAVE_SETTINGS,
        ],

        SettingSlug::ENABLE_CASH_FREE => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => '1',
            'field' => SettingValueType::SELECT,
            'option_value' => '{"yes":1,"no":0}',
            'group_name' => SettingSubGroup::CASH_FREE_SETTINGS,
        ],
        SettingSlug::CASH_FREE_ENVIRONMENT => [
            'category'=>SettingCategory::INSTALLATION,
            'field' => SettingValueType::SELECT,
            'option_value' => '{"test":"test","production":"production"}',
            'group_name' => SettingSubGroup::CASH_FREE_SETTINGS,
        ],
        SettingSlug::CASH_FREE_TEST_APP_ID => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'your-app-id',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::CASH_FREE_SETTINGS,
        ],
        SettingSlug::CASH_FREE_PRODUCTION_APP_ID => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'your-app-id',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::CASH_FREE_SETTINGS,
        ],
            SettingSlug::CASH_FREE_SECRET_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'your-key',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::CASH_FREE_SETTINGS,
        ],
        SettingSlug::CASH_FREE_PRODUCTION_SECRET_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'your-key',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::CASH_FREE_SETTINGS,
        ],
//Razor_pay
        SettingSlug::ENABLE_RAZOR_PAY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => '1',
            'field' => SettingValueType::SELECT,
            'option_value' => '{"yes":1,"no":0}',
            'group_name' => SettingSubGroup::RAZOR_PAY_SETTINGS,
        ],

         SettingSlug::RAZOR_PAY_ENVIRONMENT => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'test',
            'field' => SettingValueType::SELECT,
            'option_value' => '{"test":"test","production":"production"}',
            'group_name' => SettingSubGroup::RAZOR_PAY_SETTINGS,
        ],

        SettingSlug::RAZOR_PAY_TEST_API_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'rzp_test_b444CSYRGAtdnV',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::RAZOR_PAY_SETTINGS,
        ],
        SettingSlug::RAZOR_PAY_LIVE_API_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => '',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::RAZOR_PAY_SETTINGS,
        ],
        SettingSlug::RAZOR_PAY_LIVE_SECRECT_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => ' ',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::RAZOR_PAY_SETTINGS,
        ],
        SettingSlug::RAZOR_PAY_TEST_SECRECT_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'Q8ABpY18WPsyJ8LGvqGZR70l',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::RAZOR_PAY_SETTINGS,
        ],
/*khalti*/
        SettingSlug::ENABLE_KHALTI_PAY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => '1',
            'field' => SettingValueType::SELECT,
            'option_value' => '{"yes":1,"no":0}',
            'group_name' => SettingSubGroup::KHALTI_PAY_SETTINGS,
        ],
        SettingSlug::KHALTI_PAY_ENVIRONMENT => [
            'category'=>SettingCategory::INSTALLATION,
            'field' => SettingValueType::SELECT,
            'option_value' => '{"test":"test","production":"production"}',
            'group_name' => SettingSubGroup::KHALTI_PAY_SETTINGS,
        ],
        SettingSlug::KHALTI_PAY_TEST_API_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'test_public_key_5066528dae744acb967edfae71959934',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::KHALTI_PAY_SETTINGS,
        ],
        SettingSlug::KHALTI_PAY_LIVE_API_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'test_public_key_5066528dae744acb967edfae71959934',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::KHALTI_PAY_SETTINGS,
        ],
/*mercadopago*/
        SettingSlug::ENABLE_MERCADOPAGO => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => '1',
            'field' => SettingValueType::SELECT,
            'option_value' => '{"yes":1,"no":0}',
            'group_name' => SettingSubGroup::MERCADOPAGO_SETTINGS,
        ],

         SettingSlug::MERCADOPAGO_ENVIRONMENT => [
            'category'=>SettingCategory::INSTALLATION,
            'field' => SettingValueType::SELECT,
            'option_value' => '{"test":"test","production":"production"}',
            'group_name' => SettingSubGroup::MERCADOPAGO_SETTINGS,
        ],

        SettingSlug::MERCADOPAGO_TEST_PUBLIC_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'TEST-921f2a24-d29d-4af3-9ec8-3a366275cec8',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::MERCADOPAGO_SETTINGS,
        ],
        SettingSlug::MERCADOPAGO_LIVE_PUBLIC_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'TEST-921f2a24-d29d-4af3-9ec8-3a366275cec8',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::MERCADOPAGO_SETTINGS,
        ],

        SettingSlug::MERCADOPAGO_TEST_ACCESS_TOKEN => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'TEST-8770681523175761-021622-3db3401292f6ae1a11daed3a22b8db62-762016080',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::MERCADOPAGO_SETTINGS,
        ],
        SettingSlug::MERCADOPAGO_LIVE_ACCESS_TOKEN => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'TEST-8770681523175761-021622-3db3401292f6ae1a11daed3a22b8db62-762016080',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::MERCADOPAGO_SETTINGS,
        ],
/**/
 // stripe
        SettingSlug::ENABLE_STRIPE => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => '1',
            'field' => SettingValueType::SELECT,
            'option_value' => '{"yes":1,"no":0}',
            'group_name' => SettingSubGroup::STRIPE_SETTINGS,
        ],

         SettingSlug::STRIPE_ENVIRONMENT => [
            'category'=>SettingCategory::INSTALLATION,
            'field' => SettingValueType::SELECT,
            'value' => 'test',
             'option_value' => '{"test":"test","production":"production"}',
            'group_name' => SettingSubGroup::STRIPE_SETTINGS,
        ],

         SettingSlug::STRIPE_TEST_PUBLISHABLE_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'your-key',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::STRIPE_SETTINGS,
        ],

        SettingSlug::STRIPE_LIVE_PUBLISHABLE_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'your-key',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::STRIPE_SETTINGS,
        ],

        SettingSlug::STRIPE_TEST_SECRET_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'pk_test_51IuYWUSBCHfacuRqacrdy8IOlL3uUPq1XI0BZaRlqDPPcNsmywe6rSqjpM9HhVmELhXWhx95CH1pvNyQ8pvQEil900eGE0jXN8',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::STRIPE_SETTINGS,
        ],

        SettingSlug::STRIPE_LIVE_SECRET_KEY => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'your-key',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::STRIPE_SETTINGS,
        ],
 //paypal
        SettingSlug::ENABLE_PAYPAL => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => '1',
            'field' => SettingValueType::SELECT,
            'option_value' => '{"yes":1,"no":0}',
            'group_name' => SettingSubGroup::PAYPAL_SETTINGS,
        ],

         SettingSlug::PAYPAL_MODE => [
            'category'=>SettingCategory::INSTALLATION,
            'field' => SettingValueType::SELECT,
            'value' => 'sandbox',
             'option_value' => '{"sandbox":"sandbox","live":"live"}',
            'group_name' => SettingSubGroup::PAYPAL_SETTINGS,
        ],

         SettingSlug::PAYPAL_SANDBOX_CLIENT_ID => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'AfcLuPxX21U1JJVRgUO1qRAblJfzMheGzXJRgVZLbpVIpI8WfT8kwD1AIOn-6moi5XQJRY-w3SrmAFFk',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::PAYPAL_SETTINGS,
        ],

        SettingSlug::PAYPAL_SANDBOX_CLIENT_SECRECT => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'ELF9g1BW4zWwkOPMqxSPA6zN8hvnCD9WgoOv3BPJUVT1tyC70TCZWKZS-5sdI8-ah3BvdiqDyuAvz2Yh',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::PAYPAL_SETTINGS,
        ],

        SettingSlug::PAYPAL_SANDBOX_APP_ID => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'APP-80W284485P519543T',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::PAYPAL_SETTINGS,
        ],
         SettingSlug::PAYPAL_LIVE_CLIENT_ID => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'your-key',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::PAYPAL_SETTINGS,
        ],

        SettingSlug::PAYPAL_LIVE_CLIENT_SECRECT => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'your-key',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::PAYPAL_SETTINGS,
        ],

        SettingSlug::PAYPAL_LIVE_APP_ID => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'your-key',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::PAYPAL_SETTINGS,
        ],
        SettingSlug::PAYPAL_NOTIFY_URL => [
            'category'=>SettingCategory::INSTALLATION,
            'value' => 'your-key',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => SettingSubGroup::PAYPAL_SETTINGS,
        ],
        SettingSlug::GOOGLE_MAP_KEY => [
            'category'=>SettingCategory::MAP_SETTINGS,
            'value' => 'AIzaSyB4KttZBNVcz6Q52gaIgKK8-3h2Qk8RA3Y',
            'field' => SettingValueType::PASSWORD,
            'option_value' => null,
            'group_name' => null,
        ],
        SettingSlug::GOOGLE_MAP_KEY_FOR_DISTANCE_MATRIX => [
            'category'=>SettingCategory::MAP_SETTINGS,
            'value' => 'AIzaSyAIQLZO80x1G6N_Sh05YmtCgQI9YGU4vFc',
            'field' => SettingValueType::PASSWORD,
            'option_value' => null,
            'group_name' => null,
        ],
        SettingSlug::GOOGLE_SHEET_ID => [
            'category'=>SettingCategory::MAP_SETTINGS,
            'value' => '1ZVV9fbxS9StoEhcEeB-_fTk6zpgfUgpDgeazPYy5SDM',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
        SettingSlug::DEFAULT_LAT => [
            'category'=>SettingCategory::MAP_SETTINGS,
            'value' => 11.21215,
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
        SettingSlug::DEFAULT_LONG => [
            'category'=>SettingCategory::MAP_SETTINGS,
            'value' => 76.54545,
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
         SettingSlug::FIREBASE_DB_URL => [
            'category'=>SettingCategory::FIREBASE_SETTINGS,
            'value' => 'https://your-db.firebaseio.com',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
         SettingSlug::FIREBASE_API_KEY => [
            'category'=>SettingCategory::FIREBASE_SETTINGS,
            'value' => 'your-api-key',
            'field' => SettingValueType::PASSWORD,
            'option_value' => null,
            'group_name' => null,
        ],
           SettingSlug::FIREBASE_AUTH_DOMAIN => [
            'category'=>SettingCategory::FIREBASE_SETTINGS,
            'value' => 'your-auth-domain',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
         SettingSlug::FIREBASE_PROJECT_ID => [
            'category'=>SettingCategory::FIREBASE_SETTINGS,
            'value' => 'your-firebase-project-id',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
         SettingSlug::FIREBASE_STORAGE_BUCKET => [
            'category'=>SettingCategory::FIREBASE_SETTINGS,
            'value' => 'your-firebase-storage-bucket',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
        SettingSlug::FIREBASE_MESSAGIN_SENDER_ID => [
            'category'=>SettingCategory::FIREBASE_SETTINGS,
            'value' => 'your-firebase-messaging-sender-id',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
        SettingSlug::FIREBASE_APP_ID => [
            'category'=>SettingCategory::FIREBASE_SETTINGS,
            'value' => 'your-app-id',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
         SettingSlug::FIREBASE_MEASUREMENT_ID => [
            'category'=>SettingCategory::FIREBASE_SETTINGS,
            'value' => 'your-firebase-measurement-id',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
         SettingSlug::CURRENCY => [
            'category'=>SettingCategory::GENERAL,
            'value' => 'INR',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
        SettingSlug::CURRENCY_SYMBOL => [
            'category'=>SettingCategory::GENERAL,
            'value' => '₹',
            'field' => SettingValueType::TEXT,
            'option_value' => null,
            'group_name' => null,
        ],
        SettingSlug::MAXIMUM_NUMBER_OF_SEATS_USER_CAN_BOOK => [
            'category'=>SettingCategory::GENERAL,
            'value' => '5',
            'field' => SettingValueType::TEXT,
            'group_name' => null,
        ],
        SettingSlug::AMOUNT_REFUND_IN_X_DAYS => [
            'category'=>SettingCategory::GENERAL,
            'value' => '1',
            'field' => SettingValueType::TEXT,
            'group_name' => null,
        ],

        SettingSlug::ENABLE_COUNTRY_RESTRICT_ON_MAP => [
            'category'=>SettingCategory::GENERAL,
            'value' => '0',
            'field' => SettingValueType::SELECT,
            'option_value' => '{"yes":1,"no":0}',
            'group_name' => null,
        ],


    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settingDB = Setting::all();

        foreach ($this->settings_from_seeder as $setting_slug=>$setting) {
            $categoryFound = $settingDB->first(function ($one) use ($setting_slug) {
                return $one->name === $setting_slug;
            });

            $created_params = [
                        'name' => $setting_slug
                    ];

            $to_create_setting_data = array_merge($created_params, $setting);

            if (!$categoryFound) {
                Setting::create($to_create_setting_data);
            }
        }
    }
}
