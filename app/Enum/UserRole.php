<?php

namespace App\Enum;

enum UserRole: int
{
    case Admin = 1;
    case Maintainer = 2;
    case User = 3;

    /**
     * Get the value of the enum case.
     *
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * Static accessors for enum cases.
     */
    public static function ADMIN(): self
    {
        return self::Admin;
    }

    public static function MAINTAINER(): self
    {
        return self::Maintainer;
    }

    public static function USER(): self
    {
        return self::User;
    }

    /**
     * Get all roles as key => value pairs.
     *
     * @return array<string,int>
     */
    public static function all(): array
    {
        return [
            'admin' => self::Admin->getValue(),
            'maintainer' => self::Maintainer->getValue(),
            'user' => self::User->getValue(),
        ];
    }

    /**
     * Get the numeric role value for a given key.
     *
     * @param string $key
     * @return int|null
     */
    public static function getValueByKey(string $key): ?int
    {
        return self::all()[$key] ?? null;
    }
}
