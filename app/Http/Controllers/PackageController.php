<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageRequest;
use App\Http\Resources\PackageResource;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(){
        $packages=Package::withTrashed()->get();

        $packages = PackageResource::collection($packages);

        if($packages){
            return response()->json([
                "status"=> "success",
                "message"=> "you got the data",
                "data"=> $packages
            ]);
        }else{
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
    public function update(PackageRequest $request, $id){
        $package=Package::find($id);
        if($package){
            $validateData=$request->validated();
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
    
























}
