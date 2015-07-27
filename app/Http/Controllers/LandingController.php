<?php namespace App\Http\Controllers;

use App\Http\Requests\MailFormRequest;
use App\Http\Controllers\Controller;
use \App\tank;
use DB;
use Request;

class LandingController extends Controller
{
    public function index()
    {
    	return view('welcome');
    }

    public function editor()
    {
    	return view('editing');
    }
}