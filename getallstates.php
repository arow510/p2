<?php

require('Form.php');
require('helpers.php');

use DWA\Form;

$form = new Form($_GET);

$statesJson = file_get_contents('states.json');

$states = json_decode($statesJson, true);


if (isset($_GET['travel'])) {
    $travel = $_GET['travel'];
} else {
    $travel = '';


}

if (isset($_GET['search'])) {
  $search = $_GET['search'];
} else {
  $search = '';
}

if (isset($_GET['caseSensitive'])) {
$caseSensitive = true;
} else {
  $caseSensitive = false;
}


#validate

if($form->isSubmitted()){
$errors = $form->validate([
'search' => 'required'

]);



}

$hasResults = true;
if ($search == '') {
return $states;

}


foreach ($states as $title => $state){
if($caseSensitive) {
  $match = $title == $search;
} else {
  $match = strtolower($title) == strtolower($search);
}

if (!$match) {
    unset($states [$title]);
  }

}

if (count($states) == 0) {

  $hasResults = false;
} else {

  $hasResults = true;
}
