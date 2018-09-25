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
        // To transfer first withdraw from myBankAccount & then add the withdraw amount to the yourBankAccount
        $this->withdraw($amount);
        $account->balance=new Money($account->balance()->value()+$amount->value());
    }
}