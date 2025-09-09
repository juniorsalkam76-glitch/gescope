<?php

namespace App\DataFixtures;

use App\Entity\Intervention;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InterventionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $intervention = new Intervention();
            $intervention->setReference('REF-' . str_pad($i, 3, '0', STR_PAD_LEFT));
            $intervention->setNomClient('ClientNom' . $i);
            $intervention->setPrenomClient('ClientPrenom' . $i);
            $intervention->setAdresseClient('123 Rue Exemple ' . $i . ', Ville');
            $intervention->setTelephoneClient('06000000' . $i);
            $intervention->setEmailClient('client' . $i . '@exemple.com');
            $intervention->setDescription('Description de l\'intervention n°' . $i);
            $intervention->setDateIntervention(new \DateTime(sprintf('+%d days', $i)));
            $intervention->setEtat($i % 2 === 0 ? 'En cours' : 'Terminée');
            $intervention->setTechnicien('Technicien ' . $i);

            $manager->persist($intervention);
        }

        $manager->flush();
    }
}
