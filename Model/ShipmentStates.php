<?php

namespace Ekyna\Bundle\ShipmentBundle\Model;

use Ekyna\Bundle\CoreBundle\Model\AbstractConstants;
use Ekyna\Component\Sale\Shipment\ShipmentStates as States;

/**
 * Class ShipmentStates
 * @package Ekyna\Bundle\ShipmentBundle\Model
 * @author Étienne Dauvergne <contact@ekyna.com>
 */
final class ShipmentStates extends AbstractConstants
{
    /**
     * {@inheritdoc}
     */
    static public function getConfig()
    {
        $prefix = 'ekyna_shipment.shipment.state.';
        return [
            States::STATE_CHECKOUT    => [$prefix.States::STATE_CHECKOUT,    'default'],
            States::STATE_ONHOLD      => [$prefix.States::STATE_ONHOLD,      'warning'],
            States::STATE_PENDING     => [$prefix.States::STATE_PENDING,     'warning'],
            States::STATE_BACKORDERED => [$prefix.States::STATE_BACKORDERED, 'warning'],
            States::STATE_READY       => [$prefix.States::STATE_READY,       'success'],
            States::STATE_SHIPPED     => [$prefix.States::STATE_SHIPPED,     'success'],
            States::STATE_COMPLETED   => [$prefix.States::STATE_COMPLETED,   'success'],
            States::STATE_RETURNED    => [$prefix.States::STATE_RETURNED,    'primary'],
            States::STATE_CANCELLED   => [$prefix.States::STATE_CANCELLED,   'default'],
        ];
    }

    /**
     * Returns the theme for the given state.
     *
     * @param string $state
     * @return string
     */
    static public function getTheme($state)
    {
        static::isValid($state, true);

        return static::getConfig()[$state][1];
    }
}
