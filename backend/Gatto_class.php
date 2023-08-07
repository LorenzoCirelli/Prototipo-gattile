<?php
class Gatto{
    public $nome;
    public $eta;
    public $foto;
    public $id;

    function __construct($nome,$eta,$foto,$id){
        $this-> nome = $nome;
        $this-> eta = $eta;
        $this-> foto = $foto;
        $this-> id = $id;
    }
}
?>