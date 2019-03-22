<?php

namespace BrightComponents\Common\Payloads;

use Traversable;
use JsonSerializable;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;
use BrightComponents\Common\Payloads\Contracts\PayloadContract;

class Payload implements PayloadContract
{
    /** @var string */
    private $status;

    /** @var array */
    private $input = [];

    /** @var array */
    private $output = [];

    /** @var array */
    private $messages = [];

    /** @var string */
    private $wrapper = '';

    /**
     * Create a copy of the payload with the status.
     *
     * @param  string  $status
     *
     * @return \BrightComponents\Common\Payloads\Contracts\PayloadContract
     */
    public function withStatus($status)
    {
        $copy = clone $this;
        $copy->status = $status;

        return $copy;
    }

    /**
     * Get the status of the payload.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Create a copy of the payload with input array.
     *
     * @param  array  $input
     *
     * @return \BrightComponents\Common\Payloads\Contracts\PayloadContract
     */
    public function withInput(array $input)
    {
        $copy = clone $this;
        $copy->input = $input;

        return $copy;
    }

    /**
     * Get input array from the payload.
     *
     * @return array
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * Create a copy of the payload with output array.
     *
     * @param  mixed  $output
     *
     * @return \BrightComponents\Common\Payloads\Contracts\PayloadContract
     */
    public function withOutput($output)
    {
        $copy = clone $this;
        $copy->output = $this->wrapper ? ['data' => $this->getArrayableItems($output)] : $this->getArrayableItems($output);

        return $copy;
    }

    /**
     * Get output array from the payload.
     *
     * @return array
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * Create a copy of the payload with messages array.
     *
     * @param  array  $output
     *
     * @return \BrightComponents\Common\Payloads\Contracts\PayloadContract
     */
    public function withMessages(array $messages)
    {
        $copy = clone $this;
        $copy->messages = $messages;

        return $copy;
    }

    /**
     * Get messages array from the payload.
     *
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Set a wrapper for payload output.
     *
     * @param  string  $wrapper
     *
     * @return $this
     */
    public function setWrapper(string $wrapper)
    {
        $this->wrapper = $wrapper;

        return $this;
    }

    /**
     * Set a wrapper for payload output. Alias for setWrapper.
     *
     * @param  string  $wrapper
     *
     * @return $this
     */
    public function wrap(string $wrapper)
    {
        return $this->setWrapper($wrapper);
    }

    /**
     * Get the arrayable items.
     *
     * @param  mixed  $input
     *
     * @return array
     */
    public function getArrayableItems($input)
    {
        if (is_array($input)) {
            return $input;
        } elseif ($input instanceof Collection) {
            return $input->all();
        } elseif ($input instanceof Arrayable) {
            return $input->toArray();
        } elseif ($input instanceof Jsonable) {
            return json_decode($input->toJson(), true);
        } elseif ($input instanceof JsonSerializable) {
            return $input->jsonSerialize();
        } elseif ($input instanceof Traversable) {
            return iterator_to_array($input);
        }

        return (array) $input;
    }
}
