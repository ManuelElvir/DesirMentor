<?php
$items = '<li id="menu-item-135" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-135"><a href="http://wp144404.wpdns.ca/en/home/" class="menu-link"><span class="text-wrap">Home</span></a></li><li id="menu-item-195" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-195"><a href="http://wp144404.wpdns.ca/en/about-us/" class="menu-link"><span class="text-wrap">About Us</span></a></li><li id="menu-item-314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-314"><a href="http://wp144404.wpdns.ca/en/services/" class="menu-link"><span class="text-wrap">Services</span></a></li><li id="menu-item-197" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-197"><a href="http://wp144404.wpdns.ca/en/portfolio/" class="menu-link"><span class="text-wrap">Portfolio</span></a></li><li id="menu-item-196" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-196"><a href="http://wp144404.wpdns.ca/en/contact-us/" class="menu-link"><span class="text-wrap">Contact Us</span></a></li><li id="menu-item-214-en" class="lang-item lang-item-6 lang-item-en no-translation lang-item-first menu-item menu-item-type-custom menu-item-object-custom menu-item-214-en"><a href="http://wp144404.wpdns.ca/en/home/" hreflang="en-CA" class="menu-link" lang="en-CA"><span class="text-wrap">English</span></a></li>';



function menutoArray(String $items_string) {
    $items_array = explode('<li', $items_string);
    array_shift($items_array);
    for ($i=0; $i < sizeof($items_array); $i++) { 
        $items_array[$i] = '<li' . $items_array[$i];
    }
    return $items_array;
}

function arrayToMenu(array $items_array) {
    $items_string = '';
    foreach ($items_array as $item_array) {
        $items_string .= $item_array;
    }
    return$items_string;
}
$items_array = explode('<li', $items);
for ($i=0; $i < sizeof($items_array); $i++) { 
    $items_array[$i] = '<li' . $items_array[$i];
}
$items = menutoArray($items);
print_r($items);
$items = arrayToMenu($items);
print_r("\n");
print_r("\n");
echo($items);
?>