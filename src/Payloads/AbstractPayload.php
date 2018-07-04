<?php

namespace BrightComponents\Common\Payloads;

use Illuminate\Support\Collection;

abstract class AbstractPayload
{
    /**
     * The payload data.
     *
     * @var mixed|null
     */
    protected $data = null;

    /**
     * The payload status code.
     *
     * @var int
     */
    protected $status = 200;

    /**
     * Construct a new Payload class.
     *
     * @param  mixed|null
     */
    public function __construct($data, $status = 200)
    {
        $this->setData($data);
        $this->setStatus($status);
    }

    /**
     * Set the response data.
     *
     * @return mixed|null
     */
    public function setData($data = null)
    {
        return tap($this, function ($payload) use ($data) {
            if (is_array($data)) {
                return $payload->data = $data;
            }
            if ($data instanceof Collection) {
                return $payload->data = $data->all();
            }

            return $payload->data = $data;
        });
    }

    /**
     * Set the response status.
     *
     * @return $this
     */
    public function setStatus($status = 200)
    {
        return tap($this, function ($payload) use ($status) {
            return $payload->status = $status;
        });
    }

    /**
     * Get the payload data.
     *
     * @return mixed|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get the payload status.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }
}
