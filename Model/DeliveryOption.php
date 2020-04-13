<?php
/**
 * Copyright © MageWorx. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace MageWorx\CurbsidePickupSampleData\Model;

use Magento\Framework\Setup\SampleData\Context as SampleDataContext;

class DeliveryOption
{
    /**
     * @var \Magento\Framework\Setup\SampleData\FixtureManager
     */
    private $fixtureManager;

    /**
     * @var \Magento\Framework\File\Csv
     */
    protected $csvReader;

    /**
     * @var \MageWorx\DeliveryDate\Api\Repository\DeliveryOptionRepositoryInterface
     */
    protected $deliveryOptionRepository;

    /**
     * @param SampleDataContext $sampleDataContext
     * @param \MageWorx\Locations\Api\LocationRepositoryInterface
     */
    public function __construct(
        SampleDataContext $sampleDataContext,
        \MageWorx\DeliveryDate\Api\Repository\DeliveryOptionRepositoryInterface $deliveryOptionRepository
    ) {
        $this->fixtureManager           = $sampleDataContext->getFixtureManager();
        $this->csvReader                = $sampleDataContext->getCsvReader();
        $this->deliveryOptionRepository = $deliveryOptionRepository;
    }

    /**
     * @param array $fixtures
     * @throws \Exception
     */
    public function install(array $fixtures)
    {
        foreach ($fixtures as $fileName) {

            $fileName = $this->fixtureManager->getFixture($fileName);

            if (!file_exists($fileName)) {
                continue;
            }

            $rows   = $this->csvReader->getData($fileName);
            $header = array_shift($rows);

            foreach ($rows as $row) {
                $data = [];

                foreach ($row as $key => $value) {
                    $data[$header[$key]] = $value;
                }
                $row = $data;

                /** @var \MageWorx\Locations\Api\Data\LocationInterface $location */
                $deliveryOption = $this->deliveryOptionRepository->getEmptyEntity();
                $deliveryOption->setData($row);
                $this->deliveryOptionRepository->save($deliveryOption);
            }
        }
    }
}
