<?php
class searchModel extends Model
{
    public function Index()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $query = str_replace(array('%', '_'), '', $post['query']);
        $len=strlen($query);
        if ($query && $len>=4) {
            $this->query("SELECT * FROM posts 
            WHERE (title LIKE :search) OR (content LIKE :search) OR (tags LIKE :search) OR (description LIKE :search) OR (source_link LIKE :search)
            ORDER BY post_date DESC");
            $this->bind(':search', '%' . $query . '%');
            $this->execute();
            $rows = $this->resultSet();
            return $rows;
        }else{
            Messages::setMsg('It must be 4 characters at least. Maybe, the fault is ours.', 'error');
            return;
        }

    }
}
