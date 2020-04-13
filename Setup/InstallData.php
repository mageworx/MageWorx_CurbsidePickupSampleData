<?php
/**
 * Copyright © MageWorx. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace MageWorx\CurbsidePickupSampleData\Setup;

use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Framework\Setup;
use MageWorx\NoContactDelivery\Helper\Data as NoContactDeliveryHelper;
use MageWorx\DeliveryDate\Helper\Data as DeliveryDateHelper;

class InstallData implements Setup\InstallDataInterface
{
    /**
     * @var Setup\SampleData\Executor
     */
    protected $executor;

    /**
     * @var Installer
     */
    protected $installer;

    /**
     * @var WriterInterface
     */
    protected $configWriter;

    /**
     * InstallData constructor.
     *
     * @param Setup\SampleData\Executor $executor
     * @param Installer $installer
     * @param WriterInterface $configWriter
     */
    public function __construct(
        \Magento\Framework\Setup\SampleData\Executor $executor,
        \MageWorx\CurbsidePickupSampleData\Setup\Installer $installer,
        WriterInterface $configWriter
    ) {
        $this->executor     = $executor;
        $this->installer    = $installer;
        $this->configWriter = $configWriter;
    }

    /**
     * {@inheritdoc}
     */
    public function install(
        Setup\ModuleDataSetupInterface $setup,
        Setup\ModuleContextInterface $moduleContext
    ) {
        $this->executor->exec($this->installer);
        $this->saveNoContactSettings();
        $this->saveDeliveryDateSettings();

    }

    private function saveDeliveryDateSettings()
    {
        $this->configWriter->save(
            DeliveryDateHelper::XML_PATH_COMMENT_FIELD_LABEL,
            'Your comment here:'
        );
    }

    /**
     * Add settings for No Contact Delivery Extension
     */
    private function saveNoContactSettings()
    {
        $this->configWriter->save(
            NoContactDeliveryHelper::XML_PATH_ENABLE,
            1
        );
        $this->configWriter->save(
            NoContactDeliveryHelper::XML_PATH_SHIPPING_METHODS,
            'mageworxpickup_mageworxpickup'
        );
        $this->configWriter->save(
            NoContactDeliveryHelper::XML_PATH_LABEL,
            'Curbside Pickup'
        );
        $this->configWriter->save(
            NoContactDeliveryHelper::XML_PATH_LABEL,
            'Curbside Pickup'
        );
        $this->configWriter->save(
            NoContactDeliveryHelper::XML_PATH_DESCRIPTION,
            'Choose store and time for curbside pickup, leave your car number in comment and we will bring your order right to your trunk.'
        );
        $this->configWriter->save(
            NoContactDeliveryHelper::XML_PATH_PRODUCT_LABEL_FOR_PRODUCT,
            'Curbside pickup available'
        );
        $this->configWriter->save(
            NoContactDeliveryHelper::XML_PATH_DESCRIPTION_FOR_PRODUCT,
            'We will bring your order right to your trunk. Available for Pickup method on the checkout.'
        );
    }
}