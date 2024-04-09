<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use App\Models\conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;


class ChatController extends Controller
{

    public function messagesList(){
        return view('frontend.pages.pages_settings.layout_settings');
    }
    public function messagesList_json()
    {
        $authUserId = Auth::id();


            // $users = Conversation::where(function ($query) use ($authUserId) {
            //     $query->where('user_1', '==', $authUserId)
            //         ->orWhere('user_2', '==', $authUserId);
            // })
            //  // Eager load the user1 and user2 relationships
            // ->get();

            $users = Conversation::latest()->where('user_1', $authUserId)
            ->orWhere('user_2', $authUserId)
            ->with(['user1', 'user2','ads'])
            ->get();
       

        $data = [
            'users' => $users,
        
        ];
    
        return Response::json($data);
    }

    public function userMessages($user_id)
    {
        // Get authenticated user's ID
        $authUserId = Auth::id();

        // Retrieve chat messages between users
        $messages = Chat::where(function ($query) use ($authUserId, $user_id) {
            $query->where('from_id', $authUserId)
                  ->where('to_id', $user_id);
        })
        ->orWhere(function ($query) use ($authUserId, $user_id) {
            $query->where('from_id', $user_id)
                  ->where('to_id', $authUserId);
        })
        ->get();

        // Prepare JSON response with messages and user_id
        $responseData = [
            'user_id' => $user_id,
            'messages' => $messages,
        ];

        return response()->json($responseData);
    }

  

    public function addMessage(Request $request)
    {
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer', // Ensure user_id is required and is an integer
            'message' => 'required|string', // Ensure message is required and is a string
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return Response::json(['error' => $validator->errors()->first()], 400);
        }
    
        $authUserId = Auth::id();
        $toUserId = $request->input('user_id');
    
        // Create a new chat message
        $chatMessage = Chat::create([
            'from_id' => $authUserId,
            'to_id' => $toUserId,
            'message' => $request->input('message'),
            'opened' => 0,
        ]);
    
        // Check if the chat message was created successfully
        if ($chatMessage) {
            // Check if a conversation already exists between the users
            $conversation = Conversation::where(function ($query) use ($authUserId, $toUserId) {
                $query->where('user_1', $authUserId)
                      ->where('user_2', $toUserId);
            })
            ->orWhere(function ($query) use ($authUserId, $toUserId) {
                $query->where('user_1', $toUserId)
                      ->where('user_2', $authUserId);
            })
            ->first();
    
            // Create a new conversation if it does not exist
            if (!$conversation) {
                Conversation::create([
                    'user_1' => $authUserId,
                    'user_2' => $toUserId,
                    'AD_id' => $request->ads_id, 
                ]);
            }
    
            // Return success response with chat message data
            return Response::json(['message' => 'Message Sent Successfully', 'chat_message' => $chatMessage], 200);
        } else {
            // Return error response if message creation fails
            return Response::json(['error' => 'Failed to send message'], 500);
        }
    }
}
