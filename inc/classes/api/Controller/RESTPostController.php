<?php


namespace classes\api\Controller;

use WP_Error;
use WP_Post;
use WP_REST_Controller;
use WP_REST_Request;
use WP_REST_Response;

class RESTPostController extends WP_REST_Controller
{
    public function __construct()
    {
        $this->namespace = 'api/v1';
        $this->rest_base = 'posts';
    }

    public function register_routes()
    {

        register_rest_route($this->namespace, "/$this->rest_base/(?P<id>[\w]+)", [
            [
                'methods' => 'GET',
                'callback' => [$this, 'get_items'],
            ],
            'schema' => [$this, 'get_item_schema'],
        ]);

    }

    /**
     * @param WP_REST_Request $request
     *
     * @return array|WP_Error|WP_REST_Response
     */
    public function get_items($request)
    {
        $data = [];
        $args = [
            'numberposts' => 10,
            'category' => $request['id'],
            'post_type' => 'post',
            'post_status' => 'publish',
            'orderby' => 'date',
        ];
        $posts = get_posts($args);

        if (empty($posts)) {
            return $data;
        }

        foreach ($posts as $post) {
            $response = $this->prepare_item_for_response($post, $request);
            $data[] = $this->prepare_response_for_collection($response);
        }
        return $data;
    }

    /**
     * @param WP_Post            $post
     * @param WP_REST_Request $request
     *
     * @return array|WP_Error|WP_REST_Response
     */
    function prepare_item_for_response($post, $request)
    {
        $post_data = [];

        $schema = $this->get_item_schema();
        $properties = $schema['properties'];
        if (!empty($properties['name'])) {
            $post_data['name'] = wpm_translate_string($post->post_title, 'ua');
        }

        if (!empty($properties['image'])) {
            $post_data['image'] = get_the_post_thumbnail_url( $post->ID, 'post' );
        }

        if (!empty($properties['date'])) {
            setlocale(LC_TIME, ['uk_UA','uk_UA.utf8']);
            $date = strftime('%d %B %G', strtotime($post->post_date));
            $post_data['date'] = $this->format_string($date);
        }

        if (!empty($properties['url'])) {
            $post_data['url'] = get_permalink($post->ID);
        }

        return $post_data;
    }

    /**
     * @param WP_REST_Response $response
     *
     * @return array|mixed|WP_REST_Response
     */
    function prepare_response_for_collection($response)
    {

        if (!($response instanceof WP_REST_Response)) {
            return $response;
        }

        $data = (array)$response->get_data();
        $server = rest_get_server();

        if (method_exists($server, 'get_compact_response_links')) {
            $links = call_user_func([$server, 'get_compact_response_links'], $response);
        } else {
            $links = call_user_func([$server, 'get_response_links'], $response);
        }

        if (!empty($links)) {
            $data['_links'] = $links;
        }

        return $data;
    }


    /**
     * @return array
     */
    function get_item_schema()
    {
        return [
            '$schema' => 'http://json-schema.org/draft-04/schema#',
            'title' => 'Publication',
            'type' => 'object',
            'properties' => [
                'name' => [
                    'description' => 'Publication\'s name',
                    'type' => 'string',
                    'context' => ['view'],
                    'readonly' => true,
                ],
                'image' => [
                    'description' => 'Publication\'s image',
                    'type' => 'string',
                    'context' => ['view'],
                    'readonly' => true,
                ],
                'date' => [
                    'description' => 'Publication\'s date',
                    'type' => 'string',
                    'context' => ['view'],
                    'readonly' => true,
                ],
                'url' => [
                    'description' => 'Publication\'s url',
                    'type' => 'string',
                    'context' => ['view'],
                    'readonly' => true,
                ]
            ],
        ];

    }

    private function mb_ucfirst($string, $encoding = "utf8")
    {
        $strlen = mb_strlen($string, $encoding);
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, $strlen - 1, $encoding);
        return mb_strtoupper($firstChar, $encoding) . $then;
    }

    private function format_string(string $string){
        $splited = explode(' ', $string);
        $splited[1] = $this->mb_ucfirst($splited[1]);
        return join(" ", $splited);
    }


}