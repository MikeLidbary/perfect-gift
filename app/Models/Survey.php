<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    /**
     * Save the response from the whatsapp user
     * @param $user_id
     * @param $answer
     * @param $question_id
     */
    public static function saveSurvey($user_id,$answer,$question_id = 1)
    {
        $survey = new Survey();
        $survey->user_id = $user_id;
        $survey->answer = $answer;
        $survey->question_id = $question_id;
        $survey->save();
    }
}
