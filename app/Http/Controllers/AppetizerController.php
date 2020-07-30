<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class appetizerController extends Controller
{
    public function AppetizerStore() {
        $collection = (new MongoDB\Client)->Restaurant->Appetizers;
        $appetizerCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $appetizers = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('Appetizers.index', ['appetizers' => $appetizers, 'appetizerCount' => $appetizerCount]);
    }

    //User

    public function AddComment() {
        $collection = (new MongoDB\Client)->Restaurant->Appetizers;
        $comment = [
            "user_id" => request('userid'),
            "comment" => request('comment'),
            "date" => date("Y-m-d H:i:s")            ];
        $appetizer= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('appetizerid')) ]);
        $Comments = $appetizer->Comments;
        if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
            $Comments = [$comment];
        } else {
            $Comments = [$comment, ...$Comments];
        }
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request('appetizerid'))
        ],[
            '$set' => [ 'Comments' => $Comments ]
        ]);

        return redirect("/Appetizers/".request('appetizerid'));
    }

    public function Details($id) {
        $collection = (new MongoDB\Client)->Restaurant->Appetizers;
        $appetizer = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
        return view('Appetizers.Details', [ "appetizer" => $appetizer]);
    }

    //ADMIN

    public function Index() {
        $collection = (new MongoDB\Client)->Restaurant->Appetizers;
        $appetizers = $collection->find();  
        return view('Admin.Appetizers.index', ['appetizers' => $appetizers]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->Restaurant->Appetizers;
        $appetizer = $collection->find();
        return view('admin.Appetizers.create', [ "appetizers" => $appetizer ]);
    }

    public function Store() {
        $appetizer = [
            "Name" => request("Name"),
            "Price" => request("Price"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->Restaurant->Appetizers;
        $insertOneResult = $collection->insertOne($appetizer);
        return redirect("/admin/Appetizers");
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->Restaurant->Appetizers;
        $appetizer = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Appetizers.edit', [ "appetizer" => $appetizer ]);
    }    
    
    public function Update(){
        $collection = (new MongoDB\Client)->Restaurant->Appetizers;
        $appetizer = [
            "Name" => request("Name"),
            "Price" => request("Price"),
            "Rating" => [],
            "Comments" => []
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("appetizerid"))
        ], [
            '$set' => $appetizer
        ]);
        return redirect('/admin/Appetizers/');
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->Restaurant->Appetizers;
        $appetizer = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Appetizers.delete', [ "appetizer" => $appetizer ]);
    }
    
    public function Remove(){
        $collection = (new MongoDB\Client)->Restaurant->Appetizers;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("appetizerid"))
        ]);
        return redirect('/admin/Appetizers/');
    }

    public function Show($id) {
        $collection = (new MongoDB\Client)->Restaurant->Appetizers;
        $appetizer = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('admin.Appetizers.details', [ "appetizer" => $appetizer ]);
    }

}