<?php

namespace App\Classes\ExtFaker\Provider\ru_RU;

class Lorem extends \Faker\Provider\Base
{
    protected static $wordList = array(
        'другие', 'последствия', 'или', 'терпит', 'есть', 'удовольствие',
        'разоблачая', 'письмо', 'открыть', 'и','она', 'которое', 'от',
        'что', 'проводник', 'правда', 'и', 'как', 'чрезвычайно',
        'счастливый', 'жизнь', 'слова', 'не', 'объяснять', 'редактирование', 'или',
        'ненавидит', 'или', 'РАН', 'но', 'ведь', 'результат', 'великий',
        'боль', 'них', 'кто', 'счет', 'удовольствие', 'последовать', 'знать',
        'ни', 'боль', 'игры', 'ведь', 'боль', 'есть', 'имеется',
        'главная', 'получить', 'открытый', 'но', 'ведь', 'не', 'не',
        'его', 'сорт', 'раз', 'падение', 'в', 'усилие', 'и', 'боль',
        'великий', 'некоторый', 'искать', 'удовольствие', 'чтобы', 'Для', 'в',
        'маленький', 'приходить', 'кто', 'наш', 'сайт', 'любой',
        'тело', 'никто', 'для', 'ее', 'удовольствие', 'для', 'удовольствие',
        'есть', 'динамичность', 'кропотливый', 'сохранить', 'в', 'нечто', 'с', 'это',
        'преимущество', 'последствия', 'что', 'но', 'или', 'ему', 'право',
        'придираться', 'что', 'в', 'ее', 'удовольствие', 'открытый', 'быть',
        'как', 'нет', 'раздражает', 'и', 'обычный', 'фильтры', 'о',
        'мы', 'кто', 'лесть', 'подарки', 'список', 'полный',
        'бизнес', 'удовольствие', 'deleniti', 'и', 'жить', 'кого',
        'боль', 'и', 'которое', 'беда', 'приветствовать', 'не',
        'ослепили', 'желание', 'нет', 'предвидеть', 'а', 'в',
        'встреча', 'как', 'все', 'этот', 'родиться', 'ошибка',
        'равный', 'есть', 'в', 'ошибка', 'что', 'услуги', 'оригинал',
        'устойчивость', 'мужество', 'это', 'это', 'закуски', 'и', 'больно', 'полет',
        'и', 'эти', 'конечно', 'о', 'легко', 'есть', 'и', 'легко',
        'различие', 'для', 'бесплатно', 'время', 'с', 'контакт', 'нас',
        'есть', 'выбрать', 'выбор', 'когда', 'нет', 'блок', 'где',
        'более того', 'в любое время', 'есть', 'кто', 'меньше', 'он', 'тот', 'самый',
        'пожалуйста', 'делать', 'мы', 'все', 'удовольствие', 'брать',
        'есть', 'каждый', 'боль', 'боль', 'раз', 'в',
        'некоторые', 'и', 'или', 'последствия', 'или', 'ему', 'кто',
        'боль', 'ему', 'бег', 'в', 'удовольствие', 'нет', 'производители',
        'но', 'однако', 'их', 'и', 'осуждать', 'услуги', 'долги', 'или',
        'реальный мир', 'должен', 'часто', 'происходить', 'на', 'и',
        'спорт', 'о', 'Не', 'и', 'раздражает', 'не',
        'принял', 'поэтому', 'их', 'о', 'вот', 'граница', 'а',
        'параметр', 'избранный', 'как', 'или', 'приемлет', 'радости',
        'майор', 'страдание', 'asperiores', 'избегать'
    );

    /**
     * @example 'Lorem'
     * @return string
     */
    public static function word()
    {
        return static::randomElement(static::$wordList);
    }

    /**
     * Generate an array of random words
     *
     * @example array('Lorem', 'ipsum', 'dolor')
     * @param  integer      $nb     how many words to return
     * @param  bool         $asText if true the sentences are returned as one string
     * @return array|string
     */
    public static function words($nb = 3, $asText = false)
    {
        $words = array();
        for ($i=0; $i < $nb; $i++) {
            $words []= static::word();
        }

        return $asText ? implode(' ', $words) : $words;
    }

    /**
     * Generate a random sentence
     *
     * @example 'Lorem ipsum dolor sit amet.'
     * @param integer $nbWords         around how many words the sentence should contain
     * @param boolean $variableNbWords set to false if you want exactly $nbWords returned,
     *                                  otherwise $nbWords may vary by +/-40% with a minimum of 1
     * @return string
     */
    public static function sentence($nbWords = 6, $variableNbWords = true)
    {
        if ($nbWords <= 0) {
            return '';
        }
        if ($variableNbWords) {
            $nbWords = self::randomizeNbElements($nbWords);
        }

        $words = static::words($nbWords);
        $words[0] = ucwords($words[0]);

        return implode($words, ' ') . '.';
    }

    /**
     * Generate an array of sentences
     *
     * @example array('Lorem ipsum dolor sit amet.', 'Consectetur adipisicing eli.')
     * @param  integer      $nb     how many sentences to return
     * @param  bool         $asText if true the sentences are returned as one string
     * @return array|string
     */
    public static function sentences($nb = 3, $asText = false)
    {
        $sentences = array();
        for ($i=0; $i < $nb; $i++) {
            $sentences []= static::sentence();
        }

        return $asText ? implode(' ', $sentences) : $sentences;
    }

    /**
     * Generate a single paragraph
     *
     * @example 'Sapiente sunt omnis. Ut pariatur ad autem ducimus et. Voluptas rem voluptas sint modi dolorem amet.'
     * @param integer $nbSentences         around how many sentences the paragraph should contain
     * @param boolean $variableNbSentences set to false if you want exactly $nbSentences returned,
     *                                      otherwise $nbSentences may vary by +/-40% with a minimum of 1
     * @return string
     */
    public static function paragraph($nbSentences = 3, $variableNbSentences = true)
    {
        if ($nbSentences <= 0) {
            return '';
        }
        if ($variableNbSentences) {
            $nbSentences = self::randomizeNbElements($nbSentences);
        }

        return implode(static::sentences($nbSentences), ' ');
    }

    /**
     * Generate an array of paragraphs
     *
     * @example array($paragraph1, $paragraph2, $paragraph3)
     * @param  integer      $nb     how many paragraphs to return
     * @param  bool         $asText if true the paragraphs are returned as one string, separated by two newlines
     * @return array|string
     */
    public static function paragraphs($nb = 3, $asText = false)
    {
        $paragraphs = array();
        for ($i=0; $i < $nb; $i++) {
            $paragraphs []= static::paragraph();
        }

        return $asText ? implode("\n\n", $paragraphs) : $paragraphs;
    }

    /*
     * Generate a text string.
     * Depending on the $maxNbChars, returns a string made of words, sentences, or paragraphs.
     *
     * @example 'Sapiente sunt omnis. Ut pariatur ad autem ducimus et. Voluptas rem voluptas sint modi dolorem amet.'
     *
     * @param  integer $maxNbChars Maximum number of characters the text should contain (minimum 5)
     *
     * @return string
     */
    /*public static function text($maxNbChars = 200)
    {
        if ($maxNbChars < 5) {
            throw new \InvalidArgumentException('text() can only generate text of at least 5 characters');
        }

        $type = ($maxNbChars < 25) ? 'word' : (($maxNbChars < 100) ? 'sentence' : 'paragraph');

        $text = array();
        while (empty($text)) {
            $size = 0;

            // until $maxNbChars is reached
            while ($size < $maxNbChars) {
                $word   = ($size ? ' ' : '') . static::$type();
                $text[] = $word;

                $size += strlen($word);
            }

            array_pop($text);
        }

        if ($type === 'word') {
            // capitalize first letter
            $text[0] = ucwords($text[0]);

            // end sentence with full stop
            $text[count($text) - 1] .= '.';
        }

        return implode($text, '');
    }*/

    protected static function randomizeNbElements($nbElements)
    {
        return (int) ($nbElements * mt_rand(60, 140) / 100) + 1;
    }
}