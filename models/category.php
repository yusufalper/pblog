<?php
class CategoryModel extends Model
{
    public function Index()
    {
        $this->query("SELECT * FROM categories ORDER BY id DESC");
        $rows = $this->resultSet();
        return $rows;
    }

    public function selected()
    {
        $this->query("SELECT * FROM posts WHERE category_id=:cid ORDER BY id DESC");
        $this->bind(':cid', $_POST['cid']);
        $rows = $this->resultSet();
        return $rows;
    }
}
