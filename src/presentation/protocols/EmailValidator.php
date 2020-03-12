<?php

namespace ProtocolsPresentation;

interface EmailValidator
{
    public function isValid(string $email): bool;
}
