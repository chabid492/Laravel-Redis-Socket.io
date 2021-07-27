<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Image;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee=Employee::get()->toArray();
        return response()->json($employee);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['email','unique:employees','required','string','max:255'],
            'phone' => ['required'],
            'salary' => ['required'],
            'address' => ['required'],
            'photo' => ['required'],
            'joindate' => ['required'],
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['salary']=$request->salary;
        $data['address']=$request->address;
        $data['joindate']=$request->joindate;

        if ($request->photo) {
            $position=strpos($request->photo,';');
            $sub=substr($request->photo,0,$position);
            $ext=explode('/',$sub)[1];

            $name=time().".".$ext;
            $img=Image::make($request->photo)->resize(240,200);
            $upload_path="upload/employee/";
            $img_url=$upload_path.$name;
            $img->save($img_url);

            $data['photo']=$img_url;

        }

        $result=Employee::create($data);
        if ($result){
            return response()->json([
                'message' => 'success'
            ],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($id);
        $employee =Employee::where('id',$id)->first();
        return response()->json($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['sallery'] = $request->sallery;
        $data['address'] = $request->address;
        $data['joining_date'] = $request->joining_date;
        $image = $request->newphoto;

        if ($image) {
            $position = strpos($image, ';');
            $sub = substr($image, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time().".".$ext;
            $img = Image::make($image)->resize(240,200);
            $upload_path = 'upload/employee/';
            $image_url = $upload_path.$name;
            $success = $img->save($image_url);

            if ($success) {
                $data['photo'] = $image_url;
                $img =Employee::where('id',$id)->first();
                $image_path = $img->photo;
                $done = unlink($image_path);
                $user  =Employee::where('id',$id)->update($data);
            }

        }else{
            $oldphoto = $request->photo;
            $data['photo'] = $oldphoto;
            $user =Employee::where('id',$id)->update($data);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee =Employee::where('id',$id)->first();
        $photo = $employee->photo;
        if ($photo) {
            unlink($photo);
            Employee::where('id',$id)->delete();
        }else{
            Employee::where('id',$id)->delete();
        }
    }
}
