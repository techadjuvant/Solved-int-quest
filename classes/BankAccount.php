<?php

class BankAccount implements IfaceBankAccount
{

    private $balance = null;

    public function __construct(Money $openingBalance)
    {
        $this->balance = $openingBalance;
    }

    public function balance()
    {
        return $this->balance;
    }

    public function deposit(Money $amount)
    {
        // New balance after deposited money
        $this->balance=new Money($this->balance()->value()+$amount->value()); 
    }

    public function withdraw(Money $amount)
    {   
        // Hold the provious balance & check the previous balance is greater than the withdraw amount
        if ($this->balance()->value() > $amount->value() ) {
            $this->balance=new Money($this->balance()->value()-$amount->value());
        }else{
            throw new Exception("Withdrawl amount larger than balance");
        }
    }


    public function transfer(Money $amount, BankAccount $account)
    {
        //implement this method
        $user_blnc = eval('return '.$account->balance.';');

        $user_trns = eval('return '.$amount->value().';');

        $this->withdraw($amount);

        $account->balance= $user_blnc+$user_trns;
    }
}