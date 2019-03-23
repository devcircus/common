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
    private $outputWrapper = 'data';

    /** @var string */
    private $inputWrapper = 'input';

    /** @var string */
    private $messagesWrapper = 'messages';

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
     * @param  bool  $wrap
     *
     * @return \BrightComponents\Common\Payloads\Contracts\PayloadContract
     */
    public function withInput(array $input, bool $wrap = true)
    {
        $copy = clone $this;
        $copy->input = $wrap && $this->inputWrapper ? [$this->inputWrapper => $input] : $input;

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
     * Create a copy of the payload with output.
     *
     * @param  mixed  $output
     * @param  bool  $wrap
     *
     * @return \BrightComponents\Common\Payloads\Contracts\PayloadContract
     */
    public function withOutput($output, bool $wrap = true)
    {
        $copy = clone $this;
        $copy->output = $wrap && $this->outputWrapper ? [$this->outputWrapper => $this->getArrayableItems($output)] : $this->getArrayableItems($output);

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
     * @param  bool  $wrap
     *
     * @return \BrightComponents\Common\Payloads\Contracts\PayloadContract
     */
    public function withMessages(array $messages, bool $wrap = true)
    {
        $copy = clone $this;
        $copy->messages = $wrap && $this->messagesWrapper ? [$this->messagesWrapper => $messages] : $messages;

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
    public function setOutputWrapper(string $wrapper)
    {
        $this->outputWrapper = $wrapper;

        return $this;
    }

    /**
     * Set a wrapper for payload output. Alias for setWrapper.
     *
     * @param  string  $wrapper
     *
     * @return $this
     */
    public function wrapOutput(string $wrapper)
    {
        return $this->setOutputWrapper($wrapper);
    }

    /**
     * Set a wrapper for payload output.
     *
     * @param  string  $wrapper
     *
     * @return $this
     */
    public function setInputWrapper(string $wrapper)
    {
        $this->inputWrapper = $wrapper;

        return $this;
    }

    /**
     * Set a wrapper for payload output. Alias for setWrapper.
     *
     * @param  string  $wrapper
     *
     * @return $this
     */
    public function wrapInput(string $wrapper)
    {
        return $this->setInputWrapper($wrapper);
    }

    /**
     * Set a wrapper for payload output.
     *
     * @param  string  $wrapper
     *
     * @return $this
     */
    public function setMessagesWrapper(string $wrapper)
    {
        $this->messagesWrapper = $wrapper;

        return $this;
    }

    /**
     * Set a wrapper for payload output. Alias for setWrapper.
     *
     * @param  string  $wrapper
     *
     * @return $this
     */
    public function wrapMessages(string $wrapper)
    {
        return $this->setMessagesWrapper($wrapper);
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

    /**
     * Handle dynamic property getters for a payload.
     *
     * @param  mixed  $property
     *
     * @return mixed
     */
    public function __get($property)
    {
        if ($this->outputWrapper) {
            return isset($this->getOutput()[$this->outputWrapper][$property]) ? $this->getOutput()[$this->outputWrapper][$property] : null;
        }

        return isset($this->getOutput()[$property]) ? $this->getOutput()[$property] : null;
    }
}
