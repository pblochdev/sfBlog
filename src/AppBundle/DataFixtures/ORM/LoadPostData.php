<?php 

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Post;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPostData implements FixtureInterface
{
	
    public function load(ObjectManager $manager)
    {
		$faker = \Faker\Factory::create();
		
		for ($i=0; $i< 1000; $i++) {
			$post = new Post();
			$post->setTitle($faker->title(3));
			$post->setLead($faker->sentence(200));
			$post->setContent($faker->text(900));
			$post->setCreatedAt($faker->dateTime);
			
			$manager->persist($post);
		}
		
		$manager->flush();
    }
}