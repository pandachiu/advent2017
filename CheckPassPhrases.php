<?php
include(__DIR__ . '/tests/bootstrap.php');

use PandaChiu\Advent2017\PassPhraseValidator\PassPhraseValidator;

$fileName = 'input.txt';

$passPhrases = file($fileName, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$validPasswords = 0;
$validAnagramPasswords = 0;
foreach ($passPhrases as $passPhrase) {
    $validator = new PassPhraseValidator($passPhrase, true);
    $anagramValidator = new PassPhraseValidator($passPhrase);

    if ($validator->validate()) {
        $validPasswords += 1;
    }
    if ($anagramValidator->validate()) {
        $validAnagramPasswords += 1;
    }
}

echo "Number of valid pass phrases : " . $validPasswords . "\n\n";
echo "Number of valid non anagram pass phrases : " . $validAnagramPasswords . "\n\n";