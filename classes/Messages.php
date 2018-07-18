<?php
class Messages
{
    public static function setMsg($text, $type)
    {
        if ($type == "error") {
            $_SESSION['errorMsg'] = $text;
        } else {
            $_SESSION['successMsg'] = $text;
        }
    }

    public static function goToButton($text, $where)
    {
        $_SESSION['goText'] = $text;
        $_SESSION['goWhere'] = $where;
    }

    public static function display()
    {
        if (isset($_SESSION['errorMsg'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['errorMsg'] . "</div>";
            unset($_SESSION['errorMsg']);
        }
        if (isset($_SESSION['successMsg'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['successMsg'] . "</div>";
            unset($_SESSION['successMsg']);
        }
        if (isset($_SESSION['goWhere'])) {
            echo '<a class="btn btn-primary" href="'.ROOT_PATH.'users/'.$_SESSION['goWhere'].'">'.$_SESSION['goText'].'</a>';
            unset($_SESSION['goWhere']);
        }
    }
}
