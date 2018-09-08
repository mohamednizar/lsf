<?php 
namespace Interfaces;

interface ApiInterface
{
    public function __construct();

    public function get();

    public function put();

    public function post();

    public function delete();

}