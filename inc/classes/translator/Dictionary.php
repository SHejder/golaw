<?php


namespace classes\translator;


class Dictionary
{

    private $dictionary;

    public function __construct()
    {
        $this->loadDictionary();
    }


    public function getStringFromDict(string $string)
    {
        $dictionary = $this->getDictionary();
        if (isset($dictionary[$string]) && $dictionary[$string]['en'] !== '') {
            $out = "";
            foreach ($dictionary[$string] as $k => $v) {
                $out .= "[:{$k}]{$v}";
            }
            $out .= "[:]";
            return wpm_translate_string($out);
        } else {
            return false;
        }
    }

    public function saveNewString(string $string)
    {
        $dictionary = $this->getDictionary();
        $term = array(
            $string => [
                'en' => ucfirst($string),
                'ua' => '',
                'de' => '',
                'ru' => '',
            ]
        );
        $this->updateDict($term);
        $this->addToTranslation($string);
        return ucfirst($string);
    }

    private function addToTranslation(string $string)
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

    private function updateDict(array $term)
    {
        $dictionary = $this->getDictionary();
        $dictionary = $dictionary + $term;
        $tmp = var_export($dictionary, true);
        $tmp = "<?php\n\nreturn $tmp;\n\n ";
        file_put_contents(get_template_directory() . '/inc/translation/dictionary.php', $tmp);

    }

    /**
     * @return mixed
     */
    public function getDictionary()
    {
        return $this->dictionary;
    }


    public function loadDictionary()
    {
        $this->dictionary = include get_template_directory() . '/inc/translation/dictionary.php';
    }


}