<?php

namespace classes\pdf;

class LocalPdf extends AbstractPdf implements Strategy
{
    public function getHTML(\WP_Post $post)
    {
        $this->setPostId($post->ID);
        $this->getData();
        ob_start();
        require_once 'templates/people.php';
        return $html = ob_get_clean();
    }

    public function getDesc()
    {
        return \Mpdf\Output\Destination::FILE;
    }

    protected function getData()
    {
        $data = [
            'photo' => wp_get_attachment_image_src(get_post_thumbnail_id($this->getPostId())),
            'description' => $this->createDescription($this->getPostId()),
            'sectorHTML' => $this->createSectors($this->getPostId()),
            'practiceHTML' => $this->createPractices($this->getPostId()),
            'recognitionsHTML' => $this->createRecognitions($this->getPostId()),
            'education' => get_field('education', $this->getPostId()),
            'membership' => get_field('membership', $this->getPostId()),
            'lang' => get_field('languages_1', $this->getPostId()),
            'contacts' => get_field('contacts', $this->getPostId()),

        ];
        $data['phones'] = $this->createPhones($data['contacts']);
        $this->setExternalData($data);
    }

    public function getFilename()
    {
        return get_template_directory() . '/pdf/' . $this->getPostId(). '-' . $this->getCode() . '.pdf';
    }
}