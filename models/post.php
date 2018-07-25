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
        #categories-> select box
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
        }
        #categories => return
        return $rows;
    }
    public function details()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $this->query("SELECT comments.comment_id, comments.post_id, posts.post_id, users.user_id, users.user_id, users.name, users.email, comments.comment, comments.comment_time, posts.title, posts.category_id, posts.tags, posts.description, posts.content, posts.source_link, posts.post_date
        FROM posts
        LEFT JOIN comments ON comments.post_id = posts.post_id
        LEFT JOIN users ON comments.user_id= users.user_id WHERE comments.post_id=:id ORDER BY comments.comment_time DESC;");

        if (!isset($post['xid'])) {
            $this->bind(':id', $_SESSION['post_id']);
            $rows = $this->execute();
            $count = $this->stmt->rowCount();
            if ($count >= 2) {
                $rows = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                return $rows;
            } else {
                $rows = $this->stmt->fetch(PDO::FETCH_ASSOC);
                if (!isset($rows['comment_id'])) {
                    $this->query('SELECT * FROM posts WHERE post_id=:id');
                    $this->bind(':id', $_SESSION['post_id']);
                    $rows = $this->single();
                }
                return $rows;
            }
        } else {
            $this->bind(':id', $post["xid"]);
            $rows = $this->execute();
            $count = $this->stmt->rowCount();
            if ($count >= 2) {
                $rows = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                return $rows;
            } else {
                $rows = $this->stmt->fetch(PDO::FETCH_ASSOC);
                if (!isset($rows['comment_id'])) {
                    $this->query('SELECT * FROM posts WHERE post_id=:id');
                    $this->bind(':id', $post["xid"]);
                    $rows = $this->single();
                }
                return $rows;
            }
        }
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
        $this->query(" DELETE FROM posts WHERE post_id =:id ");
        $this->bind(':id', $_POST['did']);
        $this->execute();

        # Messages
        $count = $this->stmt->rowCount(); #Checking
        if ($count > 0) {
            Messages::setMsg('Successfully Deleted', 'success');
            header('Location: ' . ROOT_URL . 'posts/myposts');
        } else {
            Messages::setMsg('An Error Occured While Deleting', 'error');
        }
    }

    public function addcomment()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($post['submit']) {
            #blank control
            if ($post['yourcomment'] == '') {
                Messages::setMsg('Fill in the Blanks', 'error');
                return;
            }
            #insert into MYSQL
            $this->query('INSERT INTO comments (user_id, post_id, comment) VALUES (:uid, :post_id, :comment)');
            $this->bind(':uid', $_SESSION['user_data']['id']);
            $this->bind(':post_id', $post['pid']);
            $this->bind(':comment', $post['yourcomment']);
            $this->execute();

            #Verify
            if ($this->lastInsertId()) {
                #redirect

                header('Location: ' . ROOT_URL . 'posts/details');
            }
            return;
        }

    }

    public function deleteComment()
    {
        #mypost deleting
        $this->query(" DELETE FROM comments WHERE comment_id =:id ");
        $this->bind(':id', $_POST['comid']);
        $this->execute();

        # Messages
        $count = $this->stmt->rowCount(); #Checking
        if ($count > 0) {
            Messages::setMsg('Successfully Deleted', 'success');
            header('Location: ' . ROOT_URL . 'posts/details');
        } else {
            Messages::setMsg('An Error Occured While Deleting', 'error');
            header('Location: ' . ROOT_URL . 'posts/details');
        }
    }
}
