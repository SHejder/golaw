<?php


namespace classes\pdf;


class ServicePdf extends ArticlePdf implements Strategy
{

    protected function getData()
    {
        $people = get_field('expertise_head', $this->getPostId());
        $i = 0;
        foreach ((array)$people as $item) {
            $data['name_' . $i] = get_the_title($item);
            $data['photo_' . $i] = wp_get_attachment_image_src(get_post_thumbnail_id($item));
            $data['description_' . $i] = $this->createDescription($item);
            $data['recognitions_' . $i] = $this->createRecognitions($item);
            $i++;
        }
        $data['people_count'] = $i - 1;
        $data['intro'] = wpm_translate_string(get_field('expertise_intro', $this->getPostId()));
        $data['cases'] = $this->createCases($this->getPostId());
        $this->setExternalData($data);
    }

    private function createCases($post_id)
    {
        $casesHTML = '';
        $cases = get_field('expertise_cases', $post_id);
        if (!empty($cases)) {
            foreach ($cases as $case) {
                $casesHTML .= '<h3>' . wpm_translate_string($case['case_title']) . '</h3>' .
                    '<p>' . wpm_translate_string($case['text']) . ' </p>';
            }
        }
        return $casesHTML;

    }

}