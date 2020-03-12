<?php

declare(strict_types=1);

namespace KW13\presentation\controllers;

use PHPUnit\Framework\TestCase;
use ProtocolsPresentation\EmailValidator;

class SignUpControllerTest extends TestCase
{
    private array $httpRequest;

    private function makeSut(): array
    {
        $emailValidatorStub = $this->createStub(EmailValidator::class);
        $emailValidatorStub->method('isValid')->willReturn(true);
        return [
            'signController' => new SignUpController($emailValidatorStub),
            'emailValidatorStub' => $emailValidatorStub
        ];
    }


    public function testShouldReturn500IfHttpRequestNoBodyProvided(): void
    {
        $sut = (object) $this->makeSut();
        $this->httpRequest = [];

        $httpResponse = (object) $sut->signController->handle($this->httpRequest);

        $this->assertEquals(
            500,
            $httpResponse->statusCode
        );
        $this->assertEquals('Missing index error: body', $httpResponse->body);
    }

    public function testShouldReturn4ooIfNoNameIsProvided(): void
    {
        //         $sut = é a classe  que estamos testando
        $sut = (object) $this->makeSut();
        $this->httpRequest = [
            'body' => [
                'email' => 'any_email@mail.com',
                'password' => 'any_password',
                'passwordConfirmation' => 'any_password'
            ]
        ];

        $httpResponse = (object) $sut->signController->handle($this->httpRequest);
        $this->assertEquals(400, $httpResponse->statusCode);
        $this->assertEquals('Missing param error: name', $httpResponse->body);
    }

    public function testShouldReturn4ooIfNoEmailIsProvided(): void
    {
        //         $sut = é a classe  que estamos testando
        $sut = (object) $this->makeSut();
        $httpRequest = [
            'body' => [
                'name' => 'any_name',
                'password' => 'any_password',
                'passwordConfirmation' => 'any_password'
            ]
        ];

        $httpResponse = (object) $sut->signController->handle($httpRequest);

        $this->assertEquals(400, $httpResponse->statusCode);
        $this->assertEquals('Missing param error: email', $httpResponse->body);
    }

    public function testShouldReturn4ooIfNoPasswordIsProvided(): void
    {
        //         $sut = é a classe  que estamos testando
        $sut = (object) $this->makeSut();
        $httpRequest = [
            'body' => [
                'name' => 'any_name',
                'email' => 'any_email',
                'passwordConfirmation' => 'any_password'
            ]
        ];

        $httpResponse = (object) $sut->signController->handle($httpRequest);

        $this->assertEquals(400, $httpResponse->statusCode);
        $this->assertEquals('Missing param error: password', $httpResponse->body);
    }

    public function testShouldReturn4ooIfNopasswordConfirmationIsProvided(): void
    {
        //         $sut = é a classe  que estamos testando
        $sut = (object) $this->makeSut();
        $httpRequest = [
            'body' => [
                'name' => 'any_name',
                'email' => 'any_email',
                'password' => 'any_password'
            ]
        ];

        $httpResponse = (object) $sut->signController->handle($httpRequest);

        $this->assertEquals(400, $httpResponse->statusCode);
        $this->assertEquals('Missing param error: passwordConfirmation', $httpResponse->body);
    }

    public function testShouldReturn4ooIfAnInvalidEmailIsProvided(): void
    {
        $emailValidatorStub = $this->createStub(EmailValidator::class);
        $emailValidatorStub->method('isValid')->willReturn(false);

        $signUpController = new SignUpController($emailValidatorStub);

        $httpRequest = [
            'body' => [
                'name' => 'any_name',
                'email' => 'any_email',
                'password' => 'any_password',
                'passwordConfirmation' => 'any_password'
            ]
        ];

        $httpResponse = (object) $signUpController->handle($httpRequest);

        $this->assertEquals(400, $httpResponse->statusCode);
        $this->assertEquals('Invalid param error: email', $httpResponse->body);
    }

    public function testShouldReturn200IfSuccess(): void
    {
        //         $sut = é a classe  que estamos testando
        $sut = (object) $this->makeSut();
        $httpRequest = [
            'body' => [
                'name' => 'any_name',
                'email' => 'any_email@mail.com',
                'password' => 'any_password',
                'passwordConfirmation' => 'any_password'
            ]
        ];

        $httpResponse = (object) $sut->signController->handle($httpRequest);
        $this->assertEquals(200, $httpResponse->statusCode);
    }
}
