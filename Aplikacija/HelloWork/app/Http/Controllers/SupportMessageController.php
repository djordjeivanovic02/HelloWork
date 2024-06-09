<?php

namespace App\Http\Controllers;

use App\Models\SupportMessages;
use Exception;
use Illuminate\Http\Request;

class SupportMessageController extends Controller
{
    public function saveReport(Request $request)
    {
        try {
            $message = new SupportMessages();
            $message->sender_name = $request->input('senderName');
            $message->sender_email = $request->input('senderEmail');
            $message->message = $request->input('message');
            $message->save();

            return response()->json(['type' => 'success', 'message' => 'Uspešno sačuvan report'], 200);
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 200);
        }
    }

    public function readMessage($id)
    {
        try {
            $message = SupportMessages::where('id', $id)->first();
            if ($message) {
                $message->readed = 1;
                $message->save();
                return response()->json(['type' => 'success', 'message' => 'Uspešno pročitana poruka'], 200);
            } else {
                return response()->json(['type' => 'error', 'message' => "Došlo je do greške"], 200);
            }
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 200);
        }
    }
}
