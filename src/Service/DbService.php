<?php

namespace App\Service;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Books;




class DbService extends AbstractController{

	public function createTable(){
		$em = $this->getDoctrine()->getManager();
		try{

		$sql=$em->getConnection()->executeQuery("

				CREATE TABLE IF NOT EXISTS `books`   (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `book_name` varchar(25) NOT NULL,
				  `book_publisher` varchar(20) NULL DEFAULT NULL,
				  `book_price` float NULL DEFAULT NULL,
				  PRIMARY KEY (`id`)
				);
			");
			return "Table created Successfully.";
		}catch(Excption $e){
			return "Table created fail.";
		}	
	}

    public function insert($name='',$publisher='',$price=0){

 			 
        $em = $this->getDoctrine()->getManager();
        $res=$em->getConnection()->executeQuery(" 			 	
            INSERT INTO `books`(`book_name`, `book_publisher`, `book_price`) VALUES ('{$name}', '{$publisher}', {$price})
      ");

        return "Insert success.";

  
  
}

    public function getdata(){

            
            
            $res = $this->getDoctrine()->getRepository(Books::class)->findAll();
        return $res;
    
    }

}