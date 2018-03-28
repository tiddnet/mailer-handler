<?php

//  demo.imgeng.in usage stats (trending OPS, DEV, Dashboard)

function getRates($conn) {
 //   global $conn;
    //  demo.imgeng.in usage stats
    $sql = " select (select count(webpagetest_results.id) FROM `imgengdemo`.`webpagetest_results` WHERE webpagetest_results.updated_at >=NOW() - INTERVAL 1 MINUTE) as minute, (
     select count(webpagetest_results.id) as hour FROM `imgengdemo`.`webpagetest_results` WHERE webpagetest_results.updated_at >=NOW() - INTERVAL 60 MINUTE) as hour, (
     select count(webpagetest_results.id) as day FROM `imgengdemo`.`webpagetest_results` WHERE webpagetest_results.updated_at >=NOW() - INTERVAL (60 * 24) MINUTE) as day,(
     select count(webpagetest_results.id)as week FROM `imgengdemo`.`webpagetest_results` WHERE webpagetest_results.updated_at >=NOW() - INTERVAL (60 * 24 * 7) MINUTE) as week";


    $result = $conn->query($sql);
    $return = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $return .=  "minute: " . $row["minute"]. "\nhour: " . $row["hour"]. "\nday: " . $row["day"].  "\nweek: " . $row["week"]. "\n";
        }
    } else {
        $return .=  "0 results";
    }

    return $return;

}

// All URLs (sales, infosec)



function getAllURLs($conn) {

    $sql = "SELECT distinct url FROM imgengdemo.tests";

    $result = $conn->query($sql);
    $return = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $return .=  $row["url"]. "\n";
        }
    } else {
        $return .=  "0 results";
    }


    return $return;

}


// Given a URL, retrieve all results (time period)  (helpful for sales)
function getTestsByEmail($conn, $URL) {

    $sql = "SELECT webpagetest_results.created_at as created, tests.email as email, tests.url as testurl, concat(\"http://webpagetest.imgeng.in/result/\", webpagetest_results.id) as wpturl, concat(\"https://demo.imgeng.in/#!/summary/\",  webpagetest_results.test_id, \"?showall=true\") as demourl from webpagetest_results INNER JOIN tests on webpagetest_results.test_id = tests.id where email LIKE  \"$URL\" AND webpagetest_results.status = 2 AND webpagetest_results.updated_at >=NOW() - INTERVAL (60 * 24 * 7) MINUTE";


    $result = $conn->query($sql);
    $return = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $return .=  "<br>";
            $return .=  $row["created"]. " ";
            $return .=  $row["testurl"]. " ";
            $return .=  $row["wpturl"]. " ";
            $return .=  $row["demourl"]. " ";
        }
    } else {
        $return .=  "0 results";
    }


    return $return;

}

function getAllTestsForURL($conn, $URL) {

    $sql = "SELECT webpagetest_results.created_at as created, tests.url as testurl, concat(\"http://webpagetest.imgeng.in/result/\", webpagetest_results.id) as wpturl, concat(\"https://demo.imgeng.in/#!/summary/\",  webpagetest_results.test_id, \"?showall=true\") as demourl from webpagetest_results INNER JOIN tests on webpagetest_results.test_id = tests.id where tests.url = \"$URL\" ";

    $result = $conn->query($sql);
    $return = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $return .=  "<br>";
            $return .=  $row["created"]. " ";
            $return .=  $row["testurl"]. " ";
            $return .=  $row["wpturl"]. " ";
            $return .=  $row["demourl"]. " ";
        }
    } else {
        $return .=  "0 results";
    }


    return $return;

}

function getWeekOfTestsForURL($conn, $URL) {

    $sql = "SELECT webpagetest_results.created_at as created, tests.url as testurl, concat(\"http://webpagetest.imgeng.in/result/\", webpagetest_results.id) as wpturl, concat(\"https://demo.imgeng.in/#!/summary/\",  webpagetest_results.test_id, \"?showall=true\") as demourl from webpagetest_results INNER JOIN tests on webpagetest_results.test_id = tests.id where tests.url = \"$URL\" AND webpagetest_results.status = 2 AND webpagetest_results.updated_at >=NOW() - INTERVAL (60 * 24 * 7) MINUTE";

    $result = $conn->query($sql);
    $return = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $return .=  "<br>";
            $return .=  $row["created"]. " ";
            $return .=  $row["testurl"]. " ";
            $return .=  $row["wpturl"]. " ";
            $return .=  $row["demourl"]. " ";
        }
    } else {
        $return .=  "0 results";
    }


    return $return;

}

function getWeekOfTestsForALLURL($conn, $URL) {

    $sql = "SELECT webpagetest_results.created_at as created, tests.url as testurl, concat(\"http://webpagetest.imgeng.in/result/\", webpagetest_results.id) as wpturl, concat(\"https://demo.imgeng.in/#!/summary/\",  webpagetest_results.test_id, \"?showall=true\") as demourl from webpagetest_results INNER JOIN tests on webpagetest_results.test_id = tests.id where webpagetest_results.status = 2 AND webpagetest_results.updated_at >=NOW() - INTERVAL (60 * 24 * 7) MINUTE";

    $result = $conn->query($sql);
    $return = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $return .=  "<br>";
            $return .=  $row["created"]. " ";
            $return .=  $row["testurl"]. " ";
            $return .=  $row["wpturl"]. " ";
            $return .=  $row["demourl"]. " ";
        }
    } else {
        $return .=  "0 results";
    }


    return $return;

}

// Given a URL, retrieve all FAILED results (time period)  (helpful for sales)
function getWeekOfFailedTestsForURL($conn, $URL) {

    $sql = "SELECT webpagetest_results.created_at as created, tests.url as testurl, concat(\"http://webpagetest.imgeng.in/result/\", webpagetest_results.id) as wpturl, concat(\"https://demo.imgeng.in/#!/summary/\",  webpagetest_results.test_id, \"?showall=true\") as demourl from webpagetest_results INNER JOIN tests on webpagetest_results.test_id = tests.id where tests.url = \"$URL\" AND webpagetest_results.status != 2 AND webpagetest_results.updated_at >=NOW() - INTERVAL (60 * 24 * 7) MINUTE";

    $result = $conn->query($sql);
    $return = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $return .=  $row["created"]. " ";
            $return .=  $row["testurl"]. " ";
            $return .=  $row["wpturl"]. " ";
            $return .=  $row["demourl"]. "\n";
        }
    } else {
        $return .=  "0 results";
    }


    return $return;

}


// Summary info, given a list (sales reporting)
function getTestsFromIDS($conn, $IDS) {

    $sql = "SELECT tests.url as testurl, concat(\"https://demo.imgeng.in/#!/summary/\",  webpagetest_results.test_id, \"?showall=true\"), json_extract(webpagetest_results.data, \"$.breakdown\") as demourl FROM webpagetest_results INNER JOIN tests on webpagetest_results.test_id = tests.id where tests.id in (\"$IDS\") and webpagetest_results.status = 2";

    $result = $conn->query($sql);
    $return = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $return .=  $row["testurl"]. " ";
            $return .=  $row["demourl"]. "\n";
        }
    } else {
        $return .=  "0 results";
    }


    return $return;

}


//  Find failures (dev/ops, follow ups)
function getFailedTestsFromIDS($conn, $IDS) {

    $sql = "SELECT tests.url as testurl, concat(\"https://demo.imgeng.in/#!/summary/\",  webpagetest_results.test_id, \"?showall=true\"), json_extract(webpagetest_results.data, \"$.breakdown\") as demourl FROM webpagetest_results INNER JOIN tests on webpagetest_results.test_id = tests.id where tests.id in (\"$IDS\") and webpagetest_results.status != 2";

    $result = $conn->query($sql);
    $return = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $return .=  $row["testurl"]. " ";
            $return .=  $row["demourl"]. "\n";
        }
    } else {
        $return .=  "0 results";
    }


    return $return;

}

//  Find ALL tests given IDS (dev/ops, follow ups)
function getALLTestsFromIDS($conn, $IDS) {

    $sql = "SELECT tests.url as testurl, concat(\"https://demo.imgeng.in/#!/summary/\",  webpagetest_results.test_id, \"?showall=true\"), json_extract(webpagetest_results.data, \"$.breakdown\") as demourl FROM webpagetest_results INNER JOIN tests on webpagetest_results.test_id = tests.id where tests.id in (\"$IDS\") and webpagetest_results.status != 2";

    $result = $conn->query($sql);
    $return = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $return .=  $row["testurl"]. " ";
            $return .=  $row["demourl"]. "\n";
        }
    } else {
        $return .=  "0 results";
    }


    return $return;

}



// What URLs are passing through demo.imgeng.in now (OPS/DEV, Dashboard)
function getResultsByMinute($conn, $MINS) {

$sql = "SELECT `webpagetest_results`.`id`, `webpagetest_results`.`test_id`, `webpagetest_results`.`data`, `webpagetest_results`.`type`, `webpagetest_results`.`status`, `webpagetest_results`.`created_at`, `webpagetest_results`.`updated_at` FROM `imgengdemo`.`webpagetest_results` WHERE webpagetest_results.updated_at >=NOW() - INTERVAL \"$MINS\" MINUTE"; 

    $result = $conn->query($sql);
    $return = "";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $return .=  $row["id"]. " ";
            $return .=  $row["test_id"]. " ";
            $return .=  $row["data"]. " ";
            $return .=  $row["type"]. " ";
            $return .=  $row["status"]. " ";
            $return .=  $row["created_at"]. " ";
            $return .=  $row["updated_at"]. "\n";
        }
    } else {
        $return .=  "0 results";
    }


    return $return;

}




function emailHash($email) {

    $hash   = md5($email);
    $return = strrev($hash);
    return $return;
}

/*
+-----------+-----------------+------+-----+-------------------+-----------------------------+
| Field     | Type            | Null | Key | Default           | Extra                       |
+-----------+-----------------+------+-----+-------------------+-----------------------------+
| id        | int(6) unsigned | NO   | PRI | NULL              | auto_increment              |
| campaign  | varchar(30)     | NO   |     | NULL              |                             |
| email     | varchar(256)    | YES  |     | NULL              |                             |
| UA        | varchar(512)    | YES  |     | NULL              |                             |
| timestamp | timestamp       | NO   |     | CURRENT_TIMESTAMP | on update CURRENT_TIMESTAMP |
+-----------+-----------------+------+-----+-------------------+-----------------------------+
*/

function emailOpen($conn, $email, $campaign, $ua) {
 // id, campaign, email, timestamp, 

    $sql = "INSERT INTO emailOpen (email, campaign, UA) VALUES(\"$email\", \"$campaign\", \"$ua\") "; 

    $result = $conn->query($sql);

}

function emailBlacklist($conn, $email) {

    $sql = "INSERT INTO emailBlacklist (email, timestamp) VALUES(\"$email\", NOW()) ON DUPLICATE KEY UPDATE timestamp=NOW()"; 

    $result = $conn->query($sql);

}


// scoted from https://stackoverflow.com/questions/3161816/get-first-n-characters-of-a-string
function truncate($string,$length=35,$append="&hellip;") {
  $string = trim($string);

  if(strlen($string) > $length) {
    $string = wordwrap($string, $length, "\n", TRUE);
    $string = explode("\n", $string, 2);
    $string = $string[0] . $append;
  }

  return $string;
}





/* 




SELECT `webpagetest_results`.`id`,
    `webpagetest_results`.`test_id`,
    `webpagetest_results`.`data`,
    `webpagetest_results`.`type`,
    `webpagetest_results`.`status`,
    `webpagetest_results`.`created_at`,
    `webpagetest_results`.`updated_at`
FROM `imgengdemo`.`webpagetest_results` WHERE webpagetest_results.updated_at >=NOW() - INTERVAL 60 MINUTE;




*/
