<?php


namespace App\Shared\Domain\ValueObject;

use Symfony\Component\Uid\UuidV4;
use Symfony\Component\Uid\NilUuid;

class UuidProvider
{
    public function __construct(private string $value)
    {
        $this->verify($value);
    }

    public static function generate(): self
    {
        return new static(UuidV4::v4()->toRfc4122());
    }

    public function value(): string
    {
        return $this->value;
    }

    private function verify(string $id): void
    {
        if(!($id instanceof NilUuid)) {
            var_dump("el uuid es null");
        }
    }
}