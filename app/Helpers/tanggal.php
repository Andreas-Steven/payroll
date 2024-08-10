<?php 
    function tanggal($date) {
        $tanggal = new \DateTime($date1);
        $result = $tanggal->format('Y mm d');

        return $result;
    }
?>