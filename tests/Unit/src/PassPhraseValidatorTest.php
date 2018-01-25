<?php

namespace PandaChiu\Advent2017\PassPhrase\Test;

use PHPUnit\Framework\TestCase;
use PandaChiu\Advent2017\PassPhraseValidator\PassPhraseValidator;

/**
 * Class PassPhraseValidator
 */
class PassPhraseValidatorTest extends TestCase
{
    /**
     * List of pass phrases and expected validity
     *
     * @return array
     */
    public function isValidPassPhraseDataProvider()
    {
        return [
            ['aa bb cc dd ee', true],
            ['aa bb cc dd aa', false],
            ['aa bb cc dd aaa', true],
        ];
    }

    /**
     * List of pass phrases and expected validity
     *
     * @return array
     */
    public function isValidPassPhraseAnagramDataProvider()
    {
        return [
            ['abcde fghij', true],
            ['abcde xyz ecdab', false],
            ['a ab abc abd abf abj', true],
            ['iiii oiii ooii oooi oooo', true],
            ['oiii ioii iioi iiio', false],
        ];
    }

    /**
     * Test the validator with non-anagram setting.
     *
     * @param string $passPhrase Pass Phrase to check.
     * @param bool   $valid      Whether the pass phrase is valid or not.
     *
     * @test
     *
     * @dataProvider isValidPassPhraseDataProvider
     *
     * @return void
     */
    public function testValidator($passPhrase, $valid)
    {
        $allowAnagrams = true;

        $validator = new PassPhraseValidator($passPhrase, $allowAnagrams);

        self::assertEquals($valid, $validator->validate());
    }

    /**
     * Test the validator not allowing anagrams.
     *
     * @param string $passPhrase Pass Phrase to check.
     * @param bool   $valid      Whether the pass phrase is valid or not.
     *
     * @test
     *
     * @dataProvider isValidPassPhraseAnagramDataProvider
     *
     * @return void
     */
    public function testValidatorAnagram($passPhrase, $valid)
    {
        $validator = new PassPhraseValidator($passPhrase);

        self::assertEquals($valid, $validator->validate());
    }
}
