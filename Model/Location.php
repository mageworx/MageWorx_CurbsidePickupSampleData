<?php
/**
 * Copyright © MageWorx. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace MageWorx\CurbsidePickupSampleData\Model;

use Magento\Framework\Setup\SampleData\Context as SampleDataContext;

class Location
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
     * @var \MageWorx\Locations\Api\LocationRepositoryInterface
     */
    protected $locationRepository;

    /**
     * @param SampleDataContext $sampleDataContext
     * @param \MageWorx\Locations\Api\LocationRepositoryInterface
     */
    public function __construct(
        SampleDataContext $sampleDataContext,
        \MageWorx\Locations\Api\LocationRepositoryInterface $locationRepository
    ) {
        $this->fixtureManager     = $sampleDataContext->getFixtureManager();
        $this->csvReader          = $sampleDataContext->getCsvReader();
        $this->locationRepository = $locationRepository;
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
                    if (is_string($key) || is_integer($key)) {
                        $data[$header[$key]] = $value;
                    }
                }
                $row = $data;

                /** @var \MageWorx\Locations\Api\Data\LocationInterface $location */
                $location = $this->locationRepository->getEmptyEntity();
                $location->addData($row);
                $this->locationRepository->save($location);
            }
        }
    }
}
