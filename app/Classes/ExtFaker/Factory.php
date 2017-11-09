<?php

namespace App\Classes\ExtFaker;

use Faker\Factory as BaseFakerFactory;

class Factory extends BaseFakerFactory
{

    /**
     * @param string $provider
     * @param string $locale
     * @return string
     */
    protected static function getProviderClassname($provider, $locale = '')
    {
        // ext fallback to no locale
        if ($providerClass = self::extFindProviderClassname($provider)) {
            return $providerClass;
        }

        if ($providerClass = self::findProviderClassname($provider, $locale)) {
            return $providerClass;
        }

        // fallback to default locale
        if ($providerClass = self::findProviderClassname($provider, static::DEFAULT_LOCALE)) {
            return $providerClass;
        }
        // fallback to no locale
        if ($providerClass = self::findProviderClassname($provider)) {
            return $providerClass;
        }

        throw new \InvalidArgumentException(
            sprintf(
                'Unable to find provider "%s" with locale "%s"',
                $provider,
                $locale
            )
        );
    }

    /**
     * @param string $provider
     * @param string $locale
     * @return string
     */
    protected static function extFindProviderClassname($provider, $locale = '')
    {
        $providerClass =
            'App\\Classes\\ExtFaker\\' .
            (
                $locale ?
                sprintf('Provider\%s\%s', $locale, $provider) :
                sprintf('Provider\%s', $provider)
            );
        if (class_exists($providerClass, true)) {
            return $providerClass;
        }
    }
}
