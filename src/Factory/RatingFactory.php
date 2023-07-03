<?php

namespace App\Factory;

use App\Entity\Rating;
use App\Repository\RatingRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Rating>
 *
 * @method        Rating|Proxy                     create(array|callable $attributes = [])
 * @method static Rating|Proxy                     createOne(array $attributes = [])
 * @method static Rating|Proxy                     find(object|array|mixed $criteria)
 * @method static Rating|Proxy                     findOrCreate(array $attributes)
 * @method static Rating|Proxy                     first(string $sortedField = 'id')
 * @method static Rating|Proxy                     last(string $sortedField = 'id')
 * @method static Rating|Proxy                     random(array $attributes = [])
 * @method static Rating|Proxy                     randomOrCreate(array $attributes = [])
 * @method static RatingRepository|RepositoryProxy repository()
 * @method static Rating[]|Proxy[]                 all()
 * @method static Rating[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Rating[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Rating[]|Proxy[]                 findBy(array $attributes)
 * @method static Rating[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Rating[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class RatingFactory extends ModelFactory
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
            'communication_rate' => $faker->numberBetween(0,5),
            'created_at' => \DateTimeImmutable::createFromMutable($faker->dateTime()),
            'money_value_rate' => $faker->numberBetween(0,5),
            'overall_satisfication_rate' => $faker->numberBetween(1,5),
            // 'project_id' => ProjectFactory::random(),
            'review_text' => $faker->text(1000),
            'work_quality_rate' => $faker->numberBetween(0,5),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Rating $rating): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Rating::class;
    }
}
