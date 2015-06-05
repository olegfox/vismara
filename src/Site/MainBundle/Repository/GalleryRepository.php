<?php

namespace Site\MainBundle\Repository;

use Doctrine\ORM\EntityRepository;

class GalleryRepository extends EntityRepository
{
    public function findByStyle($filter = "all", $category = null)
    {
        $em = $this->getEntityManager();

        if($filter != 'all'){
            $style = $em->getRepository('SiteMainBundle:StyleGallery')->findOneBySlug($filter);
            $query = $em->createQuery('
                SELECT g FROM SiteMainBundle:Gallery g
                LEFT JOIN g.category cat
                LEFT JOIN g.style style
                WHERE cat =:category AND style =:style
                ORDER BY g.position ASC
            ')
            ->setParameters(
                array(
                    'category' => $category,
                    'style' => $style
                )
            );
        }else{
            $query = $em->createQuery('
                SELECT g FROM SiteMainBundle:Gallery g
                LEFT JOIN g.category cat
                WHERE cat =:category
                ORDER BY g.position ASC
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
