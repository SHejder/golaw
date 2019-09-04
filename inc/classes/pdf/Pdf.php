<?php


namespace classes\pdf;

use Mpdf\Mpdf;

class Pdf
{
    private $strategy;
    private $mpdf;
    private $html;
    private $stylesheet;

    public function __construct(Mpdf $mpdf, Strategy $strategy = null)
    {
        $this->strategy = $strategy;
        $this->mpdf = $mpdf;
        $this->stylesheet = file_get_contents(get_template_directory() . '/css/print.css');
    }

    public function setStrategy(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function savePDF(\WP_Post $post)
    {
        $this->html = $this->strategy->getHTML($post);
        $this->mpdf->WriteHTML($this->stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
        $this->mpdf->WriteHTML($this->html, \Mpdf\HTMLParserMode::HTML_BODY);
        $this->mpdf->Output($this->strategy->getFilename(),
            $this->strategy->getDesc());

    }
}