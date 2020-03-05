<?php
function arraySort($array, $key = 'sort', $sort) {
    usort($array, function($a, $b) use ($key, $sort) {
        return ($sort == SORT_ASC || !isset($sort)) ? $a[$key] <=> $b[$key] : $b[$key] <=> $a[$key];
    }
    );
    return $array;
}
function functionCreator($array,$style, $sort) {
	$array = arraySort($array, 'sort', $sort);
	include ($_SERVER['DOCUMENT_ROOT'].'/template/menu.php');
}
function cutArr($item, $b) {
    if(strlen($item) > $b) {
          return substr($item,0,$b) . "...";
      }
      return $item;
};
function giveTitle($url, $array) {
  foreach ($array as $value) {
    if ($value['path'] == $url)
      return cutArr($value['title'], 12);
  }
}
function makeActive($url, $array) {
  foreach ($array as $value) {
    if ($value['path'] == $url)
      return $value['title'];
  }
}
function isAuthUser() {
  if (isset($_SESSION['auth_user'])) {
    return $_SESSION['auth_user'];
  }
}
?>
