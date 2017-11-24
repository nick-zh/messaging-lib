<?php

namespace Jobcloud\Messaging\Kafka\Consumer;

use Jobcloud\Messaging\Consumer\ConsumerInterface;
use RdKafka\KafkaConsumer;

abstract class AbstractKafkaConsumer implements ConsumerInterface
{

    protected $consumer;

    protected $config;

    protected $topics;

    /**
     * AbstractKafkaConsumer constructor.
     * @param array  $brokerList
     * @param array  $topics
     * @param string $consumerGroup
     * @param array  $config
     */
    public function __construct(KafkaConsumer $consumer, array $brokerList, array $topics, string $consumerGroup)
    {
        $this->consumer = $consumer;

        $this->subscribe($topics);
    }

    /**
     * @param array $topics
     */
    public function subscribe(array $topics)
    {
        $this->consumer->subscribe($topics);
    }
}
