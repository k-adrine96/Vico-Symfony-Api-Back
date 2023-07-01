<?php

namespace App\Factory;

use App\Entity\Vico;
use App\Repository\VicoRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Vico>
 *
 * @method        Vico|Proxy                     create(array|callable $attributes = [])
 * @method static Vico|Proxy                     createOne(array $attributes = [])
 * @method static Vico|Proxy                     find(object|array|mixed $criteria)
 * @method static Vico|Proxy                     findOrCreate(array $attributes)
 * @method static Vico|Proxy                     first(string $sortedField = 'id')
 * @method static Vico|Proxy                     last(string $sortedField = 'id')
 * @method static Vico|Proxy                     random(array $attributes = [])
 * @method static Vico|Proxy                     randomOrCreate(array $attributes = [])
 * @method static VicoRepository|RepositoryProxy repository()
 * @method static Vico[]|Proxy[]                 all()
 * @method static Vico[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Vico[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Vico[]|Proxy[]                 findBy(array $attributes)
 * @method static Vico[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Vico[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class VicoFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        $faker = self::faker();
        return [
            'created_at' => \DateTimeImmutable::createFromMutable($faker->dateTime()),
            'name' => $faker->word(3),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Vico $vico): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Vico::class;
    }
}
