<?php

namespace BrightComponents\Common\Payloads\Contracts;

interface PayloadContract extends Status
{
    /**
     * Create a copy of the payload with the status.
     *
     * @param  string  $status
     *
     * @return \BrightComponents\Common\Payloads\Contracts\PayloadContract
     */
    public function withStatus($status);

    /**
     * Get the status of the payload.
     *
     * @return string
     */
    public function getStatus();

    /**
     * Create a copy of the payload with input array.
     *
     * @param  array  $input
     *
     * @return \BrightComponents\Common\Payloads\Contracts\PayloadContract
     */
    public function withInput(array $input);

    /**
     * Get input array from the payload.
     *
     * @return array
     */
    public function getInput();

    /**
     * Create a copy of the payload with output.
     *
     * @param  mixed  $output
     *
     * @return \BrightComponents\Common\Payloads\Contracts\PayloadContract
     */
    public function withOutput($output);

    /**
     * Get output array from the payload.
     *
     * @return array
     */
    public function getOutput();

    /**
     * Create a copy of the payload with messages array.
     *
     * @param  array  $output
     *
     * @return \BrightComponents\Common\Payloads\Contracts\PayloadContract
     */
    public function withMessages(array $messages);

    /**
     * Get messages array from the payload.
     *
     * @return array
     */
    public function getMessages();

    /**
     * Set a wrapper for payload input.
     *
     * @param  string  $wrapper
     *
     * @return $this
     */
    public function setInputWrapper(string $wrapper);

    /**
     * Set a wrapper for payload output.
     *
     * @param  string  $wrapper
     *
     * @return $this
     */
    public function setOutputWrapper(string $wrapper);

    /**
     * Set a wrapper for payload messages.
     *
     * @param  string  $wrapper
     *
     * @return $this
     */
    public function setMessagesWrapper(string $wrapper);
}
