<?php

namespace PandaChiu\Advent2017\PassPhraseValidator;

/**
 * Class PassPhraseValidator
 *
 * @package PandaChiu\Advent2017\PassPhraseValidator
 */
class PassPhraseValidator
{
    /**
     * @var string $passPhrase passPhrase.
     */
    private $passPhrase;

    /**
     * @var string $allowAnagrams allow Anagrams or not.
     */
    private $allowAnagrams;

    /**
     * PassPhraseValidator constructor.
     *
     * @param string $passPhrase passPhrase.
     * @param bool $allowAnagrams allow Anagrams or not.
     */
    public function __construct($passPhrase, $allowAnagrams = false)
    {
        $this->passPhrase = $passPhrase;
        $this->allowAnagrams = $allowAnagrams;
    }

    /**
     * Test validate functions.
     *
     * @return bool
     */
    public function validate()
    {
        $words = explode(' ', $this->passPhrase);
        $used = [];
        foreach ($words as $word) {

            if (!$this->allowAnagrams) {
                $word = $this->sortString($word);
            }

            if (isset($used[$word])) {
                return false;
            }
            $used[$word] = true;
        }
        return true;
    }

    /**
     * @param string $string string to sort.
     * @return string
     */
    public function sortString($string)
    {
        $stringArray = str_split($string, 1);
        sort($stringArray);
        return implode('', $stringArray);
    }
}