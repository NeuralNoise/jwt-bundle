<?php

declare(strict_types=1);

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2019 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace Jose\Bundle\JoseFramework\Event;

use Jose\Component\Core\JWT;
use Symfony\Component\EventDispatcher\Event;

final class HeaderCheckedSuccessEvent extends Event
{
    private $jwt;

    private $index;

    private $mandatoryHeaderParameters;

    public function __construct(JWT $jwt, int $index, array $mandatoryHeaderParameters)
    {
        $this->jwt = $jwt;
        $this->index = $index;
        $this->mandatoryHeaderParameters = $mandatoryHeaderParameters;
    }

    public function getJwt(): JWT
    {
        return $this->jwt;
    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function getMandatoryHeaderParameters(): array
    {
        return $this->mandatoryHeaderParameters;
    }
}
