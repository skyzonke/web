<?php
$questions=[
    array(
        "name" => "ultime",
        "type" => "text",
        "text" => "Quelle est la réponse ultime",
        "answer" => "42",
        "score" => 1
    ),
    array(
        "name" => "cheval",
        "type" => "radio",
        "text" => "Quelle est la couleur du cheval blanc d'henri IV ?",
        "choices" => [
            array(
                "text" => "Bleu",
                "value" => "bleu"),
            array(
                "text" => "Vert",
                "value" => "vert"),
            array(
                "text" => "Blanc",
                "value" => "blanc")
            ],
        "answer" => "blanc",
        "score" => 2
    )
        ];

$questions_total = 0;
$question_correct = 0;
$score_max = 0;
$score = 0;

// Affichage d'une question de type text
function question_text($q){
    echo $q['text'] ."<br/><input type='text' name='$q[name]'><br/>";
}

// traitement de la réponse à une question de type text
function answer_text($q,$v){
    global $question_correct,$score_max, $score;
    $score_max += $q['score'];
    if (is_null($v)) return;
    if ($q['answer'] == $v){
        $question_correct += 1;
        $score += $q['score'];
    }
}

function question_radio($q){
    $html = $q['text'] . "<br/>";
    $i = 0;
    foreach($q['choices'] as $c){
        $i += 1;
        $html .= "<input type='radio' name='$q[name]' value='$c[value]' id='$q[name]-$i'>";
        $html .= "<label for='$q[name]-$i'>$c[text]</label>";
    }
    echo $html;
}

$question_handlers = array(
    "text" => "question_text",
    "radio" => "question_radio",
    "checkbox" => "question_checkbox"
);
$answer_handlers = array(
    "text" => "answer_text",
    "radio" => "answer_text",
    "checkbox" => "answer_checkbox"
);

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    // On présente les questions
    echo "<fieldset>
    <legend>Quizzz</legend><br/><br/>";
    echo "<form method='POST' action='quizz.php'><ol>";
    foreach ($questions as $q){
        echo "<li>";
        $question_handlers[$q['type']]($q);
    }
    echo "</ol><input type='submit' value='Repondre'></form><fieldset>";
}
else{
    // On répond au client et on calcule son score
    $questions_total = 0;
    $questions_total=0;
    $question_correct=0;
    $score_max=0;
    $score=0;
    foreach ($questions as $q){
        $questions_total += 1;
        $answer_handlers[$q['type']]($q, $_POST[$q['name']] ?? NULL);
    }
    echo "Réponses correctes:" . $question_correct . "/" . $questions_total ."<br/>";
    echo "Votre score: " . $score . "/" . $score_max ."<br/>"; 
}
