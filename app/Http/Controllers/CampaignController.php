<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;


class CampaignController extends Controller
{
     
        public function index(Request $request)
        {
            $campaigns = Campaign::all();
            return response()->json($campaigns);
        }
    
        public function store(Request $request)
        {
            //print_r ($request);
            //  return response()->json($request);
        
            $request->validate([
                'user_id' => 'required|exists:allusers,id',
                'cause' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'goal_amount' => 'required|numeric|min:0',
                'current_amount' => 'nullable|numeric|min:0',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'beneficiary_name' => 'required|string|max:255',
                'beneficiary_age' => 'required|integer|min:0',
                'beneficiary_city' => 'required|string|max:255',
                'beneficiary_mobile' => 'required|string|max:255',
                'status' => 'required|in:active,inactive,pending',
            ]);
    
            $user = new Campaign();
            $user->fill($request->input());
            //$user->password = bcrypt($request->password);       // hashing of password
            $user->save();
            return response()->json($user);
        }
          
        public function show($id)
        {
            $user = Campaign::findOrFail($id);
            return response()->json($user);
        }
    
        public function update(Request $request, $id)
        {
            
         $user = Campaign::findOrFail($id);
         $request->validate([
            'user_id' => 'required|exists:allusers,id',
            'cause' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'goal_amount' => 'required|numeric|min:0',
            'current_amount' => 'nullable|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'beneficiary_name' => 'required|string|max:255',
            'beneficiary_age' => 'required|integer|min:0',
            'beneficiary_city' => 'required|string|max:255',
            'beneficiary_mobile' => 'required|string|max:255',
            'status' => 'required|in:active,inactive,pending',
        ]);
    
        $user->fill($request->input());
        $user->save();
        return response()->json($user);
        }
    
        public function destroy($id)
        {
         $user = Campaign::findOrFail($id);
         $user->delete();
         return response()->json($user);
        }
    
    }
    

