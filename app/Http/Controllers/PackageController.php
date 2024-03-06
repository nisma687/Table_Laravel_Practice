<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageRequest;
use App\Http\Resources\PackageResource;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PackageController extends Controller
{
    public function index(){
        $packages = Package::withTrashed()->get();

        $packages = PackageResource::collection($packages);

        if($packages) {
            return response()->json([
                "status"=> "success",
                "message"=> "you got the data",
                "data"=> $packages
            ]);
        } else {
            return response()->json([
                "status"=> "success",
                "message"=> "No data Found "
            ]);
        }
    }
    // with trashed value shown
    public function valueTrash(){
        $packages=Package::withTrashed()->all();
        if(count($packages)> 0){
            return response()->json([
                "status"=> "success",
                "message"=> "you got everything including trashed data",
                "data"=> $packages
            ]);
        }else{
            return response()->json([
                "status"=> "success",
                "message"=> "No trashed data Found "
            ]);
        }
       
    }

    public function store(PackageRequest $request){

        $validatedData = $request->validated();


        $package = Package::create($validatedData);
        
        return response()->json([
            "status"=> "success",
            "message"=> "Package created successfully",
            "data"=> $package
        ]);
    }
  
    public function storeAndUpdate(PackageRequest $request){
        // return $request->all();
        // dd($request->all());
        $findData= Package::find($request->id);
        if($findData){
            $validateData=$request->validated();
            $findData->update($validateData);
            if($findData){
                return response()->json([
                    "status"=> "success",
                    "message"=> "Package Updated successfully",
                    "updated-data"=> "your data was updated",
                ]);
            }
            else{
                return response()->json([
                    "status"=> "success",
                    "message"=> "No updated data "
                ]);

            }


        }
        else{
            $validateData=$request->validated();
            $storePackage=Package::create($validateData);
            if($storePackage){
                return response()->json([
                    "status"=> "success",
                    "message"=> "stored data successfully"
                ]);
            }
            else{
                return response()->json([
                    "status"=> "success",
                    "message"=> "data not stored"
                ]);

            }


        }
    }
    public function CreateOrUpdate(PackageRequest $request, Package $package){
        $validateData=$request->validated();

        Package::updateOrCreate($validateData);
        if($package){
            return response()->json([
                
                    "status"=> "success",
                    "message"=> "stored data successfully"
               
            ]);
        }
        else{
            return response()->json([
                "status"=> "success",
                "message"=> "data not stored"
            ]);
        }
    }
    public function update(PackageRequest $request, $id){
        $package=Package::find($id);

        if($package){
            $validateData = $request->validated();
            $package->update($validateData);

            return response()->json([
                "status"=> "success",
                "message"=> "Package Updated successfully",
                "updated-data"=> $package
            ]);
        }else{
            return response()->json([
                "status"=> "success",
                "message"=> "package not found",
                
            ]);
        }
    }
   
    public function show($id){
        $package=Package::find($id);
        if($package){
            return response()->json([
                "status"=> "success",
                "message"=> "Package Found!!",
                "data"=> $package
            ]);
        }else{
            return response()->json([
                "status"=> "success",
                "message"=> "package not found",
                
            ]);
        }
    }
    public function destroy($id){
        $package=Package::find($id);
        if($package){
            $package->delete();
            return response()->json([
                "status"=> "success",
                "message"=> "deleted successfully!!",
                "data"=> $package
            ]);
            
        }else{
            return response()->json([
                "status"=> "success",
                "message"=> "package id not found",
                
            ]);
        }
    }
    public function restore($id){
        $packages=Package::withTrashed()->find($id);
        
        if($packages){
            $packages->restore();
            return response()->json([
                "status"=> "success",
                "message"=> "successfully restored the data"
            ]);
        }
        else{
            return response()->json([
                "status"=> "success",
                "message"=> "sorry couldn't find any trashed data",
            ]);
        }
    }
    
    public function DeleteOrRestore($id){
        $packages=Package::withTrashed()->find($id);
        $message = "";
        if($packages->deleted_at != null){
            $packages->restore();
            $message = "restored";
        }
        else{
            $packages->delete();
            $message = "deleted";
        }

        return response()->json([
            "status"=> "success",
            "message"=> "successfully $message the data"
        ]);
    }
    
























}
