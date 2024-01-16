<?php

namespace App\Enums;

enum Category: int
{
    case Ahorro = 1;
    case Comida = 2;
    case Casa = 3;
    case Gastos = 4;
    case Ocio = 5;
    case Salud = 6;
    case Suscripciones = 7;

    public function text(): string
    {
        return match ($this) {
            self::Ahorro => 'Ahorro',
            self::Comida => 'Comida',
            self::Casa => 'Casa',
            self::Gastos => 'Gastos',
            self::Ocio => 'Ocio',
            self::Salud => 'Salud',
            self::Suscripciones => 'Suscripciones',
        };
    }

    public static function asArray(): array
    {
        return [
            self::Ahorro->value => self::Ahorro->text(),
            self::Comida->value => self::Comida->text(),
            self::Casa->value => self::Casa->text(),
            self::Gastos->value => self::Gastos->text(),
            self::Ocio->value => self::Ocio->text(),
            self::Salud->value => self::Salud->text(),
            self::Suscripciones->value => self::Suscripciones->text(),
        ];
    }
}
