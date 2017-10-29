<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Post;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gedmo\Timestampable\TimestampableListener;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadPostData extends AbstractFixture implements DependentFixtureInterface, ContainerAwareInterface
{
    /**
     * @var
     */
    private $container;

    /**
     * @param ContainerInterface|null $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function getDependencies()
    {
        return [
            LoadCategoryData::class,
        ];
    }

    public function load(ObjectManager $manager)
    {
        $post = new Post();
        $post->setDate(new \DateTime());
        $post->setTitle('Handboll');
        $post->addCategory($this->getReference('category_sport'));
        $post->addCategory($this->getReference('category_kultur'));
        $post->setBody("Vintrosa F07/08 spelar mot Järnvägen HK\nKiosken är öppen!");
        $post->setCreatedBy('Jon');
        $post->setCreatedByEmail('jon@jon.se');
        $post->setPublishedAt(new \DateTime());
        $post->setUrl('http://www.jon.se');
        $manager->persist($post);

        $post = new Post();
        $date = new \DateTime();
        $date->modify('25 days');
        $date->setTime(14, 0, 0);

        $to = clone $date;
        $to->setTime(15, 0, 0);
        $post->setDate($date);
        $post->setFromDate($date);
        $post->setToDate($to);
        $post->setTitle('Handboll');
        $post->addCategory($this->getReference('category_sport'));
        $post->setBody('...');
        $post->setCreatedBy('Jon');
        $post->setCreatedByEmail('jon@jon.se');
        $post->setPublishedAt(new \DateTime());
        $manager->persist($post);

        $post = new Post();
        $date = new \DateTime();
        $date->modify('26 days');
        $post->setDate($date);
        $post->setTitle('Handboll');
        $post->addCategory($this->getReference('category_sport'));
        $post->setBody('...');
        $post->setCreatedBy('Jon');
        $post->setCreatedByEmail('jon@jon.se');
        $post->setPublishedAt(new \DateTime());
        $manager->persist($post);

        $post = new Post();
        $date = new \DateTime();
        $date->modify('-40 days');
        $post->setDate($date);
        $post->setTitle('Handboll');
        $post->addCategory($this->getReference('category_sport'));
        $post->setBody('...');
        $post->setCreatedBy('Jon');
        $post->setCreatedByEmail('jon@jon.se');
        $post->setPublishedAt(new \DateTime());
        $manager->persist($post);

        $post = new Post();
        $date = new \DateTime();
        $date->modify('+400 days');
        $post->setDate($date);
        $post->setTitle('Handboll');
        $post->addCategory($this->getReference('category_sport'));
        $post->setBody('...');
        $post->setCreatedBy('Jon');
        $post->setCreatedByEmail('jon@jon.se');
        $post->setPublishedAt(new \DateTime());
        $manager->persist($post);

        $manager->flush();
    }
}
