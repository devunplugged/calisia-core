<?php
namespace CalisiaCore\Db\Models;

class Users{
    private $ID;
    private $user_login;
    private $user_pass;
    private $user_nicename;
    private $user_email;
    private $user_url;
    private $user_registered;
    private $user_activation_key;
    private $user_status;
    private $display_name;

    public function get_ID(){
        return $this->ID;
    }
    public function set_ID($ID){
        $this->ID = $ID;
    }
    public function get_user_login(){
        return $this->user_login;
    }
    public function set_user_login($user_login){
        $this->user_login = $user_login;
    }
    public function get_user_pass(){
        return $this->user_pass;
    }
    public function set_user_pass($user_pass){
        $this->user_pass = $user_pass;
    }
    public function get_user_nicename(){
        return $this->user_nicename;
    }
    public function set_user_nicename($user_nicename){
        $this->user_nicename = $user_nicename;
    }
    public function get_user_email(){
        return $this->user_email;
    }
    public function set_user_email($user_email){
        $this->user_email = $user_email;
    }
    public function get_user_url(){
        return $this->user_url;
    }
    public function set_user_url($user_url){
        $this->user_url = $user_url;
    }
    public function get_user_registered(){
        return $this->user_registered;
    }
    public function set_user_registered($user_registered){
        $this->user_registered = $user_registered;
    }
    public function get_user_activation_key(){
        return $this->user_activation_key;
    }
    public function set_user_activation_key($user_activation_key){
        $this->user_activation_key = $user_activation_key;
    }
    public function get_user_status(){
        return $this->user_status;
    }
    public function set_user_status($user_status){
        $this->user_status = $user_status;
    }
    public function get_display_name(){
        return $this->display_name;
    }
    public function set_display_name($display_name){
        $this->display_name = $display_name;
    }
}