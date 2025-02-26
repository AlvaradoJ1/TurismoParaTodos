<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Lang;

class LangHelper
{
    /**
     * Obtiene una traducción según el idioma actual.
     *
     * @param string $key La clave de traducción.
     * @param array $replace Datos para reemplazar en la traducción.
     * @param string $locale El idioma deseado (opcional).
     * @return string
     */
    public static function get(string $key, array $replace = [], string $locale = null): string
    {
        return Lang::get($key, $replace, $locale);
    }

    /**
     * Obtiene una traducción para un idioma específico.
     *
     * @param string $locale El idioma deseado.
     * @param string $key La clave de traducción.
     * @param array $replace Datos para reemplazar en la traducción.
     * @return string
     */
    public static function getForLocale(string $locale, string $key, array $replace = []): string
    {
        return Lang::get($key, $replace, $locale);
    }

    /**
     * Verifica si existe una traducción para una clave dada.
     *
     * @param string $key La clave de traducción.
     * @param string|null $locale El idioma deseado (opcional).
     * @return bool
     */
    public static function has(string $key, string $locale = null): bool
    {
        return Lang::has($key, $locale);
    }

    /**
     * Cambia el idioma actual de la aplicación.
     *
     * @param string $locale El idioma deseado.
     */
    public static function setLocale(string $locale): void
    {
        app()->setLocale($locale);
    }

    /**
     * Obtiene el idioma actual de la aplicación.
     *
     * @return string
     */
    public static function getLocale(): string
    {
        return app()->getLocale();
    }
}