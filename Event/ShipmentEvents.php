<?php

namespace Ekyna\Bundle\ShipmentBundle\Event;

/**
 * ShipmentEvents.
 *
 * @author Étienne Dauvergne <contact@ekyna.com>
 */
final class ShipmentEvents
{
    const PRE_STATE_CHANGE = 'ekyna_shipment.pre_state_updated';
    const POST_STATE_CHANGE = 'ekyna_shipment.post_state_updated';
}
