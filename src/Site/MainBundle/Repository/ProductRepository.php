<?php

namespace Site\MainBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{
    public function findAll()
    {
        return $this->findBy(array(), array('position' => 'asc'));
    }

    public function findByStyle($filter = "all", $category = null)
    {
        $em = $this->getEntityManager();

        if($filter != 'all'){
            $style = $em->getRepository('SiteMainBundle:StyleGallery')->findOneBySlug($filter);
            $query = $em->createQuery('
                SELECT p FROM SiteMainBundle:Product p
                LEFT JOIN p.category cat
                LEFT JOIN p.style style
                WHERE cat =:category AND style =:style
                ORDER BY p.position ASC
            ')
            ->setParameters(
                array(
                    'category' => $category,
                    'style' => $style
                )
            );
        }else{
            $query = $em->createQuery('
                SELECT p FROM SiteMainBundle:Product p
                LEFT JOIN p.category cat
                WHERE cat =:category
                ORDER BY p.position ASC
            ')
                ->setParameters(
                    array(
                        'category' => $category
                    )
                );
        }

        return $query->getResult();
    }
}
