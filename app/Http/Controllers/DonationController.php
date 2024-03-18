<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{

        public function index(Request $request)
        {
            $donations = Donation::all();
            return response()->json($donations);
        }
    
        public function store(Request $request)
        {
            //print_r ($request);
            //  return response()->json($request);
        
            $request->validate([
                'donor_id' => 'required|exists:allusers,id',
                'campaign_id' => 'required|exists:campaigns,id',
                'amount' => 'required|numeric|min:0',
                'transaction_date' => 'required|date',
            ]);
    
            $user = new Donation();
            $user->fill($request->input());
            //$user->password = bcrypt($request->password);       // hashing of password
            $user->save();
            return response()->json($user);
        }
          
        public function show($id)
        {
            $user = Donation::findOrFail($id);
            return response()->json($user);
        }
    
        public function update(Request $request, $id)
        {
            
         $user = Donation::findOrFail($id);
         $request->validate([
            'donor_id' => 'required|exists:allusers,id',
            'campaign_id' => 'required|exists:campaigns,id',
            'amount' => 'required|numeric|min:0',
            'transaction_date' => 'required|date',
        ]);
    
        $user->fill($request->input());
        $user->save();
        return response()->json($user);
        }
    
        public function destroy($id)
        {
         $user = Donation::findOrFail($id);
         $user->delete();
         return response()->json($user);
        }
    
    }
    
