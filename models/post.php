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
        $this->query("SELECT * FROM categories");
        $rows = $this->resultSet();

        #sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if ($post['submit']) {
            #blank control
            if ($post['title'] == '' || $post['content'] == '' || $post['slink'] == '' || $post['tags'] == '') {
                Messages::setMsg('Fill in the Blanks', 'error');
                return;
            }
            #categories-> select box
            $this->query('SELECT * FROM categories');
            $rows = $this->resultSet();
            #insert into MYSQL
            $this->query('INSERT INTO posts (title, category_id, tags, description, content, source_link, user_id) VALUES (:title, :cid, :tags, :description, :content, :slink, :userid)');
            $this->bind(':title', $post['title']);
            $this->bind(':cid', $post['category']);
            $this->bind(':tags', $post['tags']);
            $this->bind(':description', $post['description']);
            $this->bind(':content', $post['content']);
            $this->bind(':slink', $post['slink']);
            $this->bind(':userid', $_SESSION['user_data']['id']);
            $this->execute();

            #Verify
            if ($this->lastInsertId()) {
                #redirect
                header('Location: ' . ROOT_URL . 'posts');
            }
            return;
        }
        #categories => addview
        return $rows;
    }
    public function details()
    {
        #post details
        $this->query("SELECT * FROM posts WHERE id=:id");
        $this->bind(':id', $_POST["xid"]);
        $rows = $this->single();
        return $rows;
    }

    public function myposts()
    {
        #myposts 
        $this->query("SELECT * FROM posts WHERE user_id=:uid ORDER BY post_date DESC");
        $this->bind(':uid', $_SESSION['user_data']['id']);
        $rows = $this->resultSet();
        return $rows;
    }

    public function delete()
    {
        #mypost deleting
        $this->query(" DELETE FROM posts WHERE id =:id ");
        $this->bind(':id', $_POST['xid']);
        $this->execute();


        # Messages gonna be Fixed
        $count = $this->stmt->rowCount(); #Checking
        if ($count > 0) {
            Messages::setMsg('Successfully Deleted', 'success');
            header('Location: ' . ROOT_URL . 'posts/myposts');
        } else {
            Messages::setMsg('An Error Occured While Deleting', 'error');
        }
    }
}
