<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCategoryData extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setName('Sport');
        $category->setIcon('sport');
        $this->setReference('category_sport', $category);
        $manager->persist($category);

        $category = new Category();
        $category->setName('Kultur');
        $category->setIcon('kultur');
        $this->setReference('category_kultur', $category);
        $manager->persist($category);

        $manager->flush();
    }
}
