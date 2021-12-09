<?php

declare(strict_types=1);

namespace Jose\Component\KeyManagement\Analyzer;

use ArrayIterator;
use function count;
use Countable;
use IteratorAggregate;
use JsonSerializable;
use Traversable;

class MessageBag implements JsonSerializable, IteratorAggregate, Countable
{
    /**
     * @var Message[]
     */
    private $messages = [];

    /**
     * Adds a message to the message bag.
     */
    public function add(Message $message): void
    {
        $this->messages[] = $message;
    }

    /**
     * Returns all messages.
     *
     * @return Message[]
     */
    public function all(): array
    {
        return $this->messages;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): array
    {
        return array_values($this->messages);
    }

    /**
     * {@inheritdoc}
     */
    public function count(): int
    {
        return count($this->messages);
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->messages);
    }
}
