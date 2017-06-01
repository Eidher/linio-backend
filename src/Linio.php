<?php
/**
 *  Linio Backend Challenge
 *
 *  @author Eidher Escalona <eidher.escalona@gmail.com>
**/

declare(strict_types=1);

final class Linio 
{
    /**
     * @var array $numbers
    **/
    private $numbers = [];

    /**
     * @var array $values
    **/
    private $values = [];

    /**
     * @var array $both
    **/
    private $both = [];

    /**
     * Constructor
     * @param array $values - key value pair representing the multiplier and the text. ex. [3 => 'linio', 5 => 'lexus']
     * @param string $both - the text to replace when the number multiple by both values
    **/
    public function __construct(array $values, string $both)
    {
        $this->values = $values;
        $this->both[$both] = array_keys($values);
        $this->numbers = array_combine(range(1, 100), range(1, 100));
    }

    /**
    * Replace the value with $text depending if the value is multiple of $multiple
    **/
    private function multipleOf(int $multiple, string $text) : void
    {
       array_walk($this->numbers, function (&$item, $key) use ($multiple, $text) {

            switch ($key % $multiple) {
                case 0:
                    $item = $text;
                    break;
            }
       });
    }

    /**
     * 
    **/
    private function multipleOfBoth(string $text) : void
    {
        array_walk($this->numbers, function (&$item, $key) use ($text) {
            
            $bothValues = current($this->both);

            if ($key % $bothValues[0] == 0 && $key % $bothValues[1] == 0) {
                $item = key($this->both);
            }
       });
    }

    /**
    * Prints a formatted result depending on the sapi
    **/
    public static function print($value)
    {
        echo $value . (php_sapi_name() == 'cli' ? PHP_EOL : '<br>');
    }

    /**
    *
    **/
    public function execute()
    {
        try {

            foreach ($this->values as $multiple => $text) {
                $this->multipleOf($multiple, $text);
            }
            
            $this->multipleOfBoth('Linianos');

            return $this->numbers;

        } catch (\Execption $e) {
            print($e->getMessage());
        }
    }
}
