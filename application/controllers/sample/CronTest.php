<?php
class CronTest extends My_Controller {

    public function __construct(){
        parent::__construct();
		
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('sertifikasi/lookup','lookup');
		$this->load->library('restclient');
        $this->load->library('crontab');
		require APPPATH . 'config/crontab.php';
		$this->config = $config;
		
		$crontab = new Crontab($this->config);
		$crontab->add_job('* * * * *', 'init');
    }

    public function runJob_post(){
        $this->crontab->add_job('0 0 * * *', 'cli_script.php');
    }
	
	/**
	This library is very simple, but it's designed to be so.


What does it do

This library sets up cron to perform tasks from crontab file.
When crontab file is written with this library. Almost all you
need is set up config/crontab.php file.


Installation

   1. Download library from github repository git://github.com/biozshock/crontab.git
   2. If you are familiar with phpunit you can test library. Tests are located in tests subdirectory
   3. Copy config/crontab.php and libraries/crontab.php
   4. Setup config/crontab.php
   5. Use this library


Crontab library config file

cronfile
    Path to cronfile library will write all jobs
php_path
    Path to PHP executable
crontime
    Crontab library default format for date() function
cli_path
    PHP cli scripts path
time_offset
    This config variable can be used when your server has different timezone
    from timezone of tasks you want to be cheduled. e.g. server is in -5 timezone.
    backend in +1 timezone. in backend you setting cronjob for 00:00:00,
    but for server this would be 14:00:00


Library usage examples

Simple usage

To execute cli script every day at midnight n your controller you should put following code:

$this->load->library('crontab');
$this->crontab->add_job('0 0 * * *', 'cli_script.php');

This code will execute cli_script.php located in directory you've set
up in config file at 0 minutes 0 hour


Advanced usage
Assuming you have in your $_POST['time'] time when scheduled action should be performed.

$this->load->library('crontab');
$time = $this->crontab->translate_timestamp(strtotime($this->input->post('time')), 's i G * *');
$this->crontab->add_job($time, 'cli_script.php');


If you want to perform an action every day after user submit a data:

$this->load->library('crontab');
$time = $this->crontab->translate_timestamp(time(), 's i G * *');
$this->crontab->add_job($time, 'cli_script.php');
	*/
}
