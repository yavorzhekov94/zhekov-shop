<?php
declare(strict_types=1);

namespace models;
use Exception;
use models\Session;

require 'Session.php';
require 'Connection.php';

/**
 * User
 */
class User extends Connection
{
	    
        
    /**
     * registerUser
     *
     * @param  mixed $args
     * @return void
     */
    public function registerUser(array $args){

		if (!$this->isValidEmail($args['clientemail'])) {
            throw new Exception('Невалиден имейл адрес');
        }

		$userExist = $this->checkUserExist($args['clientemail']);
		if($userExist === true) {
			throw new Exception('Потребител с този Имейл съществува вече в базата данни');
		}
		$dateToday = date('Y-m-d H:i:s');
		
		$sqlData = "INSERT INTO users(first_name, last_name, email, phone, pass, created_at) VALUES('".$args['firstname']."', '".$args['lastname']."', '".$args['clientemail']."','".$args['phone']."','".$args['pass']."','".$dateToday."')";
		
		$result = $this->getConnection()->query($sqlData);
		
		if (!$result)  {
            throw new Exception('Записът не може да бъде добавен в базата данни');
        }
		return $result;
	}
    
    /**
     * loginUser
     *
     * @param  mixed $email
     * @param  mixed $password
     * @return void
     */
    public function loginUser(string $email, string $password){

        $sql="SELECT * FROM users WHERE email='$email'";

        $result = $this->getConnection()->query($sql);
        $user_data = $result->fetch_array(MYSQLI_ASSOC);
        $count_row = $result->num_rows;

        if ($count_row === 1) {

			//check whether given password matches with hash password stored in db
			if(!password_verify($password, $user_data['pass'])) {
				throw new Exception('грешна парола!Моля опитайте отново!');
			}
			$fullname = $this->getFullName($user_data['first_name'], $user_data['last_name']);
            Session::start();
			Session::set('name', $fullname);
			Session::set('key', $user_data['id']);
        }
        else{
            throw new Exception('Такъв потребител не може да бъде намерен!');
        }
    }

    public function updateUserInfo(array $args){

		Session::start();
		$key = Session::get('key');

		//Update User Informatioon
		if($args['buttonValue'] === 'edit-info') {
			$sqlData = "UPDATE users SET first_name ='".$args['firstname']."', last_name ='".$args['lastname']."', email ='".$args['clientemail']."', phone ='".$args['phone']."' WHERE id=$key";
		
			$result = $this->getConnection()->query($sqlData);
		
			if (!$result)  {
				throw new Exception('Записът не може да бъде добавен в базата данни');
			}
			Session::set('success_message', 'Записът беше редактиран успешно!');
		}
		//Update User Password
		elseif($args['buttonValue'] === 'edit-pass') {
			$sqlData="SELECT pass FROM users WHERE id=$key";
			$result = $this->getConnection()->query($sqlData);
            $user_data = $result->fetch_array(MYSQLI_ASSOC);
			if(!password_verify($args['old-pass'], $user_data['pass'])) {
				throw new Exception('грешна парола!Моля опитайте отново!');
			}
			//ako parolite sa ednakvi da hvurlq greshka
			elseif($args['old-pass'] === $args['new-pass']) {
				throw new Exception('Старата и новата парола не трябва да са еднакви!Моля опитайте отново!');
			}
			else{
				$newSql = "UPDATE users SET pass ='".$args['new-secure-pass']."' WHERE id=$key";
		
				$result = $this->getConnection()->query($newSql);
		
				if (!$result)  {
					throw new Exception('Изникна проблем с редактирането на записа');
				}
				Session::set('success_message', 'Паролата беше сменена успешно!');
				return $result;
			}
		}
	}
	
		
	/**
	 * checkUserExist
	 *
	 * @param  mixed $email
	 * @return bool
	 */
	public function checkUserExist(string $email): bool{
		$userExist = false;
		$sqlData = "SELECT * FROM users WHERE email = '".$email."'";
		$result = $this->getConnection()->query($sqlData);
		if($result->num_rows === 0) {
			$userExist = false;
		}
		else{
			$userExist = true;
		}
		return $userExist;
	}
	
		
	/**
	 * getFullName
	 *
	 * @param  mixed $firstname
	 * @param  mixed $lastname
	 * @return string
	 */
	public function getFullName($firstname, $lastname): string
	{
		return $firstname.' '.$lastname;
	}
	
		
	/**
	 * getSecurePass
	 *
	 * @param  mixed $password
	 * @return string
	 */
	public function getSecurePass(string $password): string {
		return password_hash($password, PASSWORD_DEFAULT);
	}
	
		
	/**
	 * isValidEmail
	 *
	 * @param  mixed $email
	 * @return bool
	 */
	public function isValidEmail(string $email): bool {

		return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;

	}

}
