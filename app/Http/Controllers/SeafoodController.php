<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class SeafoodController extends Controller
{
    public function SeafoodStore() {
        $collection = (new MongoDB\Client)->Restaurant->Seafood;
        $SeafoodCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $Seafoods = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('Seafood.index', ['Seafoods' => $Seafoods, 'SeafoodCount' => $SeafoodCount]);
    }

    //USER

    public function AddComment() {
        $collection = (new MongoDB\Client)->Restaurant->Seafood;
        $comment = [
            "user_id" => request('userid'),
            "comment" => request('comment'),
            "date" => date("Y-m-d H:i:s")            ];
        $Seafood= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('Seafoodid')) ]);
        $Comments = $Seafood->Comments;
        if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
            $Comments = [$comment];
        } else {
            $Comments = [$comment, ...$Comments];
        }
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request('Seafoodid'))
        ],[
            '$set' => [ 'Comments' => $Comments ]
        ]);

        return redirect("/Seafood/".request('Seafoodid'));
    }

    public function Details($id) {
        $collection = (new MongoDB\Client)->Restaurant->Seafood;
        $Seafood = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
        return view('Seafood.Details', [ "Seafood" => $Seafood]);
    }

    //ADMIN

    public function Index() {
        $collection = (new MongoDB\Client)->Restaurant->Seafood;
        $Seafoods = $collection->find();  
        return view('Admin.Seafood.index', ['Seafoods' => $Seafoods]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->Restaurant->Seafood;
        $Seafood = $collection->find();
        return view('admin.Seafood.create', [ "Seafoods" => $Seafood ]);
    }

    public function Store() {
        $Seafood = [
            "Name" => request("Name"),
            "Price" => request("Price"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->Restaurant->Seafood;
        $insertOneResult = $collection->insertOne($Seafood);
        return redirect("/admin/Seafood");
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->Restaurant->Seafood;
        $Seafood = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Seafood.edit', [ "Seafood" => $Seafood ]);
    }    
    
    public function Update(){
        $collection = (new MongoDB\Client)->Restaurant->Seafood;
        $Seafood = [
            "Name" => request("Name"),
            "Price" => request("Price"),
            "Rating" => [],
            "Comments" => []
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("Seafoodid"))
        ], [
            '$set' => $Seafood
        ]);
        return redirect('/admin/Seafood/');
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->Restaurant->Seafood;
        $Seafood = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Seafood.delete', [ "Seafood" => $Seafood ]);
    }
    
    public function Remove(){
        $collection = (new MongoDB\Client)->Restaurant->Seafood;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("Seafoodid"))
        ]);
        return redirect('/admin/Seafood/');
    }

    public function Show($id) {
        $collection = (new MongoDB\Client)->Restaurant->Seafood;
        $Seafood = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('admin.Seafood.details', [ "Seafood" => $Seafood ]);
    }

}