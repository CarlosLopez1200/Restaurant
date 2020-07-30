<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class DessertController extends Controller
{
    public function DessertStore() {
        $collection = (new MongoDB\Client)->Restaurant->Dessert;
        $dessertCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $desserts = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('Dessert.index', ['desserts' => $desserts, 'dessertCount' => $dessertCount]);
    }

    //User

    public function AddComment() {
        $collection = (new MongoDB\Client)->Restaurant->Dessert;
        $comment = [
            "user_id" => request('userid'),
            "comment" => request('comment'),
            "date" => date("Y-m-d H:i:s")            ];
        $dessert= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('dessertid')) ]);
        $Comments = $dessert->Comments;
        if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
            $Comments = [$comment];
        } else {
            $Comments = [$comment, ...$Comments];
        }
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request('dessertid'))
        ],[
            '$set' => [ 'Comments' => $Comments ]
        ]);

        return redirect("/Dessert/".request('dessertid'));
    }

    public function Details($id) {
        $collection = (new MongoDB\Client)->Restaurant->Dessert;
        $dessert = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
        return view('Dessert.Details', [ "dessert" => $dessert]);
    }

    //ADMIN

    public function Index() {
        $collection = (new MongoDB\Client)->Restaurant->Dessert;
        $desserts = $collection->find();  
        return view('Admin.Dessert.index', ['desserts' => $desserts]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->Restaurant->Dessert;
        $dessert = $collection->find();
        return view('admin.Dessert.create', [ "desserts" => $dessert ]);
    }

    public function Store() {
        $dessert = [
            "recipe_name" => request("recipe_name"),
            "flavors" => request("flavors"),
            "price" => request("price"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->Restaurant->Dessert;
        $insertOneResult = $collection->insertOne($dessert);
        return redirect("/admin/Dessert");
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->Restaurant->Dessert;
        $dessert = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Dessert.edit', [ "dessert" => $dessert ]);
    }    
    
    public function Update(){
        $collection = (new MongoDB\Client)->Restaurant->Dessert;
        $dessert = [
            "recipe_name" => request("recipe_name"),
            "flavors" => request("flavors"),
            "price" => request("price"),
            "Rating" => [],
            "Comments" => []
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("dessertid"))
        ], [
            '$set' => $dessert
        ]);
        return redirect('/admin/Dessert/');
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->Restaurant->Dessert;
        $dessert = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Dessert.delete', [ "dessert" => $dessert ]);
    }
    
    public function Remove(){
        $collection = (new MongoDB\Client)->Restaurant->Dessert;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("dessertid"))
        ]);
        return redirect('/admin/Dessert/');
    }

    public function Show($id) {
        $collection = (new MongoDB\Client)->Restaurant->Dessert;
        $dessert = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('admin.Dessert.details', [ "dessert" => $dessert ]);
    }

}