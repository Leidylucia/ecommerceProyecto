
<?php
use Illuminate\Support\Facades\Storage;
use App\BusinessSetting;
use App\Upload;

if (! function_exists('static_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function static_asset($path, $secure = null)
    {
        return app('url')->asset($path, $secure);
    }

    if (!function_exists('isAdmin')) {
        function isAdmin()
        {
            if (Auth::check() && (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff')) {
                return true;
            }
            return false;
        }
    }
    if (! function_exists('areActiveRoutes')) {
        function areActiveRoutes(Array $routes, $output = "active")
        {
            foreach ($routes as $route) {
                if (Route::currentRouteName() == $route) return $output;
            }
    
        }
    }
}

