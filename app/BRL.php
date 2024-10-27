<?php

declare(strict_types=1);

namespace App;

use ArchTech\Money\Currency;

class BRL extends Currency
{
    protected string $code = 'BRL';

    protected string $name = 'Brazilian Real';

    protected float $rate = 1.0;

    protected int $mathDecimals = 2;

    protected int $displayDecimals = 2;

    protected string $decimalSeparator = ',';

    protected string $thousandsSeparator = '.';

    protected int $rounding = 2;

    protected string $prefix = 'R$ ';
}
