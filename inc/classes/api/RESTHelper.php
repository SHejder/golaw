<?php


namespace classes\api;

use classes\api\Controller\RESTPostController, classes\api\Controller\RESTCategoryController;
use WP_Error;
use WP_REST_Controller;

class RESTHelper
{
    static function register_controllers(array $controllers)
    {
        foreach ($controllers as $controller) {
            if ($controller instanceof WP_REST_Controller) {
                $controller->register_routes();
            } else {
                return new WP_Error(
                    'invalid-class',
                    sprintf(__("Class '%s' not instance of WP_REST_Controller"), get_class($controller)),
                    array('status' => 405)
                );
            }
        }
    }

}