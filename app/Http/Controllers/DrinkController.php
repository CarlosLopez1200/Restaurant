<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class DrinkController extends Controller
{
    public function DrinkStore() {
        $collection = (new MongoDB\Client)->Restaurant->Drinks;
        $drinkCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $drinks = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('Drinks.index', ['drink' => $drinks, 'drinkCount' => $drinkCount]);
    }

    //USER

    public function AddComment() {
        $collection = (new MongoDB\Client)->Restaurant->Drinks;
        $comment = [
            "user_id" => request('userid'),
            "comment" => request('comment'),
            "date" => date("Y-m-d H:i:s")            ];
        $drink= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('drinkid')) ]);
        $Comments = $drink->Comments;
        if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
            $Comments = [$comment];
        } else {
            $Comments = [$comment, ...$Comments];
        }
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request('drinkid'))
        ],[
            '$set' => [ 'Comments' => $Comments ]
        ]);

        return redirect("/Drinks/".request('drinkid'));
    }

    public function Details($id) {
        $collection = (new MongoDB\Client)->Restaurant->Drinks;
        $drink = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
        return view('Drinks.Details', [ "drink" => $drink]);
    }

    //ADMIN

    public function Index() {
        $collection = (new MongoDB\Client)->Restaurant->Drinks;
        $drinks = $collection->find();  
        return view('Admin.Drinks.index', ['drink' => $drinks]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->Restaurant->Drinks;
        $drink = $collection->find();
        return view('admin.Drinks.create', [ "drink" => $drink ]);
    }

    public function Store() {
        $drink = [
            "Beverage" => request("Beverage"),
            "Price" => request("Price"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->Restaurant->Drinks;
        $insertOneResult = $collection->insertOne($drink);
        return redirect("/admin/Drinks");
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->Restaurant->Drinks;
        $drink = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Drinks.edit', [ "drink" => $drink ]);
    }    
    
    public function Update(){
        $collection = (new MongoDB\Client)->Restaurant->Drinks;
        $drink = [
            "Beverage" => request("Beverage"),
            "Price" => request("Price"),
            "Rating" => [],
            "Comments" => []
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("drinkid"))
        ], [
            '$set' => $drink
        ]);
        return redirect('/admin/Drinks/');
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->Restaurant->Drinks;
        $drink = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Drinks.delete', [ "drink" => $drink ]);
    }
    
    public function Remove(){
        $collection = (new MongoDB\Client)->Restaurant->Drinks;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("drinkid"))
        ]);
        return redirect('/admin/Drinks/');
    }

    public function Show($id) {
        $collection = (new MongoDB\Client)->Restaurant->Drinks;
        $drink = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('admin.Drinks.details', [ "drink" => $drink ]);
    }

}