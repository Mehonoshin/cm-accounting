<?php
    function hlist($data, $name)
    {
        $str = '';
        $str .= "<select name='$name'>";
        foreach($data as $value)
        {
            foreach($value as $val)
            {
                $str .= "<option>";
                $str .= $val;
                $str .= "</option>";
            }
        }
        $str .= "</select>";
        return $str;
    }
?>