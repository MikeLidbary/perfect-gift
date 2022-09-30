<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Receive and send whatsapp message
     * @param Request $request
     */
    public function respond(Request $request)
    {
        $response = trim($request->Body);
        $whatsapp_number = $request->From;
        $user = User::where('whatsapp_number', $whatsapp_number)->first();
        if (!$user) {
            $user = new User();
            $user->whatsapp_number = $whatsapp_number;
            $user->save();
        }

        if (strtolower($response) == 'gift' || empty($response)) {
            $question = Question::find(1);               
            $reply = $question->template;
        } else {
            Survey::saveSurvey($user->id,$response);
            $reply = "Great! We have received your answers. We will get back to you with the perfect gift ideas in a few hours.";
        }
        return Question::send($whatsapp_number, $reply);
    }

    /**
    * Show the gift ideas form.
    *
    * @return Response
    */
    public function giftIdeas()
    {
        $numbers = User::select('id', 'whatsapp_number')->get();
        return view('welcome', compact('numbers'));
    }

    /**
    * Validate and send gift ideas whatsapp message
    * @param Request $request
    * @return Response
    */
    public function sendGiftIdeas(Request $request)
    {
        //validate posted data
        $validate = $request->validate([
            'whatsapp_number' => 'required',
            'gift_idea' => 'required',
        ]);

        $whatsapp_number = $request->whatapp_number;

        $gift_idea = $request->gift_idea;

        Question::send($whatsapp_number, $gift_idea);

        return back()->with(['success' => "Gift idea sent successfully."]);
    }
}
