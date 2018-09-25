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
        $user_blnc = eval('return '.$this->balance.';');

        $user_wtdr = eval('return '.$amount->value().';');

        if ( $user_blnc > $user_wtdr ){

            $this->balance = $user_blnc-$user_wtdr;

        } else{
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