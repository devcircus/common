<?php

namespace BrightComponents\Common\Payloads;

use BrightComponents\Common\Payloads\Contracts\PayloadContract;

class Payload extends PayloadContract
{
    /** @var string */
    private $status;

    /** @var array */
    private $input = [];

    /** @var array */
    private $output = [];

    /** @var array */
    private $messages = [];

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
     * @param  array  $output
     *
     * @return \BrightComponents\Common\Payloads\Contracts\PayloadContract
     */
    public function withOutput(array $output)
    {
        $copy = clone $this;
        $copy->output = $output;

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
}
