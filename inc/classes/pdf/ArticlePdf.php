<?php


namespace classes\pdf;


class ArticlePdf extends AbstractPdf implements Strategy
{

    public function getHTML(\WP_Post $post)
    {
        $this->setPostId($post->ID);
        $this->getData();
        $content  = preg_replace('#\[.*\]#', '', wpm_translate_string($post->post_content));
        $title = wpm_translate_string($post->post_title);
        ob_start();
        require_once 'templates/article.php';
        return $html = ob_get_clean();
    }

    public function getDesc()
    {
        return \Mpdf\Output\Destination::DOWNLOAD;
    }

    public function getFilename()
    {
        return wpm_translate_string(get_the_title($this->getPostId())).'-'.$this->getCode().'.pdf';
    }

    protected function getData()
    {
        $data = [
            'category' => get_the_category($this->getPostId()),
            'date' => get_the_date('d F Y', $this->getPostId()),
        ];
        $is_event = $data['category'][0]->term_id === 6;
        $lawyer = $is_event ? 'event_speakers': 'authors';
        $data['is_event'] = $is_event? : false;
        $people = get_field($lawyer, $this->getPostId());
        if(!is_array($people)) $people = (array)$people;
        $i = 0;
        foreach ($people as $item){
            $data['name_'.$i] = get_the_title($item);
            $data['photo_'.$i] = wp_get_attachment_image_src(get_post_thumbnail_id($item));
            $data['description_'.$i] = $this->createDescription($item);
            if(!$is_event) $data['recognitions_'.$i] = $this->createRecognitions($item);
            $i++;
        }
        $data['people_count'] = $i-1;
        if($is_event){
            $data['location'] = get_field('event_location', $this->getPostId());
            $data['event_date'] = get_field('event_date', $this->getPostId());
            $data['event_start'] = get_field('event_start_time', $this->getPostId());
            $data['event-end'] = get_field('event_end_time', $this->getPostId());
        }


        $this->setExternalData($data);
    }

    protected function createRecognitions($post_ID)
    {
        $recognitionsHTML = '';
        $recognitions = get_field('recognitions', $post_ID);
        foreach ($recognitions as $recognition) {
            $recognitionsHTML .= '<p>'.wpm_translate_string($recognition['recognitions']['title']) .'</p>';
        }
        return $recognitionsHTML;
    }

}