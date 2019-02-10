<?php 

namespace App\Cart;

use NumberFormatter;
use Money\Currency;
use Money\Money as BaseMoney;
use Money\Currencies\ISOCurrencies;
use Money\Formatter\IntlMoneyFormatter;


class Money
{
	protected $money;
	
	public function __construct($value)
	{
		$this->money = new BaseMoney($value, new Currency('MNT'));
	}
    
    public function amount()
    {
    	return $this->money->getAmount();
    }

	public function formatted()
	{
		$formatter = new IntlMoneyFormatter(
            new NumberFormatter('mn_MN', NumberFormatter::CURRENCY),
            new ISOCurrencies()
        ); 
        return $formatter->format($this->money); 
	}
}


 ?>