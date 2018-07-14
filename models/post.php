<?php
class PostModel extends Model
{
    public function Index()
    {
        $this->query("SELECT * FROM posts ORDER BY post_date DESC");
        $rows = $this->resultSet();
        return $rows;
    }

    public function add()
    {
        //sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if ($post['submit']) {
            //blank control
            if ($post['title'] == '' || $post['content'] == '' || $post['slink'] == '' || $post['tags'] == '') {
                Messages::setMsg('Fill in the Blanks', 'error');
                return;
            }
            //insert into MYSQL
            $this->query('INSERT INTO posts (title, tags, description, content, source_link, user_id) VALUES (:title, :tags, :description, :content, :slink, :userid)');
            $this->bind(':title', $post['title']);
            $this->bind(':tags', $post['tags']);
            $this->bind(':description', $post['description']);
            $this->bind(':content', $post['content']);
            $this->bind(':slink', $post['slink']);
            $this->bind(':userid', $_SESSION['user_data']['id']);
            $this->execute();

            //Verify
            if ($this->lastInsertId()) {
                //redirect
                header('Location: ' . ROOT_URL . 'posts');
            }
        }
        return;
    }
    public function details()
    {

    }
}
