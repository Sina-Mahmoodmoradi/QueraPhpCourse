<?php

function getSurveyResults($db)
{
/*    $sql="SELECT * FROM surveys ORDER BY created_at DESC";
    $stmt=$db->prepare($sql);
    $stmt->execute();
    $surveys=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $sql="SELECT * FROM survey_votes";
    $stmt=$db->prepare($sql);
    $stmt->execute();
    $votes=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $results=[];
    foreach($surveys as $row){
        $results[$row['id']]=['id'=>(int)$row['id'],
            'created_at'=>(int)$row['created_at'],
            'question'=>$row['question'],
            'votes_count'=>0,
            'votes_sum'=>0
        ];
    }
    foreach($votes as $vote){
        $results[$vote['survey_id']]['votes_count']++;
        $results[$vote['survey_id']]['votes_sum']+=$vote['choice'];
    }
    $result=[];
    foreach($results as $res){
        $result[]=$res;
    }
    return $result;*/

    $sql="SELECT s.id , created_at , question , COUNT(choice) as votes_count, SUM(choice) as votes_sum
      FROM surveys as s INNER JOIN survey_votes as v
      ON s.id = survey_id
      GROUP BY question
      ORDER BY created_at DESC";
    return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

$host = "localhost";
$username = "root";
$password = "";
$dbname = "survey";

try {
    $db = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

$template_path = "template.php";
if (file_exists($template_path)) {
    include $template_path;
}
