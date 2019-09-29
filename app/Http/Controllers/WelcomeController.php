<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class WelcomeController extends Controller
{
     
    
         public function home() {
           return view('home.home');
    }
     public function emailHome() {
           return view('home.home');
    }
    
        public function email($id) {
           return '--------------'.$id;
           exit();
    }
    
         public function search() {
          return view('search');
    }
    
           public function searchR(   ) {
 
          return 'get request reciver';
          exit();
    }
    
         public function searchRe(Request $request ) {
       
          $get_search= $request->search;
        //  echo $get_search;

             $data = DB::table('tbl_customer')
                ->where('CustomerName', 'like', '%'.$get_search.'%')
                ->orWhere('Address', 'like', '%'.$get_search.'%')
//                ->orWhere('City', 'like', '%'.$get_search.'%')
//                ->orWhere('PostalCode', 'like', '%'.$get_search.'%')
//                ->orWhere('Country', 'like', '%'.$get_search.'%')
//                ->orderBy('CustomerID', 'desc')
                ->get();
             if($data){
                 foreach ($data as $value => $search) {
                     echo '<tr><td>'.$search->CustomerName. '</td><td>'.$search->Address.'</td></tr>';
                 }
             }
        
          exit();
    }
    
    
          
  
    
    
    
}
