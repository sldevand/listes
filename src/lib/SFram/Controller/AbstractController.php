<?php

namespace SFram\Controller;

use SFram\Http\HTTPRequest;
use SFram\Traits\Block;

/**
 * Class AbstractController
 * @package SFram\Controller
 */
abstract class AbstractController
{
    use Block;

    /**
     * @var HTTPRequest
     */
    protected $request;

    /**
     * AbstractController constructor.
     * @param HTTPRequest $request
     */
    public function __construct(
        HTTPRequest $request
    ) {
        $this->request = $request;
    }
}
