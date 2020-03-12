<?php

declare(strict_types=1);

namespace KW13\presentation\controllers;

use Exception;
use KW13\presentation\errors\InvalidParamError;
use KW13\presentation\errors\MissingIndexError;
use KW13\presentation\errors\MissingParamError;
use ProtocolsPresentation\Controller;
use ProtocolsPresentation\EmailValidator;

class SignUpController implements Controller
{
    private EmailValidator $emailValidator;

    public function __construct(EmailValidator $emailValidator)
    {
        $this->emailValidator = $emailValidator;
    }
    public function handle(array $httpRequest): array
    {
        $requiredFields = ['name', 'email', 'password', 'passwordConfirmation'];

        try {
            if (!isset($httpRequest['body'])) {
                throw new MissingIndexError('body');
            }

            $data = (object) $httpRequest['body'];

            foreach ($requiredFields as $field) {
                if (!isset($data->$field) || !$data->$field) {
                    throw new MissingParamError($field);
                }
            }

            $isValid = $this->emailValidator->isValid($data->email);
            if (!$isValid) {
                throw new InvalidParamError('email');
            }

            //         Sucesso
            return [
                'statusCode' => 200,
                'boody' => 'Sucesso'
            ];
        } catch (Exception $error) {
            return [
                'statusCode' => $error->getCode(),
                'body' => $error->getMessage()
            ];
        }
    }
}
