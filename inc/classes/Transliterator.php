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
        $this->setDictionary(new Dictionary());
    }

    public function getLocalString()
    {
        $string = strtolower($this->getInput());
        $dictionary = $this->getDictionary();
        $out = $dictionary->getStringFromDict($string);
        if(!$out){
            $out = $dictionary->saveNewString($string);
        }
        $this->setOut($out);
        return $this->getOut();
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


    public function setDictionary(Dictionary $dictionary)
    {
        $this->dictionary = $dictionary;
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