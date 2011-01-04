<?php
    /**
     * Модель данных для регистрации
     * @package models 
     * @author Chaos 
     */

    /**
    *@property CI_Loader           $load
    *@property CI_Form_validation  $form_validation
    *@property CI_Input            $input
    *@property CI_Email            $email
    *@property CI_DB_active_record $db
    *@property CI_DB_forge         $dbforge
    *@property CI_Table            $table
    *@property CI_Session          $session
    *@property CI_FTP              $ftp
    **/

    /**
     * Модель данных для регистрации
     */
    class Registration_model extends Model
    {
        /**
         * конструктор
         */
        function Registration_model()
        {
            parent::Model();
        }

        /**
         * Добавляет пользователя в базу данных
         * @param string $login
         * @param string $password
         * @param string $email
         */
        function add_to_base($login, $password, $email)
        {
            $md5pass = md5($password);
            $this->db->query("insert into Users values('$login','$md5pass','$email','')");
        }

        /**
         * определяет существует ли пользователь
         * @param string $login
         * @return bool
         */
        function exist($login)
        {
            $result = $this->db->query("select login from Users where login = '$login'");
            return ($result->num_rows != 0);
        }

        /**
         * Получает хэш пароля пользователя
         * @param string $login
         * @return string
         */
        function get_password($login)
        {
            $result = $this->db->query("select password from Users where login = '$login'");
            if ($result->num_rows != 0)
            {
                $result = $result->result();
                return $result[0]->password;
            }
        }
    }
?>
