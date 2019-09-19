<?php


namespace classes;


class Transliterator
{
    private $input;
    private $dictionary;
    private $out;

    public function __construct(string $string)
    {
        $this->setInput($string);
        $this->setDictionary();

    }

    public function getLocalString()
    {
        $string = strtolower($this->getInput());
        $dictionary = $this->getDictionary();
        if (isset($dictionary[$string]) && $dictionary[$string]['en'] !== '') {
            $this->getStringFromDict($dictionary, $string);
        } else {
            $this->saveNewString($dictionary, $string);
        }
        return $this->getOut();
    }

    private function getStringFromDict($dictionary, $string)
    {
        $out = "";
        foreach ($dictionary[$string] as $k => $v) {
            $out .= "[:{$k}]{$v}";
        }
        $out .= "[:]";
        $this->setOut(wpm_translate_string($out));
    }

    private function saveNewString($dictionary, $string)
    {
        $term = array(
            $string => [
                'en' => ucfirst($string),
                'ua' => '',
                'de' => '',
                'ru' => '',
            ]
        );
        $this->updateDict($dictionary, $term);
        $this->addToTranslation($string);
        $this->setOut(ucfirst($string));
    }

    private function addToTranslation($string)
    {
        $f = fopen(get_template_directory() . '/inc/translation/dict.txt', 'a+');
        fwrite($f, "\n'" . $string . "' =>[\n");
        fwrite($f, "\t'en' => '" . ucfirst($string) . "',\n");
        fwrite($f, "\tua => '',\n");
        fwrite($f, "\tde => '',\n");
        fwrite($f, "\tru => '',\n");
        fwrite($f, '],');
        fclose($f);
    }

    private function updateDict($dictionary, $term)
    {
        $dictionary = $dictionary + $term;
        $tmp = var_export($dictionary, true);
        $tmp = "<?php\n\nreturn $tmp;\n\n ";
        file_put_contents(get_template_directory() . '/inc/translation/dictionary.php', $tmp);

    }

    /**
     * @return mixed
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @param mixed $input
     */
    public function setInput($input)
    {
        $this->input = $input;
    }

    /**
     * @return mixed
     */
    public function getDictionary()
    {
        return $this->dictionary;
    }


    public function setDictionary()
    {
        $this->dictionary = include get_template_directory() . '/inc/translation/dictionary.php';
    }

    /**
     * @return mixed
     */
    public function getOut()
    {
        return $this->out;
    }

    /**
     * @param mixed $out
     */
    public function setOut($out)
    {
        $this->out = $out;
    }


}