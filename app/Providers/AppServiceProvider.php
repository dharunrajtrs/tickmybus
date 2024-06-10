<?php

namespace App\Providers;

use Schema;
use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Validation\Factory as Validator;
use Illuminate\Pagination\Paginator;
use App\Models\Admin\WebHeader;

class AppServiceProvider extends ServiceProvider
{

// use Braintree\Configuration as Braintree_Configuration;
    /**
     * Validator instance.
     *
     * @var \Illuminate\Contracts\Validation\Factory
     */
    protected $validator;

    /**
     * Bootstrap any application services.
     *
     * @param \Illuminate\Contracts\Validation\Factory $validator
     * @return void
     */
    public function boot(Validator $validator)
    {
        // \Braintree_Configuration::environment(env('BTREE_ENVIRONMENT'));
        // \Braintree_Configuration::merchantId(env('BTREE_MERCHANT_ID'));
        // \Braintree_Configuration::publicKey(env('BTREE_PUBLIC_KEY'));
        // \Braintree_Configuration::privateKey(env('BTREE_PRIVATE_KEY'));

        $this->validator = $validator;

        Schema::defaultStringLength(191);

        $this->loadCustomValidators();

        Paginator::useBootstrap();

        if (Schema::hasTable('web_headers')) {
            $headers = WebHeader::first();

        view()->share('headers', $headers);
        }
        else {

            view()->share(
                ['theme_color', "#03314B"],
                ['logo', "logo.png"],
                ['fevicon', "fevicon.ico"],
                ['btn_color', "#ffffff"],
                ['heading_color', "#e4af3a"],
                ['footer_bg_color', "#000000"],
                ['footer_about_title', "Company"],
                ['footer_about_para', "<p>Lorem Ipsum is simply dummy text of the had a printing and typesetting industry. Ipsum hasbeen the industrys printing and type seting the industrys printing and ting industry.</p>"],
                ['user_play_link', "https://misoftwares.in/"],
                ['user_app_link', "https://misoftwares.in/"],
                ['driver_play_link', "https://misoftwares.in/"],
                ['driver_app_link', "https://misoftwares.in/"],
                ['footer_quicklink_privacy', "https://misoftwares.in/"],
                ['footer_quicklink_terms', "https://misoftwares.in/"],
                ['footer_quicklink_contact', "https://misoftwares.in/"],
                ['footer_info_para', "<p>Lorem Ipsum is simply dummy text of the had a printing</p>"],
                ['footer_info_mobile', "+91-7871 917871"],
                ['footer_info_email', "dilip@misoftwares.com"],
                ['footer_copy_rights', "MI-Softwares"],
                
            );

    }

}

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);

            if (app_debug_enabled()) {
                $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
            }
        }
    }

    /**
     * Load the custom validator methods.
     *
     * @return void
     */
    protected function loadCustomValidators()
    {
        $customValidatorClass = 'App\Base\Validators\CustomValidators';

        $this->extendValidator('mobile_number', $customValidatorClass);
        $this->extendValidator('numeric_max', $customValidatorClass);
        $this->extendValidator('numeric_min', $customValidatorClass);
        $this->extendValidator('otp', $customValidatorClass);
        $this->extendValidator('uuid', $customValidatorClass);
        $this->extendValidator('decimal', $customValidatorClass);
        $this->extendValidator('double', $customValidatorClass);
    }

    /**
     * Extend the validator with custom methods.
     *
     * @param string $name
     * @param string $class
     * @return void
     */
    protected function extendValidator($name, $class)
    {
        $method = 'validate' . Str::studly($name);

        $this->validator->extend($name, "{$class}@{$method}");
    }

    public function header() 
{

        $headers = WebHeader::first();

     view()->share('headers', $headers);


    }

}
