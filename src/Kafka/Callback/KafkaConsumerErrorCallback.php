<?php

namespace Jobcloud\Messaging\Kafka\Callback;

use RdKafka\KafkaConsumer;
use Jobcloud\Messaging\Kafka\Exception\KafkaBrokerException;

final class KafkaConsumerErrorCallback
{

    /**
     * @param KafkaConsumer $consumer
     * @param integer       $errorCode
     * @param string        $reason
     * @throws KafkaBrokerException
     * @return void
     */
    public function __invoke(KafkaConsumer $consumer, int $errorCode, string $reason)
    {
        throw new KafkaBrokerException(
            sprintf(KafkaBrokerException::BROKER_EXCEPTION_MESSAGE, $reason),
            $errorCode
        );
    }
}