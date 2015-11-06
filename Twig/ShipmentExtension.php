<?php

namespace Ekyna\Bundle\ShipmentBundle\Twig;

use Ekyna\Bundle\ShipmentBundle\Model\ShipmentStates;
use Ekyna\Component\Sale\Shipment\ShipmentInterface;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Class ShipmentExtension
 * @package Ekyna\Bundle\ShipmentBundle\Twig
 * @author Étienne Dauvergne <contact@ekyna.com>
 */
class ShipmentExtension extends \Twig_Extension
{
    /**
     * @var TranslatorInterface
     */
    protected $translator;


    /**
     * Constructor.
     *
     * @param TranslatorInterface   $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('shipment_state_label', [$this, 'getShipmentStateLabel'], ['is_safe' => ['html']]),
            new \Twig_SimpleFilter('shipment_state_badge', [$this, 'getShipmentStateBadge'], ['is_safe' => ['html']]),
        );
    }

    /**
     * Returns the shipment state label.
     *
     * @param string|ShipmentInterface $stateOrShipment
     * @return string
     */
    public function getShipmentStateLabel($stateOrShipment)
    {
        $state = $stateOrShipment instanceof ShipmentInterface ? $stateOrShipment->getState() : $stateOrShipment;

        return $this->translator->trans(ShipmentStates::getLabel($state));
    }

    /**
     * Returns the shipment state badge.
     *
     * @param string|ShipmentInterface $stateOrShipment
     * @return string
     */
    public function getShipmentStateBadge($stateOrShipment)
    {
        $state = $stateOrShipment instanceof ShipmentInterface ? $stateOrShipment->getState() : $stateOrShipment;

        return sprintf(
            '<span class="label label-%s">%s</span>',
            ShipmentStates::getTheme($state),
            $this->getShipmentStateLabel($state)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'ekyna_shipment';
    }
}
