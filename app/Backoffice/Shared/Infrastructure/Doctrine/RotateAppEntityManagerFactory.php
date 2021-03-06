<?php


namespace RotateApp\Backoffice\Shared\Infrastructure\Doctrine;


use Doctrine\ORM\EntityManagerInterface;

final class RotateAppEntityManagerFactory
{
    private const SCHEMA_PATH = __DIR__ . '/../../../../../etc/databases/mooc.sql';

    public static function create(array $parameters, string $environment): EntityManagerInterface
    {
        $isDevMode = 'prod' !== $environment;

        $prefixes = array_merge(
            DoctrinePrefixesSearcher::inPath(__DIR__ . '/../../../../Backoffice', 'RotateApp\Backoffice')
        );

        $dbalCustomTypesClasses = [];

        return DoctrineEntityManagerFactory::create(
            $parameters,
            $prefixes,
            $isDevMode,
            self::SCHEMA_PATH,
            $dbalCustomTypesClasses
        );
    }
}
