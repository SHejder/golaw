<?php
namespace classes\translator;


class Transliterator
{
    private $input;
    private $out;

    public function __construct(string $string)
    {
        $this->setInput($string);
    }

    public function getLocalString()
    {
        $string = strtolower($this->getInput());
        $dictionary = new Dictionary();
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