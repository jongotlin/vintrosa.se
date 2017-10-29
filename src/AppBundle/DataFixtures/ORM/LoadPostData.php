<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Post;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPostData extends AbstractFixture implements DependentFixtureInterface
{
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
        $post->setCategory($this->getReference('category_sport'));
        $post->setBody('...');
        $post->setCreatedBy('Jon');
        $post->setCreatedByEmail('jon@jon.se');
        $post->setPublishedAt(new \DateTime());
        $manager->persist($post);

        $manager->flush();
    }
}
