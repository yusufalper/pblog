<?php
class UserModel extends Model
{
    public function register()
    {
        //sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $password = md5(post['password']);

        if ($post['submit']) {
            //blank control
            if ($post['name'] == '' || $post['surname'] == '' || $post['email'] == '' || $post['phone'] == '' || $post['password'] == '') {
                Messages::setMsg('Fill in the Blanks', 'error');
                return;
            }
            //insert into MYSQL
            $this->query('INSERT INTO users (name, surname, email, phone, password) VALUES (:name, :surname, :email, :phone, :password)');
            $this->bind(':name', $post['name']);
            $this->bind(':surname', $post['surname']);
            $this->bind(':email', $post['email']);
            $this->bind(':phone', $post['phone']);
            $this->bind(':password', $password);
            $this->execute();

            //Verify
            if ($this->lastInsertId()) {
                //redirect
                header('Location: ' . ROOT_URL.'users/login');
            }
        }
        return;
    }

    public function login()
    {
        //sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $password = md5(post['password']);

        if ($post['submit']) {
            //compare
            $this->query('SELECT * FROM users WHERE email=:email AND password=:password');
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);

            $row = $this->single();

            if ($row) {
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    "id" => $row['id'],
                    "name" => $row['name'],
                    "email" => $row['email'],
                );
                header('Location: ' . ROOT_URL);
            } else {
                Messages::setMsg('Incorrect Login', 'error');
            }
        }
        return;
    }
}