<?php
class product {
	private $product_name = ""; /**/
	private $product_description = NULL;
	private $product_price = "Undefined";
	private $product_picture_url = NULL;
	private $product_creation_date = NULL;
	private $product_id = NULL; /*Auto increment, required*/

	private $product_category = array();


	/*global call*/
	function get_product(){

	}


	function set_product($name ="",$price="",$description=""){
			
			$bdd = Database::connect();

			$dat = $this->set_product_creation_date();
			//echo $dat;

			//var_dump($description).PHP_EOL;
			//var_dump($name).PHP_EOL;

			if ($name == "")
			{
				$name = $this->get_product_default_name();
			}

			$req = $bdd->prepare('INSERT INTO products(name,price,description,edit_time) VALUES (:name,:price,:description,:edit_time)');
				$req->execute(array(
					'name' => $name,
					'price' => $price,
					'description' => $description,
					'edit_time' => $dat
			));	

	}


	/*SETTERS*/


	/*Fonctions absolutely required*/

	/*Set and get product ID !!!! OPTIONAL*/



	function get_product_id(){
		/*When a new product is added, name should be stored in the DB*/
		/*écrire le product name*/
		return $this->product_id;
	}

	/*Set product default name !!!! IMPORTANT*/

	function set_product_default_number(){
		/*When a new product is added, name should be stored in the DB*/
		/*write product name*/
		/*requête, voir après si on peut les mettre ailleurs*/
		$bdd = Database::connect();
		$req = $bdd->query('SELECT name FROM products');
		$donnees = $req->fetchAll();
		/*$this->product_name = $this->set_product_name("Undefined n° ".$req);*/
		$undefined = 2;
		$number = count($donnees);
		foreach ($donnees as $value) {
		    foreach ($value as $name) {
		    	if (substr_count($name, "Undefined n°") == 1){
		    		$undefined++;
		    	}
			}
		}
		$current_default = $undefined/2;
		return $current_default;
	}

	function get_product_default_name(){
		/*When a new product is added, name should be stored in the DB*/
		/*write product name*/
		$number = $this->set_product_default_number();
		return "Undefined n°$number";
	}

	/*Au point où on en est, on récupère aussi la date*/
	function set_product_creation_date(){
		// Change the line below to your timezone!
		$date = date('m/d/Y h:i:s a', time());
		return $date;
	}
	/*-----------
	-----------*/



	function get_undefined(){

	/*	$counter = $bdd->query('SELECT COUNT(id) FROM producdonnees WHERE name = NULL');
		
		if (get_product_name()!==NULL))
		{
				
				return $counter;
				echo $counter.PHP_EOL;
		}
		else
		{
				return 0;
				echo "0".PHP_EOL;
		}*/
	}



	/*Fonctions de personnalisation. Si pas appelées, le produit prendra une valeur par défaut*/

	/*Set product name*/
	function set_product_name($name = ""){
		/*When a new product is added, name should be stored in the DB*/
		/*écrire le product name*/
		$this->product_name = $name;
	}

	function get_product_name(){
		return $this->product_name;
	}

	function set_product_description($description){
		/*When a new product is added, description should be stored in the DB*/
		$this->product_description = $description;
	}

	function set_product_price($price){
		/*When a new product is added, price should be stored in the DB*/
		$this->product_price = $price;
	}

	function set_product_picture_url(){
		/*When a new product is added, image URL should be stored in the DB*/
		/*Adds a nex folder for each new starting month and updates the image URL*/
		if(isset($_FILES['image']))
		{ 
			echo "condition REACHED";
		     $dossier = '../uploads/';
		     $fichier = basename($_FILES['image']['name']);
		     if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		     {
		          echo 'Upload effectué avec succès !';
		     }
		     else //Sinon (la fonction renvoie FALSE).
		     {
		          echo 'Echec de l\'upload !';
		     }
		}
		return "image_function REACHED";
	}



	function set_product_category(){
		/*new $arra = array('' => , );*/
	}

	/*Constructeur*/

	function __construct($name,$price,$description){
		$this->set_product($name,$price,$description);
		echo "construct OK".PHP_EOL ;
	}


	/*----Create----*/


	/*Create product*/
	function update_product(){
		/*When a new product is added, name should be stored in the DB*/
		/*écrire le product name*/
	}
	/**/

	/*Create product*/
	function delete_product(){
		/*When a new product is added, name should be stored in the DB*/
		/*écrire le product name*/
	}
	/**/







}
