<?php require('getallstates.php'); ?>
<!DOCTYPE html>

<html lang="en">

<head>

<title>United States </title>
<meta charset='utf-8'>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css" />
 <link rel="stylesheet" href= "p2styles.css" />

</head>
<body>


<h1>U.S.A States Abbreviation Lookup</h1>

<form method='GET' action='index.php'>

  <label for='search'>Search (required):</label>
  <input type='text' name='search' id='search' value='<?=sanitize($search)?>'>
 <input type='checkbox' name='caseSensitive' id='caseSensitive' <?php if ($caseSensitive) echo'CHECKED'; ?>>
  <label for='caseSensitive'>Case Sensitive</label>


  <fieldset class='radios'>
  <legend>Are You Traveling</legend>
  <input type='radio' name='travel'
  <?php if (isset($travel) && $travel=='yes') echo "CHECKED";?>
  value='yes'>Yes
  <input type='radio' name='travel'
  <?php if (isset($travel) && $travel=='no') echo 'Checked';?>
  value='no'>No

  </fieldset>

  <?php if ($_GET) : ?>

                     Traveling: <?=ucfirst($travel)?>

            <?php endif; ?>





  <input type='submit' class='btn btn-primary btn-small' value='Filter States'>



</form>

<?php if (isset($errors)) : ?>
<ul>
<?php foreach ($errors as $error) : ?>
<li><?=$error?></li>
<?php endforeach; ?>
</ul>
<?php endif ?>

<?php if(!$hasResults) : ?>
  <div class='alaert alert-warning'>Your search did not match results.</div>
<?php elseif ($search != '') : ?>
<div class='alaert alert-info'>You search for: <?=sanitize($search)?></div>

<?php endif; ?>

<?php foreach ($states as $title => $state) : ?>
<div class= 'state'>
<h2>State Name: <?=$state['name']?></h2>
<h3>Abbreviation: <?=$state['abbreviation']?></h2>


</div>
<?php endforeach; ?>



</body>
</html>
