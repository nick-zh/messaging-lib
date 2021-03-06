<?php

declare(strict_types=1);

namespace Jobcloud\Messaging\Kafka\Exception;

use \RuntimeException;

class AvroEncoderException extends RuntimeException
{
    const MESSAGE_BODY_MUST_BE_JSON_MESSAGE = 'The body of an avro message must be JSON';
    const NO_SCHEMA_FOR_TOPIC_MESSAGE = 'There is no avro schema defined for the topic %s';
    const UNABLE_TO_LOAD_DEFINITION_MESSAGE = 'Was unable to load definition for schema %s';
}
