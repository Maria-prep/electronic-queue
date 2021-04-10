<?php 

include 'classes/Auth.class.php';
include 'classes/AjaxRequest.class.php';

if (!empty($_COOKIE['sid'])) {session_id($_COOKIE['sid']);}
session_start();
class AuthorizationAjaxRequest extends AjaxRequest
{
    public $actions = array(
        "login" => "login",
        "logout" => "logout",
        "register" => "register",
    );

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            http_response_code(405);
            header("Allow: POST");
            $this->setFieldError("main", "Method Not Allowed");
            return;
        }
        setcookie("sid", "");
        $username = $this->getRequestParam("username");
        $password = $this->getRequestParam("password");
        $remember = !!$this->getRequestParam("remember-me");
        if (empty($username)) {
          $this->setFieldError("username", "<p style='text-align:center;margin:0 0 10px 0;'><span style='color:#900000;'>Введите ваш Логин</span></p>");
            return;
        }
      
      elseif(isset($username) && !preg_match("/^([a-z-,._,0-9])+@([a-z,._,0-9])+(.([a-z])+)+$/", $username)) {
      $this->setFieldError("username", "<p style='text-align:center;margin:0 0 10px 0;'><span style='color:#900000;'>Только действующий E-mail</span></p>");
            return; }
      

        if (empty($password)) {
            $this->setFieldError("password", "<p style='text-align:center;margin:0 0 10px 0;'><span style='color:#900000;'>Введите пароль</span></p>");
            return;
        }

        $user = new Auth\User();
        $auth_result = $user->authorize($username, $password, $remember);

        if (!$auth_result) {
            $this->setFieldError("password", "<p style='text-align:center;margin:0 0 10px 0;'><span style='color:#900000;'>Неверный Логин или Пароль</span></p>");
		return;}
		

        $this->status = "ok";		
        $this->setResponse("redirect", " ");
        $this->message = sprintf("Hello, %s! Access granted.", $username);
    }

    public function logout()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            http_response_code(405);
            header("Allow: POST");
            $this->setFieldError("main", "Method Not Allowed");
            return;
        }

        setcookie("sid", "");

        $user = new Auth\User();
        $user->logout();

        $this->setResponse("redirect", " ");
        $this->status = "ok";
    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            http_response_code(405);
            header("Allow: POST");
            $this->setFieldError("main", "Method Not Allowed");
            return;
        }

        setcookie("sid", "");
        $username = $this->getRequestParam("username"); 
        $names = $this->getRequestParam("names"); 
        $password1 = $this->getRequestParam("password1");
        $password2 = $this->getRequestParam("password2");
      
   
        if (empty($username)) {
            $this->setFieldError("username", "<p style='text-align:center;margin:0 0 10px 0;'><span style='color:#900000;'>Введите ваш E-mail</span></p>");
            return;
        }
      
       elseif(isset($username) && !preg_match("/^([a-z-,._,0-9])+@([a-z,._,0-9])+(.([a-z])+)+$/", $username)) {
      $this->setFieldError("username", "<p style='text-align:center;margin:0 0 10px 0;'><span style='color:#900000;'>Только действующий E-mail</span></p>");
            return; }
      
      if (empty($names)) {
            $this->setFieldError("names", "<p style='text-align:center;margin:0 0 10px 0;'><span style='color:#900000;'>Введите ваше имя</span></p>");
            return;
        }
      elseif(isset($names) && !preg_match("/[А-Яа-я]/i", $names)) {
        $this->setFieldError("names", "<p style='text-align:center;margin:0 0 10px 0;'><span style='color:#900000;'>Имя содержит только русские буквы</span></p>");
              return; }

        if (empty($password1)) {
            $this->setFieldError("password1", "<p style='text-align:center;margin:0 0 10px 0;'><span style='color:#900000;'>Введите пароль</span></p>");
            return;
        }

        if (empty($password2)) {
            $this->setFieldError("password2", "<p style='text-align:center;margin:0 0 10px 0;'><span style='color:#900000;'>Подтвердите пароль</span></p>");
            return;
        }

        if ($password1 !== $password2) {
            $this->setFieldError("password2", "<p style='text-align:center;margin:0 0 10px 0;'><span style='color:#900000;'>Пароли не совпадают</span></p>");
            return;
        }

      $username = htmlspecialchars(trim($username));
      $names = htmlspecialchars(trim($names));
      $user = new Auth\User();
        try {
            $new_user_id = $user->create($username, $names, $password1);
        } catch (\Exception $e) {
            $this->setFieldError("username", $e->getMessage());
            return;
        }
        $user->authorize($username,  $password1);

        $this->message = sprintf("Привет, %s! Вы успешно зарегистрированы!.", $username);
        $this->setResponse("redirect", "/");
        $this->status = "ok";
    }
}
$ajaxRequest = new AuthorizationAjaxRequest($_REQUEST);
$ajaxRequest->showResponse();
?>
