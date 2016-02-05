<?php 
namespace Repository;


class PostRepository extends \Doctrine\ORM\EntityRepository{
	public function searchPost($subject){

		return $this
			->createQueryBuilder('p') //p est un alias et select et from ne sont plus nécessaires
			->where('p.subject LIKE :identifier')//:identifier est un placeholder
			->orderBy('p.date', 'DESC')
			->setParameter('identifier', '%'.$subject.'%') //placeholder puis variable. Mettre les % dans le setParameter
			->getQuery()//renvoie un tableau d'objets post mais non instanciés
			->getResult()//renvoie un tableau d'entités d'instances de post
		;
	}


}