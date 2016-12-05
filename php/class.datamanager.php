<?php
$source = 'mysql:host=localhost;dbname=website';
$user = 'root';
$password = 'Tinnioglisa12';
try{
	$pdo = new PDO($source, $user, $password);

	$pdo->exec('SET NAMES "utf8"');
}
catch (PDOexception $e){
	echo 'tenging mistókst: ' . $e->getMessage();
}
	/**
		 * @name: DatabaseManager
		 * @role:  manages all database transactions in PictureBase
		 * @version:  1.0.0
		 * @author:  Sigurður R Ragnarsson
		 * @since:	 22.01.2015
		 * @system:  VEF2A3U - Tækniskólinn
		 */
	class DatabaseManager
	{
		private $connection;
		
		/**
		 * The class Constructor
		 *
		 * @param string  server
		 * @param string  database
		 * @param string  user
		 * @param string  password
		 *
		 * @usage example  $db_man = new DatabaseManager('127.0.0.1','PictureBase','johndoe','12345');
		 */
		public function __construct($server,$database,$user,$password)
		{
			try
			{
				$this->connection = new PDO("mysql:host=$server;dbname=$database", $user, $password);
			}
			catch (PDOException $e)
			{
				die();
			}
		}
		
		/**
		*	@function name:  newUser
		*
		*	This function inserts a new user in the database. It 
		*	returns true if the operation succeded  or false if it didn't
		*
		* @usage example:  $db_object->newUser('John',Doe','jd@fakemail.ru','jodo','12345');
		*
		* @param  string	first_name
		* @param  string	last_name
		* @param  string	user_email
		* @param  string	user_name
		* @param  string	user_pass
		*
		* @returns boolean
		* @returns boolean
		*/
		public function newBokun($name,$phone,$email,$commentt)
		{
			$statement = $this->connection->prepare('call bokuntima(?,?,?,?)');
			$statement->bindParam(1,$name);
			$statement->bindParam(2,$phone);
			$statement->bindParam(3,$email);
			$statement->bindParam(4,$commentt);
			
			
			try 
			{
				$statement->execute();
				
				return true;
			}
			catch(PDOException $e)
			{
				return false;
			}
		}
		

public function newuser($name)
		{
			$statement = $this->connection->prepare('call newuser(?)');
			$statement->bindParam(1,$name);
		
			
			
			try 
			{
				$statement->execute();
				
				return true;
			}
			catch(PDOException $e)
			{
				return false;
			}
		}
public function newproduct($name,$dis)
		{
			$statement = $this->connection->prepare('call newproduct6(?,?)');
			$statement->bindParam(1,$name);
			$statement->bindParam(2,$dis);
			
		
			
			
			try 
			{
				$statement->execute();
				
				return true;
			}
			catch(PDOException $e)
			{
				return false;
			}
		}
public function newmessagechat2($message,$userid)
		{
			$statement = $this->connection->prepare('call newmessagechat2(?,?)');
			$statement->bindParam(1,$message);
			$statement->bindParam(2,$userid);
			
		
			
			
			try 
			{
				$statement->execute();
				
				return true;
			}
			catch(PDOException $e)
			{
				return false;
			}
		}
		public function createmessageuser()
		{
			$statement = $this->connection->prepare('call createmessageuser()');
			
			try 
			{
				$statement->execute();
				
				return true;
			}
			catch(PDOException $e)
			{
				return false;
			}
		}
public function getusermessage($visib)
		{
			$statement = $this->connection->prepare('call getusermessage(?)');
			$statement->bindParam(1,$visib);
			try 
			{
				$statement->execute();
				
				$row = $statement->fetch(PDO::FETCH_NUM);
				return $row;
			}
			catch(PDOException $e)
			{
				return array();
			}
		}
		public function getusermessagearray($userid)
		{
			$statement = $this->connection->prepare('call getusermessagearray(?)');
			$statement->bindParam(1,$userid);
			try 
			{
				$statement->execute();
				
				$row = $statement->fetch(PDO::FETCH_NUM);
				return $row;
			}
			catch(PDOException $e)
			{
				return array();
			}
		}



		
		public function getUser3($name,$password)
		{
			$statement = $this->connection->prepare('call GetUser3(?,?)');
			$statement->bindParam(1,$name);
			$statement->bindParam(2,$password);
			try 
			{
				$statement->execute();
				
				$row = $statement->fetch(PDO::FETCH_NUM);
				return $row;
			}
			catch(PDOException $e)
			{
				return array();
			}
		}

		public function getAdmin($userID)
		{
			$statement = $this->connection->prepare('call getAdmin(?)');
			$statement->bindParam(1,$userID);
			
			try 
			{
				$statement->execute();
				
				$row = $statement->fetch(PDO::FETCH_NUM);
				return $row;
			}
			catch(PDOException $e)
			{
				return array();
			}
		}

		public function getuserinfo($userID)
		{
			$statement = $this->connection->prepare('call getuserInfo(?)');
			$statement->bindParam(1,$userID);
			
			try 
			{
				$statement->execute();
				
				$row = $statement->fetch(PDO::FETCH_NUM);
				return $row;
			}
			catch(PDOException $e)
			{
				return array();
			}
		}
		public function checkproducts($name)
		{
			$statement = $this->connection->prepare('call checkproducts(?)');
			$statement->bindParam(1,$name);
			
			try 
			{
				$statement->execute();
				
				$row = $statement->fetch(PDO::FETCH_NUM);
				return $row;
			}
			catch(PDOException $e)
			{
				return array();
			}
		}

		public function getmessages3($id)
		{
			$statement = $this->connection->prepare('call getmessages3(?)');
			$statement->bindParam(1,$id);
			
		$arr = array();
				$statement->execute();
			try 
			{

				while ($row = $statement->fetch(PDO::FETCH_NUM)) 
				{
					array_push($arr,$row);
				}
				return $arr;
				
			}
			catch(PDOException $e)
			{
				return array();
			}
		}


		
		public function deleteUser($user)
		{
			$statement = $this->connection->prepare('call deleteuser(?)');
			$statement->bindParam(1,$user);
			
			try 
			{
				$statement->execute();
				
				return true;
			}
			catch(PDOException $e)
			{
				return false;
			}
		}

		public function getemployee($visibility)
		{
			$statement = $this->connection->prepare('call getemployee(?)');
			$statement->bindParam(1,$visibility);
			$arr = array();
				$statement->execute();
			try 
			{

				while ($row = $statement->fetch(PDO::FETCH_NUM)) 
				{
					array_push($arr,$row);
				}
				return $arr;
				
			}
			catch(PDOException $e)
			{
				return array();
			}
		}

		public function getproducts($visibility)
		{
			$statement = $this->connection->prepare('call products(?)');
			$statement->bindParam(1,$visibility);
			$arr = array();
				$statement->execute();
			try 
			{

				while ($row = $statement->fetch(PDO::FETCH_NUM)) 
				{
					array_push($arr,$row);
				}
				return $arr;
				
			}
			catch(PDOException $e)
			{
				return array();
			}
		}

		public function messagesadmin($visibility)
		{
			$statement = $this->connection->prepare('call messagesadmin(?)');
			$statement->bindParam(1,$visibility);
			$arr = array();
				$statement->execute();
			try 
			{

				while ($row = $statement->fetch(PDO::FETCH_NUM)) 
				{
					array_push($arr,$row);
				}
				return $arr;
				
			}
			catch(PDOException $e)
			{
				return array();
			}
		}

			public function messagesadminchats($visibility)
		{
			$statement = $this->connection->prepare('call messagesadminchats(?)');
			$statement->bindParam(1,$visibility);
			$arr = array();
				$statement->execute();
			try 
			{

				while ($row = $statement->fetch(PDO::FETCH_NUM)) 
				{
					array_push($arr,$row);
				}
				return $arr;
				
			}
			catch(PDOException $e)
			{
				return array();
			}
		}

		
		public function updateproductimg($name,$path)
		{
			$statement = $this->connection->prepare('call updateproduct(?,"productsimage/"?)');
			$statement->bindParam(1,$name);
			$statement->bindParam(2,$path);
			
			
			try 
			{
				$statement->execute();
				
				return true;
			}
			catch(PDOException $e)
			{
				return false;
			}
		}
		
	}




try {
	$sql = "select * from bokun order by date desc;";
	$result = $pdo ->query($sql);

} catch (Exception $e) {
	echo "Ekki tókst að ná í gögnin". "<br>" . $e->getMessage();
}

while($row = $result -> fetch()){
	$bokanir[] = array($row['id'], $row['nafn'], $row['phone'],$row['email'],$row['commentt'],$row['date']);
}

try {
	$sql2 = "select * from users";
	$result2 = $pdo ->query($sql2);

} catch (Exception $e) {
	echo "Ekki tókst að ná í gögnin". "<br>" . $e->getMessage();
}

while($row2 = $result2 -> fetch()){
	$userrow[] = array($row2['id'], $row2['Uname'], $row2['date']);
}
try {
	$sql3 = "select * from employee";
	$result3 = $pdo ->query($sql3);

} catch (Exception $e) {
	echo "Ekki tókst að ná í gögnin". "<br>" . $e->getMessage();
}

while($row3 = $result3 -> fetch()){
	$employeerow[] = array($row3['id'], $row3['Uname'], $row3['date']);
}





	/*

DELIMITER //
CREATE PROCEDURE newproduct5(in nname varchar(255), in ndes varchar(255))
BEGIN

INSERT INTO `products`( `nafn`, `description`, `image`) VALUES (nname,ndes);



end; 
 public function getbokun()
		{
			$statement = $this->connection->prepare('call getBokun()');			
			$arr = array();
				$statement->execute();
			try 
			{

				while ($row = $statement->fetch(PDO::FETCH_NUM)) 
				{
					array_push($arr,$row);
				}
				return $arr;
				
			}
			catch(PDOException $e)
			{
				return array();
			}
		}
DELIMITER //
CREATE PROCEDURE createmessageuser()
BEGIN

INSERT INTO `website`.`usermessages` (`id`, `date`) VALUES (NULL, CURRENT_TIMESTAMP);

end;

DELIMITER //
CREATE PROCEDURE messagesadminchats(in inuserid int(255))
BEGIN

SELECT * FROM `messages` where userid = inuserid;

end;

DELIMITER //
CREATE PROCEDURE messagesadmin(in invisib int(255))
BEGIN

SELECT Distinct(userid) FROM `messages` where visib = invisib;

end;
DELIMITER //
CREATE PROCEDURE getmessage2s(in inid int(255))
BEGIN

select * from messages where userid = inid;

end;

DELIMITER //
CREATE PROCEDURE checkproducts(in uname varchar(255))
BEGIN

select * from products where nafn = uname;

end;
DELIMITER //
CREATE PROCEDURE products(in visi varchar(255))
BEGIN

select * from products where visib = visi;

end;

		DELIMITER //
CREATE PROCEDURE getemployee(in visibility varchar(255))
BEGIN

select * FROM employee WHERE visib = visibility;

end; 
DELIMITER //
CREATE PROCEDURE deleteuser(in unamein varchar(255))
BEGIN

DELETE FROM users WHERE uname= unamein;

end; 

DELIMITER //
CREATE PROCEDURE getBokun()
BEGIN

select * from bokun;

end; 
DELIMITER //
CREATE PROCEDURE newuser(in unamein varchar(255))
BEGIN

INSERT INTO `users`( `uname`) VALUES (unamein);

end; 
DELIMITER //
CREATE PROCEDURE getusermessage(in visibil int(255))
BEGIN

select max(id), visib from usermessages where visib = visibil;

end; 
DELIMITER //
CREATE PROCEDURE getusermessagearray(in inuserid int(255))
BEGIN

select * from messages where userid = inuserid;

end; 
DELIMITER //
CREATE PROCEDURE getuserInfo(in unamein varchar(255))
BEGIN

select id,Uname from users where Uname = Unamein;

end; 
DELIMITER //
CREATE PROCEDURE getUser(in Uname varchar(255), in Upassword varchar(255))
BEGIN

select Uname, Upassword from users where Uname = Uname and Upassword = Upassword;

end; 
delimiter;




	delimiter //
CREATE PROCEDURE bokuntima(in nafn varchar(255), in phone varchar(255), in email varchar(255), in commentt varchar(255))
BEGIN

INSERT INTO `bokun`( `nafn`, `phone`, `email`, `commentt`) VALUES (nafn,phone,email,commentt);

end; 
delimiter; //






DELIMITER //
CREATE PROCEDURE getAdmin(in userID int)
BEGIN

select admin from users where id = userid;

end; 

*/
?>