<?php


namespace App\User\Domain;


class User
{
    private Uuid $id;
    private Email $email;
    private Password $password;
}