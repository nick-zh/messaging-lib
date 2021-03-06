<?php

namespace Jobcloud\Messaging\Tests\Unit\Kafka\Conf;

use Jobcloud\Messaging\Kafka\Conf\KafkaConfigTrait;
use Jobcloud\Messaging\Kafka\Conf\KafkaConfiguration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Jobcloud\Messaging\Kafka\Conf\KafkaConfigTrait
 */
class KafkaConfigTraitTest extends TestCase
{

    private $traitClass;

    public function setUp(): void
    {
        $this->traitClass = new class
        {
            use KafkaConfigTrait;

            public function createTraitKafkaConfig(array $config): KafkaConfiguration
            {
                return $this->createKafkaConfig($config, [], [], 0);
            }
        };
    }

    /**
     * @return void
     */
    public function testCreateKafkaConfig(): void
    {

        /** @var KafkaConfiguration $config */
        $config = $this->traitClass->createTraitKafkaConfig(
            [
                'group.id' => 'test-group'
            ],
            []
        );
        self::assertInstanceOf(KafkaConfiguration::class, $config);

        $configArray = $config->dump();
        self::assertTrue(isset($configArray['group.id']));
        self::assertEquals($configArray['group.id'], 'test-group');
    }
}
