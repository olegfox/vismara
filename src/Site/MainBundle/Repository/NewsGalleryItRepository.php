<?php

namespace Site\MainBundle\Repository;

use Doctrine\ORM\EntityRepository;

class NewsGalleryItRepository extends EntityRepository
{
    public function findAll()
    {
        return $this->findBy(array(), array('created' => 'DESC'));
    }
}
