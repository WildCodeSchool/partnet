<?php
namespace GedBundle\Entity;
/**
 * DocumentsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DocumentsRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByOld()
    {
        $queryBuilder = $this->_em->createQueryBuilder()
            ->select('d')
            ->from($this->_entityName, 'd')// Dans un repository, $this->_entityName est le namespace de l'entité gérée
            ->Where('d.finDeVie <= :now')
            ->setParameter('now', new \DateTime('now'));
        return $queryBuilder->getQuery()->getResult();
    }
}