<?php

namespace MaxMind\MinFraud\Model;

/**
 * Class IpLocation
 * @package MaxMind\MinFraud\Model
 */
class IpLocation extends \GeoIp2\Model\Insights
{
    /**
     * @param array $response
     * @param array $locales
     */
    public function __construct($response, $locales = array('en'))
    {
        parent::__construct($response, $locales);
        $this->country = new GeoIp2Country($this->get('country'), $locales);
        $this->location = new GeoIp2Location($this->get('location'));
    }
}