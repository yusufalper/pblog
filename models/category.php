<?php
class CategoryModel extends Model
{
    public function Index()
    {
        $this->query("SELECT * FROM categories ORDER BY id");
        $rows = $this->resultSet();
        return $rows;
    }

    public function selected()
    {
        $this->query("SELECT * FROM posts WHERE category_id=:cid");
        $this->bind(':cid', $_POST['cid']);
        $rows = $this->resultSet();
        return $rows;
    }
}
