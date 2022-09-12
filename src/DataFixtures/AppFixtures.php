<?php

namespace App\DataFixtures;

use App\Entity\Hobby;
use App\Entity\HobbyAdditionalInfo;
use App\Entity\HobbyCategory;
use App\Entity\HobbyFamily;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        /* HobbyFamily fixtures */

        $hobbyFamily = new HobbyFamily();
        $hobbyFamily->setName('Sport');
        $this->addReference('sport', $hobbyFamily);
        $manager->persist($hobbyFamily);
        $hobbyFamily = new HobbyFamily();
        $hobbyFamily->setName('Art');
        $manager->persist($hobbyFamily);
        $hobbyFamily = new HobbyFamily();
        $hobbyFamily->setName('Learning');
        $manager->persist($hobbyFamily);
        $hobbyFamily = new HobbyFamily();
        $hobbyFamily->setName('Culture');
        $manager->persist($hobbyFamily);

        /* HobbyCategory fixtures */

        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('American Football');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Baseball');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Boxing');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Darts');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Golf');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Karate');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Archery');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Basketball');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Climbing');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Fencing');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Gymnastics');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Kickboxing');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Badminton');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Bowling');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Cycling');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Football - Soccer');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Judo');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Rugby');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Skiing');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Surfing');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Taekwondo');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Volleyball');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Swimming');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Tennis');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Table Tennis');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $this->addReference('table-tennis', $hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Roller');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Running');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);
        $hobbyCategory = new HobbyCategory();
        $hobbyCategory->setName('Skating');
        $hobbyCategory->setHobbyFamilies($this->getReference('sport'));
        $manager->persist($hobbyCategory);

        /* Hobby fixtures */

        $additionnalInfo1 = new HobbyAdditionalInfo();
        $additionnalInfo2 = new HobbyAdditionalInfo();

        $hobby = new Hobby();
        $hobby->setName('Sincheon Table Tennis');
        $hobby->setHangeulName('신촌탁구');
        $hobby->setPhoneNb('02-714-0505');
        $hobby->setWebsite('');
        $hobby->setGpsCoordinates('37.555552, -233.060891');
        $hobby->setAddress('서울 마포구 신촌로 118-1');
        $hobby->setSchedule('8:00 - 23:00');
        $hobby->setFrequency('Everyday');
        $hobby->setPrice(15000);
        $hobby->setPriceFor('1 table 1 hour');
        $hobby->addHobbyCategory($this->getReference( 'table-tennis'));
        $hobby->addAdditionalInfo($additionnalInfo1->setInfo('Rackets provided'));
        $hobby->addAdditionalInfo($additionnalInfo2->setInfo('Individual training'));
        $manager->persist($hobby);

        $hobby = new Hobby();
        $hobby->setName('Mapo Love Table Tennis Club');
        $hobby->setHangeulName('마포사랑탁구클럽');
        $hobby->setPhoneNb('02-703-6476');
        $hobby->setWebsite('https://cafe.daum.net/mapotak');
        $hobby->setGpsCoordinates('37.54667, -233.065534');
        $hobby->setAddress('서울 마포구 신촌로 118-1');
        $hobby->setSchedule('13:00 - 23:00');
        $hobby->setFrequency('Monday - Friday');
        $hobby->setPrice(80000);
        $hobby->setPriceFor('per month');
        $hobby->addHobbyCategory($this->getReference( 'table-tennis'));
        $manager->persist($hobby);

        $hobby = new Hobby();
        $hobby->setName('Energy Table Tennis Club');
        $hobby->setHangeulName('에너지탁구클럽');
        $hobby->setPhoneNb('02-3144-8749');
        $hobby->setWebsite('');
        $hobby->setGpsCoordinates('37.557732, -233.092571');
        $hobby->setAddress('서울 마포구 망원로 96');
        $hobby->setSchedule('');
        $hobby->setFrequency('');
        //$hobby->setPrice(null);
        $hobby->setPriceFor('');
        $hobby->addHobbyCategory($this->getReference( 'table-tennis'));
        $manager->persist($hobby);

        $hobby = new Hobby();
        $hobby->setName('High Table Tennis Room');
        $hobby->setHangeulName('하이탁구장');
        $hobby->setPhoneNb('02-3143-3337');
        $hobby->setWebsite('');
        $hobby->setGpsCoordinates('37.549537, -233.080584');
        $hobby->setAddress('서울 마포구 망원로 96');
        $hobby->setSchedule('12:00 - 22:30');
        $hobby->setFrequency('Everyday');
        $hobby->setPrice(70000);
        $hobby->setPriceFor('per month');
        $hobby->addHobbyCategory($this->getReference( 'table-tennis'));
        $manager->persist($hobby);

        /* User fixtures */

        $user = new Users();
        $user->setEmail('paul.dupont@gmail.com');
        $password = $this->hasher->hashPassword($user, 'password');
        $user->setPassword($password);
        $user->setUsername('PingPongMan');
        $user->setIsVerified(true);
        $manager->persist($user);

        $manager->flush();
    }
}
