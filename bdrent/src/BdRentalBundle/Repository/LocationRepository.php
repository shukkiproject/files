<?php

namespace BdRentalBundle\Repository;

/**
 * LocationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LocationRepository extends \Doctrine\ORM\EntityRepository
{
		public function getAllDetails(){
		//select * from location inner join BD on 
		return $this->createQueryBuilder('location')
		->leftJoin('location.membre', 'm')
		->leftJoin('location.bds', 'bd')
		->getQuery()
		->getResult();
	}


}
