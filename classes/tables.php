<?php
namespace MZ;

class tables{

    public $sql = '';

    public function createUsersTable(){
        $this->sql = "create table if not EXISTS appusers(
       id int(11) not null PRIMARY key auto_increment,
       fname char(30) not null,
       lname char(30) not null,
       username varchar(100) not null,
       pass varchar(30),
       pass_hash varchar(255),
       country char(50),
       state char(50),
       dob datetime null,
       activated enum('0','1') not null default '0',
       email varchar(100) not null)";
        return $this->sql;
    }
}
