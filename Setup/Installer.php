<?php
/**
 * Copyright © MageWorx. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace MageWorx\CurbsidePickupSampleData\Setup;

use Magento\Framework\Setup;

class Installer implements Setup\SampleData\InstallerInterface
{
    /**
     * @var \MageWorx\CurbsidePickupSampleData\Model\Location
     */
    private $location;

    /**
     * @var \MageWorx\CurbsidePickupSampleData\Model\DeliveryOption
     */
    private $deliveryOption;

    /**
     * Installer constructor.
     *
     * @param \MageWorx\CurbsidePickupSampleData\Model\Location $location
     * @param \MageWorx\CurbsidePickupSampleData\Model\DeliveryOption $deliveryOption
     */
    public function __construct(
        \MageWorx\CurbsidePickupSampleData\Model\Location $location,
        \MageWorx\CurbsidePickupSampleData\Model\DeliveryOption $deliveryOption
    ) {
        $this->location       = $location;
        $this->deliveryOption = $deliveryOption;
    }

    /**
     * @throws \Exception
     */
    public function install()
    {
        $this->location->install(['MageWorx_CurbsidePickupSampleData::fixtures/locations.csv']);
        $this->deliveryOption->install(['MageWorx_CurbsidePickupSampleData::fixtures/delivery_options.csv']);
    }
}
