<?php


namespace classes\pdf;


abstract class AbstractPdf
{

    private $externalData;
    private $post_id;
    private $code;

    /**
     * @return mixed
     */
    public function getExternalData()
    {
        return $this->externalData;
    }


    /**
     * @param mixed $externalData
     */
    public function setExternalData($externalData)
    {
        $this->externalData = $externalData;
    }

    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * @param mixed $post_id
     */
    public function setPostId($post_id)
    {
        $this->post_id = $post_id;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code)
    {
        $this->code = $code;
    }

    public function __construct()
    {
         $this->code = wpm_get_language();
    }

    protected function createPractices($post_ID)
    {
        $practiceHTML = '';
        if (function_exists('get_field'))
            $practises = get_field('people_practices', $post_ID);
        if(!empty($practises)){
            foreach ($practises as $practice) {
                $practiceHTML .= '<li><a href="#">'.wpm_translate_string($practice->post_title).'</a></li>';
            }
        }
        return $practiceHTML;
    }

    protected function createPhones($contacts)
    {
        $phones = '';
        if(isset($contacts['phones'])){
            foreach ($contacts['phones'] as $item) {
                $phones .= '<span class="lawyer-ab__links">';
                $phones .= '<span>';
                $phones .= $item['phone'];
                $phones .= '</span>';
                $phones .= '</span>';
            }
        }
        return $phones;
    }


    protected function createSectors($post_ID)
    {
        $sectorHTML = '';
        if (function_exists('get_field'))
            $sectors = get_field('people_sectors', $post_ID);
        if(!empty($sectors)){
            foreach ($sectors as $sector) {
                $sectorHTML .= '<li><a href="#">'.wpm_translate_string($sector->post_title).'</a></li>';
            }
        }
        return $sectorHTML;
    }
    protected function createDescription($post_ID)
    {
        $descrHTML = [];
        if (function_exists('get_field'))
            $descr = get_field('description', $post_ID);
        if(!empty($descr)){
            foreach ($descr as $item) {
                array_push($descrHTML, wpm_translate_string($item['item']) );
            }
        }
        return implode(', ', $descrHTML);
    }

    protected function createRecognitions($post_ID)
    {
        $recognitionsHTML = '';
        if (function_exists('get_field'))
            $recognitions = get_field('recognitions', $post_ID);
        if(!empty($recognitions)){
            foreach ($recognitions as $recognition) {
                $recognitionsHTML .= '<p>'.wpm_translate_string($recognition['recognitions']['title']) .' - '.wpm_translate_string($recognition['recognitions']['description']).' </p>';
            }
        }
        return $recognitionsHTML;
    }

    abstract protected function getData();
}