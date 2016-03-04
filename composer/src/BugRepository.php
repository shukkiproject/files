<?php 

use Doctrine\ORM\EntityRepository;

class BugRepository extends EntityRepository{

	public function getAllbyEngineer(User $engineer)
	{
		return $this->createQueryBuilder('b')
		//->addSelect (plusieur select)
		->where('b.engineer = :engineer')
		->setParameter(':engineer', $engineer)
		->getQuery()
		->getResult();



	}
}



 ?>