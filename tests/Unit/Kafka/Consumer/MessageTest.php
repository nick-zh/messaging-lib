<?php

declare(strict_types=1);

namespace Jobcloud\Messaging\Tests\Unit\Kafka\Consumer;

use Jobcloud\Messaging\Kafka\Consumer\Message;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Jobcloud\Messaging\Kafka\Consumer\Message
 */
final class MessageTest extends TestCase
{
    public function testMessageGettersAndConstructor()
    {
        $key = '1234-1234-1234';
        $body = 'foo bar baz';
        $topic = 'test';
        $offset = 42;
        $partition = 1;
        $headers = [ 'key' => 'value' ];

        $message = new Message($key, $body, $topic, $partition, $offset, $headers);

        self::assertEquals($key, $message->getKey());
        self::assertEquals($body, $message->getBody());
        self::assertEquals($topic, $message->getTopicName());
        self::assertEquals($offset, $message->getOffset());
        self::assertEquals($partition, $message->getPartition());
        self::assertEquals($headers, $message->getHeaders());
    }
}
