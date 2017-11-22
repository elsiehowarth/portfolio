<?php

//create variable which create a new dateTime in a certain format
$birthday= new DateTime('2011-11-21');

//create function whichh calculates the age of the dog, pass in the birthday variable
function calculate_age($birthday) {
    
    //create variable of todays date
    $today = new DateTime();
    //create variable which calculates the difference in todays date and the passed in birthday date
    $newDate = $today->diff(new DateTime($birthday));
    $postDate = $today->diff(new DateTime($birthday));

    //if the new date has a year then display the years and months
    if ($newDate->y) {
        return 'Age: ' . $newDate->y . ' years, ' . $newDate->m . ' months';
    }//end if
    //else if the date is month then display months and days
    elseif ($newDate->m) {
        return 'Age: ' . $newDate->m . ' months, ' . $newDate->d . ' days';
    } else { //else if the age is days then display the number of days
        return 'Age: ' . $newDate->d . ' days old';
    }

    if ($postDate->m) {

    }
//end function
} 

function post_age($birthday) {
    //create variable of todays date
    $today = new DateTime();

    $postDate = $today->diff(new DateTime($birthday));

    if ($postDate->m <= 2 and $postDate->d <= 3) {
        echo "too young";
    }

}

// check if session exists by key
function hasSession($key) {
    //return session and key
    return isset($_SESSION[$key]);
}

// set session value by key
function setSession($key, $value) {
    //assign session to a value
    $_SESSION[$key] = $value;
}

// get session value by key
function getSession($key) {
    //if the has session function has a key
    if(hasSession($key)) {
        //return the session and the key
        return $_SESSION[$key];
    }//end if

    return null;
}//end function

// remove session value by key
function removeSession($key) {
    //if there is a session and key
    if(hasSession($key)) {
        //remove session and key
        unset($_SESSION[$key]);
    }//end if
}//end function

// get session by key and remove it
function flashSession($key) {
    //assign vlaue to the get session and key function
    $value = getSession($key);
    //remove the session and key
    removeSession($key);
    //return the value 
    return $value;
}//end function
?>