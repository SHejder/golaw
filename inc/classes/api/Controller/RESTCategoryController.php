<?php


namespace classes\api\Controller;

use WP_REST_Controller;
use WP_REST_Response;

class RESTCategoryController extends WP_REST_Controller
{
    public function __construct()
    {
        $this->namespace = 'api/v1';
        $this->rest_base = 'categories';
    }

    public function register_routes()
    {

        register_rest_route($this->namespace, "/$this->rest_base", [
            [
                'methods' => 'GET',
                'callback' => [$this, 'get_items'],
            ],
            'schema' => [$this, 'get_item_schema'],
        ]);

    }

    public function get_items($request): array
    {
        $data = [];
        $categories = get_categories();

        if (empty($categories)) {
            return $data;
        }

        foreach ($categories as $category){
            $response = $this->prepare_item_for_response( $category, $request );
            $data[] = $this->prepare_response_for_collection( $response );
        }
        return $data;
    }

    function prepare_item_for_response($category, $request)
    {
        $category_data = [];

        $schema = $this->get_item_schema();
        $properties = $schema['properties'];
        if(!empty($properties['id'])){
            $category_data['id'] = (int)$category->term_id;
        }

        if(!empty($properties['title'])){
            $category_data['title'] = wpm_translate_string($category->name, 'UA');
        }

        return $category_data;
    }

    function prepare_response_for_collection( $response ){

        if ( ! ( $response instanceof WP_REST_Response ) ){
            return $response;
        }

        $data = (array) $response->get_data();
        $server = rest_get_server();

        if ( method_exists( $server, 'get_compact_response_links' ) ){
            $links = call_user_func( [ $server, 'get_compact_response_links' ], $response );
        }
        else {
            $links = call_user_func( [ $server, 'get_response_links' ], $response );
        }

        if ( ! empty( $links ) ){
            $data['_links'] = $links;
        }

        return $data;
    }

    function get_item_schema()
    {
        return [
            '$schema' => 'http://json-schema.org/draft-04/schema#',
            'title' => 'category',
            'type' => 'object',
            'properties' => [
                'id' => [
                    'description' => 'Unique identifier for the object.',
                    'type' => 'integer',
                    'context' => ['view'],
                    'readonly' => true,
                ],
                'title' => [
                    'description' => 'Title of category',
                    'type' => 'string',
                ],
            ],
        ];

    }

}