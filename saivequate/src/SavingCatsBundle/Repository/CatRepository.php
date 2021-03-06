<?php

namespace SavingCatsBundle\Repository;

/**
 * CatRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CatRepository extends \Doctrine\ORM\EntityRepository
{
	public function findAllAsc(){

			return $this->createQueryBuilder('cat')
		->orderBy('cat.availability', 'ASC')
		->getQuery()
		->getResult();
	}
}
