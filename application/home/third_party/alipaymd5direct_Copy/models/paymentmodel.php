<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/21/2017
 * Time: 8:07 PM
 */
class paymentmodel
{
    public $orderNumber;
    public $orderSubject;
    public $orderFree;
    public $orderDescription;
    public $paymentReturnUrl;
    public $paymentNotifyUrl;

    function __construct($number,$subject,$free,$description,$returnUrl,$notifyUrl)
    {
        $this->orderNumber = $number;
        $this->orderSubject = $subject;
        $this->orderFree = $free;
        $this->orderDescription=$description;
        $this->paymentNotifyUrl = $notifyUrl;
        $this->paymentReturnUrl = $returnUrl;
    }
}