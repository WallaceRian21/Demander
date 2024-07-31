<?php

class Algoritmo
{
    public function intToRoman($num)
    {
        $result = '';

        $romanNumerals = [
            1000 => 'M', 900 => 'CM', 500 => 'D', 400 => 'CD',
            100 => 'C', 90 => 'XC', 50 => 'L', 40 => 'XL',
            10 => 'X', 9 => 'IX', 5 => 'V', 4 => 'IV', 1 => 'I'
        ];

        foreach ($romanNumerals as $value => $symbol) {
            while ($num >= $value) {
                $result .= $symbol;
                $num -= $value;
            }
        }

        return $result;
    }

    public function decimalToRoman($num)
    {
        $integerPart = intval($num);
        $decimalPart = $num - $integerPart;

        $romanIntegerPart = $this->intToRoman($integerPart);

        if ($decimalPart > 0) {
            $decimalRoman = $this->convertDecimalPart($decimalPart);
            return "$romanIntegerPart.$decimalRoman";
        }

        return $romanIntegerPart;
    }

    private function convertDecimalPart($decimalPart)
    {
        $roundedDecimalPart = round($decimalPart, 1);

        switch ($roundedDecimalPart) {
            case 0.1:
                return 'S';
            case 0.2:
                return 'SS';
            case 0.3:
                return 'SSS';
            case 0.4:
                return 'S.';
            case 0.5:
                return '.S';
            case 0.6:
                return '.SS';
            case 0.7:
                return '.SSS';
            case 0.8:
                return 'S..';
            case 0.9:
                return '..S';
            default:
                return '';
        }
    }
}

$alg = new Algoritmo();
echo 'Algoritmo que transforma numero Inteiro em Algarismo Romano';
echo '<br>';
echo $alg->intToRoman(1500);
echo '<br>';
echo 'Algoritmo que transforma numero Decimal em Algarismo Romano';
echo '<br>';
echo $alg->decimalToRoman(18.1);

?>
