<?php
namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;
use AppBundle\Entity\Reef;
class LoadReefs implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $filename = __DIR__ . '/../../../../data/reefs.yml';
        $yml = Yaml::parse(file_get_contents($filename));
        foreach ($yml as $item) {
            $reef = new Reef();
            $reef->setName($item['name']);
            $reef->setLength($item['area']);
            $manager->persist($reef);
        }
        $manager->flush();
    }
}