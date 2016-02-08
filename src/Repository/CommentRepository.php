<?php 
namespace Repository;

class CommentRepository extends \Doctrine\ORM\EntityRepository{
}
	//function to get comments related to one post:
	public function RelatedComments($id){

		return $this
			->createQueryBuilder('c') 
			->where('c.post_id = :identifier')	
			->orderBy('c.date', 'DESC')	
			->setParameter('identifier', $id)
			->getQuery()
			->getResult()
		;
	}

?>