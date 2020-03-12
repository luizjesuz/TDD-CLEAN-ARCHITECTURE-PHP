<?php

namespace ProtocolsPresentation;

interface Controller
{
    public function handle(array $httpRequest): array;
}
