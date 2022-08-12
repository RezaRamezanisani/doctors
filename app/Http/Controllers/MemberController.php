<?php

namespace App\Http\Controllers;
use App\Http\Middleware\Doctor;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;





class MemberController extends Controller
{

     public function pageMember(){

//         $doctors = User::with("category")->latest()->get();
         $categories = Category::all();
;
//         LeftJoin("categories","categories.id","=","users.category_id")->get()
        return view("doctor.member",compact("categories"));

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//        $doctors = User::with("category")->get();
//        return  view("tables.table_doctors",compact("doctors"));
//
//    }

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

        //  'dob' => 'date_format:Y-m-d|nullable',
        // 'email' => 'email:rfc,dns',
        // 'bsa_id' => 'integer|min:1|nullable',
        // 'active' => 'boolean'

//         password confirmed hours accepted
        if(is_numeric($request->email_phone)) {
            $request->validate([
                "name" => "required|regex:/^[\w\s\d]+$/u",
                "email_phone" => "required|regex:/^[0-9]{11}+$/|unique:users,email_phone",
                "password" => "required|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}/",
                "skill" => "required|in:1,2,3,4",
                "hours_of_work" => "required_without_all",
                "img" => "nullable|max:3000|image|mimes:jpg,png,jpeg"
            ]);
        }else{
          $request->validate([
                  "name" => "required|regex:/^[\w\s\d]+$/u",
                  "email_phone" => "required|email|unique:users,email_phone",
                  "password" => "required|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}/",
                  "skill" => "required|in:1,2,3,4",
                  "hours_of_work" => "required_without_all",
                  "img" => "nullable|max:3000|image|mimes:jpg,png,jpeg"
                ]);
        }
        $img = $request->file('img');
        if($img){
            $img_name= $img->getClientOriginalName();
            $new_img_name = time().".".$img->getClientOriginalExtension();

//            php artisan storage:link   for view image

            $img->storeAs("public/images",$new_img_name);
        }else{
            $new_img_name= 'doctor.jpg';
        }
        if(in_array("بعد از ظهر",$request->hours_of_work)){
            $hours_of_work="بعد از ظهر";
        }elseif (in_array("صبح",$request->hours_of_work)){
            $hours_of_work="صبح";
        }

        $arr_user = array(
            "role_id"=>2,
            "category_id"=>$request->skill,
            "name"=>$request->name,
            "email_phone"=>$request->email_phone,
            "password"=>Hash::make($request->password),
            "hours_of_work"=>$hours_of_work,
            "img"=>$new_img_name
        );
        $user = User::create($arr_user);
        $category = Category::where('id',$user->category_id)->first();
        $user['category']=$category->skill;


        Image::make(public_path("storage/images/".$new_img_name))->resize(80,80)->save(public_path("upload/".$new_img_name),100);
        if($user){
            return response()->json(['status' => 200,"user"=>$user]);
        }else{
            return response()->json(["status"=>499]);
        }

    }






//            }else if($request->has("morning")){
//                $validate = Validator::make($request->all(),
//                [
//                    "name"=>["required","regex:/^[\w\s\d]+$/u"],
//                    "email_phone"=>["required","integer","min:11","max:11","regex:/^[0-9]+$/"],
//                    "password"=>["required","regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}/"],
//                    "skill"=>["required","in:'پزشک عمومی','داخلی','گوش و حلق بینی','کلیوی','زیبایی','قلب و عروق','مغز و اعصاب"],
//                    "morning"=>["required","boolean"],
//                    "img"=>["nullable","max:3000","image","mimes:jpg,png,jpeg"]
//                ]);
//            }
            // else{
            //     return response()->json([
            //         "status"=>100,
            //         "error"=>"خطا"
            //     ]);
            // }

//        }else{
//            $validate = Validator::make($request->all(),[
//                "name"=>["required","regex:/^[\w\s\d]+$/u"],
//                "email_phone"=>["required","email"],
//                "password"=>["required","regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}/"],
//                "skill"=>["required","in:'پزشک عمومی','داخلی','گوش و حلق بینی','کلیوی','زیبایی','قلب و عروق','مغز و اعصاب"],
//                "morning"=>["required","boolean"],
//                "img"=>["nullable","max:3000","image","mimes:jpg,png,jpeg"]
//            ]);
//        }
//         if($validate->passes()){
//             return response()->json([
//                 "status"=>200,
//             ]);
//         }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editUpdate($id)
    {
        $doctor = User::with('category')->where('id','=',$id)->first();

        return response()->json(['status' => 200,"user"=>$doctor]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(is_numeric($request->email_phone)){
            $request->validate([
                "name"=>"required|regex:/^[\w\s\d]+$/u",
                "email_phone"=>"required|regex:/^[0-9]{11}+$/",
                "skill"=>"required|in:1,2,3,4",
                "hours_of_work"=>"required_without_all",
                "img"=>"nullable|max:3000|image|mimes:jpg,png,jpeg"
            ]);

        }else{

            $request->validate([
                "name"=>"required|regex:/^[\w\s\d]+$/u",
                "email_phone"=>"required|email",
                "skill"=>"required|in:1,2,3,4",
                "hours_of_work"=>"required_without_all",
                "img"=>"nullable|max:3000|image|mimes:jpg,png,jpeg"
            ]);

        }
        $user = User::findOrFail($id);
        if($request->hasFile("img")){
             $img = $request->file("img");
             $new_name_img = time().$img->getClientOriginalName();
             $img->storeAs("public/images",$new_name_img);
            Image::make(public_path("storage/images/".$new_name_img))->resize(80,80)->save(public_path("upload/".$new_name_img),100);
            if($user->img !== "doctor.jpg"){
                     Storage::delete('upload/'.$user->img);
//                   Storage::delete('public/images/'.$user->img);
             }
        }else{
            $new_name_img = $user->img;
        }
        if(in_array("بعد از ظهر",$request->hours_of_work)){
            $hours_of_work="بعد از ظهر";
        }elseif (in_array("صبح",$request->hours_of_work)){
            $hours_of_work="صبح";
        }
        $arr_user = [
            "name"=>$request->name,
            "email_phone"=>$request->email_phone,
            "category_id"=>$request->skill,
            "img"=> $new_name_img,
            "hours_of_work"=>$hours_of_work,
        ];
        $user->update($arr_user);

        return response()->json(["status"=>200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(["status"=>200]);
    }
}
