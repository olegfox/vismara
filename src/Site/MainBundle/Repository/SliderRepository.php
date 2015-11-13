<?php

namespace Site\MainBundle\Repository;

use Doctrine\ORM\EntityRepository;

class SliderRepository extends EntityRepository
{
    public function findByLang($lang)
    {
        $langNumber = 0;

        switch($lang){
            case 'en':{
                $langNumber = 0;
            }break;
            case 'it':{
                $langNumber = 1;
            }break;
            case 'ru':{
                $langNumber = 2;
            }break;
            case 'cn':{
                $langNumber = 3;
            }break;
        }

        return $this->getEntityManager()->createQuery('
          SELECT s FROM Site\MainBundle\Entity\Slider s
          WHERE s.lang = :lang OR s.lang = 4
          ORDER BY s.position ASC
        ')
            ->setParameter('lang', $langNumber)
            ->getResult();

//        return $this->findBy(array('lang' => $langNumber), array('position' => 'ASC'));
    }
}
