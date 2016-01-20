<?php

namespace MaxMind\MinFraud\Model;

/**
 * Class Issuer
 * @package MaxMind\MinFraud\Model
 *
 * @property string $name The name of the bank which issued the credit card.
 * @property boolean $matchesProvidedName This property is true if the name
 * matches the name provided in the request for the card issuer. It is false
 * if the name does not match. The property is null if either no name or issuer
 * ID number (IIN) was provided in the request or if MaxMind does not have a
 * name associated with the IIN.
 * @property string $phoneNumber The phone number of the bank which issued the
 * credit card. In some cases the phone number we return may be out of date.
 * @property boolean $matchesProvidedPhoneNumber This property is true if the
 * phone number matches the number provided in the request for the card
 * issuer. It is false if the number does not match. It is null if either no
 * phone number was provided or issuer ID number (IIN) was provided in the
 * request or if MaxMind does not have a phone number associated with the IIN.
 */
class Issuer extends AbstractModel
{
    /**
     * @internal
     */
    protected $name;

    /**
     * @internal
     */
    protected $matchesProvidedName;

    /**
     * @internal
     */
    protected $phoneNumber;

    /**
     * @internal
     */
    protected $matchesProvidedPhoneNumber;

    public function __construct($response, $locales = ['en'])
    {
        $this->name = $this->safeArrayLookup($response['name']);
        $this->matchesProvidedName
            = $this->safeArrayLookup($response['matches_provided_name']);
        $this->phoneNumber = $this->safeArrayLookup($response['phone_number']);
        $this->matchesProvidedPhoneNumber
            = $this->safeArrayLookup($response['matches_provided_phone_number']);
    }
}