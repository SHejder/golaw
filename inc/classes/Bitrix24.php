<?php


namespace classes;


class Bitrix24
{
    private $base;
    private $user_id;
    private $token;
    private $queryUrl;
    private $queryData;

    function __construct($base, $user_id, $token)
    {
        $this->base = 'https://' . $base;
        $this->user_id = $user_id;
        $this->token = $token;
    }

    public function setMethod(string $method = 'lead.add')
    {
        $this->queryUrl = $this->base . '/rest/' . $this->user_id . '/' . $this->token . '/crm.' . $method . '.json';
    }

    public function setQueryData(array $data)
    {
        $fields = array(
            'TITLE' => 'Request from web-site',
            'NAME' => $data['name'],
            'STATUS_ID' => 'NEW',
            'OPENED' => 'Y',
            'PHONE' => array(array("VALUE" => isset($data['phone'])?$data['phone']:'', "VALUE_TYPE" => "WORK")),
            'EMAIL' => array(array("VALUE" => isset($data['email'])?$data['email']:'', "VALUE_TYPE" => "WORK")),
            'COMMENTS' => $data['message'],
        );
        if (isset($data['utm_source'])) $fields['UTM_SOURCE'] = $data['utm_source'];
        if (isset($data['utm_campaign'])) $fields['UTM_CAMPAIGN'] = $data['utm_campaign'];
        if (isset($data['utm_medium'])) $fields['UTM_MEDIUM'] = $data['utm_medium'];
        if (isset($data['utm_content'])) $fields['UTM_CONTENT'] = $data['utm_content'];
        if (isset($data['utm_term'])) $fields['UTM_TERM'] = $data['utm_term'];
        if ($data['types']) {
            foreach ($data['types'] as $type) {
                switch ($type) {
                    case 'all':
                        $fields['UF_CRM_1565854668'] = 'Y';
                        break;
                    case 'news':
                        $fields['UF_CRM_1565854706'] = 'Y';
                        break;
                    case 'tax':
                        $fields['UF_CRM_1567063232'] = 'Y';
                        break;
                    case 'hotline':
                        $fields['UF_CRM_1567063258'] = 'Y';
                        break;
                    case 'energy':
                        $fields['UF_CRM_1567063284'] = 'Y';
                        break;
                    case 'claims':
                        $fields['UF_CRM_1567063322'] = 'Y';
                        break;

                }
            }
        };
        $this->queryData = http_build_query(array(
            'fields' => $fields
        ));
    }

    public function executeREST()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->queryUrl,
            CURLOPT_POSTFIELDS => $this->queryData,
        ));

        $result = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($result, 1);
        if (array_key_exists('error', $result)) echo "Ошибка при сохранении лида: " .
            $result['error_description'] . "";

    }
}