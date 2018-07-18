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
                header('Location: ' . ROOT_URL . 'users/login');
            }
        }
        return;
    }

    public function login()
    {
        //sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $password = md5($post['password']);

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
                    "surname" => $row['surname'],
                    "email" => $row['email'],
                    "pass" => $row['password'],
                );
                header('Location: ' . ROOT_URL);
            } else {
                Messages::setMsg('Incorrect Login', 'error');
            }
        }
        return;
    }

    public function profile()
    {

        $this->query("SELECT * FROM users WHERE id=:id ");
        $this->bind(':id', $_SESSION['user_data']['id']);
        $rows = $this->single();
        return $rows;
    }

    public function settings()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($post['submit']) {
            //blank control
            if ($post['name'] == '' || $post['surname'] == '' || $post['email'] == '' || $post['phone'] == '') {
                Messages::setMsg('Fill in the Blanks', 'error');
                return;
            }
            //insert into MYSQL
            $this->query('UPDATE users SET name=:name, surname=:surname, email=:email, phone=:phone, bio=:bio  WHERE id=:id');
            $this->bind(':name', $post['name']);
            $this->bind(':surname', $post['surname']);
            $this->bind(':email', $post['email']);
            $this->bind(':phone', $post['phone']);
            $this->bind(':bio', $post['bio']);
            $this->bind(':id', $_SESSION['user_data']['id']);
            $row = $this->execute();
            $count = $this->stmt->rowCount();

            if ($count > 0) {
                Messages::setMsg('Successfully Updated', 'success');
                Messages::goToButton('Go to My Profile', 'profile');
            } else {
                Messages::setMsg('Update Error', 'error');
            }
        }

        $this->query("SELECT * FROM users WHERE id=:id ");
        $this->bind(':id', $_SESSION['user_data']['id']);
        $rows = $this->single();
        $_SESSION['user_data'] = array(
            "id" => $rows['id'],
            "name" => $rows['name'],
            "surname" => $rows['surname'],
            "email" => $rows['email'],
            "pass" => $rows['password'],
        );
        return $rows;
    }

    public function cpassword()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($post['submit']) {
            $oldpass = md5($post['oldpassword']);
            $newpass = md5($post['newpassword']);
            $cnewpass = md5($post['cnewpassword']);
            if ($newpass == $cnewpass && $oldpass == $_SESSION['user_data']['pass']) {
                $this->query("UPDATE users SET password=:password  WHERE id=:id");
                $this->bind(':password', $newpass);
                $this->bind(':id', $_SESSION['user_data']['id']);
                $row = $this->execute();
                $count = $this->stmt->rowCount();
                if ($count > 0) {
                    Messages::setMsg('Password Successfully Updated', 'success');
                    Messages::goToButton('Go to My Profile', 'profile');
                } else {
                    Messages::setMsg('Update Error', 'error');
                }
            }else {
                Messages::setMsg('Insert Error(Your password is not correct or New password is not confirmed)', 'error');
            }
            return;
        }
    }
}
