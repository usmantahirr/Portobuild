<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');




define ('DBPATH','localhost');
define ('DBUSER','root');
define ('DBPASS','');
define ('DBNAME','gallery');




class Chat extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->is_logged_in() == FALSE)
    {
      redirect('auth');
    }
    else
    {
      $this->load->model('album_model');
      $this->load->model('image_model');
      $this->load->model('user_model');
    }
  }
 
public function index(){
  global $dbh;
  $dbh = mysqli_connect(DBPATH,DBUSER,DBPASS,DBNAME);

  if ($_GET['action'] == "chatheartbeat") { $this->chatHeartbeat(); } 
  if ($_GET['action'] == "sendchat") { $this->sendChat(); } 
  if ($_GET['action'] == "closechat") { $this->closeChat(); } 
  if ($_GET['action'] == "startchatsession") { $this->startChatSession(); } 
    
    $_SESSION['chatHistory'] = array(); 


  if (!isset($_SESSION['openChatBoxes'])) {
    $_SESSION['openChatBoxes'] = array(); 
  }
}



public function chatHeartbeat() {
  echo $this->session->userdata('username');
  die;  
  $sql = "select * from chat where (chat.to = '".$this->session->userdata('username')."' AND recd = 0) order by id ASC";
  $dbh = mysqli_connect(DBPATH,DBUSER,DBPASS,DBNAME);
  $query = mysqli_query($dbh,$sql);
  $items = '';
  $chatBoxes = array();

  while ($chat = mysqli_fetch_array($query)) {

    if (!isset($_SESSION['openChatBoxes'][$chat['from']]) && isset($_SESSION['chatHistory'][$chat['from']])) {
      $items = $_SESSION['chatHistory'][$chat['from']];
    }

    $chat['message'] = sanitize($chat['message']);

    $items .= <<<EOD
             {
      "s": "0",
      "f": "{$chat['from']}",
      "m": "{$chat['message']}"
     },
EOD;

  if (!isset($_SESSION['chatHistory'][$chat['from']])) {
    $_SESSION['chatHistory'][$chat['from']] = '';
  }

  $_SESSION['chatHistory'][$chat['from']] .= <<<EOD
               {
      "s": "0",
      "f": "{$chat['from']}",
      "m": "{$chat['message']}"
     },
EOD;
    
    unset($_SESSION['tsChatBoxes'][$chat['from']]);
    $_SESSION['openChatBoxes'][$chat['from']] = $chat['sent'];
  }

  if (!empty($_SESSION['openChatBoxes'])) {
  foreach ($_SESSION['openChatBoxes'] as $chatbox => $time) {
    if (!isset($_SESSION['tsChatBoxes'][$chatbox])) {
      $now = time()-strtotime($time);
      $time = date('g:iA M dS', strtotime($time));

      $message = "Sent at $time";
      if ($now > 180) {
        $items .= <<<EOD
{
"s": "2",
"f": "$chatbox",
"m": "{$message}"
},
EOD;

  if (!isset($_SESSION['chatHistory'][$chatbox])) {
    $_SESSION['chatHistory'][$chatbox] = '';
  }

  $_SESSION['chatHistory'][$chatbox] .= <<<EOD
    {
"s": "2",
"f": "$chatbox",
"m": "{$message}"
},
EOD;
      $_SESSION['tsChatBoxes'][$chatbox] = 1;
    }
    }
  }
}

  $sql = "update chat set recd = 1 where chat.to = '".$this->session->userdata('username')."' and recd = 0";
  $dbh = mysqli_connect(DBPATH,DBUSER,DBPASS,DBNAME);
  $query = mysqli_query($dbh,$sql);

  if ($items != '') {
    $items = substr($items, 0, -1);
  }
header('Content-type: application/json');
?>
{
    "items": [
      <?php echo $items;?>
        ]
}

<?php
      exit(0);
}

public function chatBoxSession($chatbox) {
  
  $items = '';
  
  if (isset($_SESSION['chatHistory'][$chatbox])) {
    $items = $_SESSION['chatHistory'][$chatbox];
  }

  return $items;
}

public function startChatSession() {
  $items = '';
  if (!empty($_SESSION['openChatBoxes'])) {
    foreach ($_SESSION['openChatBoxes'] as $chatbox => $void) {
      $items .= chatBoxSession($chatbox);
    }
  }
  die;

  if ($items != '') {
    $items = substr($items, 0, -1);
  }

header('Content-type: application/json');
?>
{
    "username": "<?php echo $this->session->userdata('username');?>",
    "items": [
      <?php echo $items;?>
        ]
}

<?php


  exit(0);
}

public function sendChat() {
  $from = $this->session->userdata('username');
  $to = $_POST['to'];
  $message = $_POST['message'];
  $_SESSION['openChatBoxes'][$_POST['to']] = date('Y-m-d H:i:s', time());
  
  $messagesan = sanitize($message);

  if (!isset($_SESSION['chatHistory'][$_POST['to']])) {
    $_SESSION['chatHistory'][$_POST['to']] = '';
  }

  $_SESSION['chatHistory'][$_POST['to']] .= <<<EOD
             {
      "s": "1",
      "f": "{$to}",
      "m": "{$messagesan}"
     },
EOD;


  unset($_SESSION['tsChatBoxes'][$_POST['to']]);
  $sql = "insert into chat (chat.from,chat.to,message,sent) values ('".$from."', '".$to."','".$message."',NOW())";
  $dbh = mysqli_connect(DBPATH,DBUSER,DBPASS,DBNAME);
  $query = mysqli_query($dbh,$sql);
  echo "1";
  exit(0);
}

public function closeChat() {

  unset($_SESSION['openChatBoxes'][$_POST['chatbox']]);
  
  echo "1";
  exit(0);
}

public function sanitize($text) {
  $text = htmlspecialchars($text, ENT_QUOTES);
  $text = str_replace("\n\r","\n",$text);
  $text = str_replace("\r\n","\n",$text);
  $text = str_replace("\n","<br>",$text);
  return $text;
}
  
 
}
