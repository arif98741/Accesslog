<?php
/*
 *  Last Modified: 6/28/21, 11:18 PM
 *  Copyright (c) 2021
 *  -created by Ariful Islam
 *  -All Rights Preserved By
 *  -If you have any query then knock me at
 *  arif98741@gmail.com
 *  See my profile @ https://github.com/arif98741
 */

namespace Xenon\AccessLog;

use Illuminate\Support\ServiceProvider;
use Xenon\AccessLog\Log\Log;

class XenonAccessLogProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     * @version v1.0.32
     * @since v1.0.31
     */
    public function register()
    {
        $this->app->bind('LaravelBDSms', function () {
            config('xenon-activity.type');

        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     * @version v1.0.32
     * @since v1.0.31
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/Config/xenon-activity.php' => config_path('xenon-activity.php'),
        ]);

        if ($this->app->runningInConsole() && !class_exists('CreateLaravelbdSmsTable')) {

            $this->publishes([
               // __DIR__ . '/Database/Migrations/create_laravelbd_sms_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_laravelbd_sms_table.php'),

            ], 'migrations');
        }
    }

}
