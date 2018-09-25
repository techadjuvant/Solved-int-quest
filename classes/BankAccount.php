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
        //implement this method
        $user_blnc = $this->balance;

        $user_dpst = $amount->value();

        $str_sum ="$user_blnc+$user_dpst";

        $balance = eval('return '.$str_sum.';');

        return $this->balance = $balance;
    }

    public function withdraw(Money $amount)
    {
        
    }


    public function transfer(Money $amount, BankAccount $account)
    {
        //implement this method
    }
}