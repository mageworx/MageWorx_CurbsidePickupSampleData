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
     * @var \Magento\ThemeSampleData\Model\Css
     */
    private $css;
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
     * @param \Magento\ThemeSampleData\Model\Css $css
     * @param \MageWorx\CurbsidePickupSampleData\Model\Location $location
     * @param \MageWorx\CurbsidePickupSampleData\Model\DeliveryOption $deliveryOption
     */
    public function __construct(
        \Magento\ThemeSampleData\Model\Css $css,
        \MageWorx\CurbsidePickupSampleData\Model\Location $location,
        \MageWorx\CurbsidePickupSampleData\Model\DeliveryOption $deliveryOption
    ) {
        $this->css            = $css;
        $this->location       = $location;
        $this->deliveryOption = $deliveryOption;
    }

    /**
     * @throws \Exception
     */
    public function install()
    {
        $this->css->install(['MageWorx_CurbsidePickupSampleData::fixtures/styles.css' => 'styles.css']);
        $this->location->install(['MageWorx_CurbsidePickupSampleData::fixtures/locations.csv']);
        $this->deliveryOption->install(['MageWorx_CurbsidePickupSampleData::fixtures/delivery_options.csv']);
    }
}
