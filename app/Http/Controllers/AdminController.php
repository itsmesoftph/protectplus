<?php

namespace App\Http\Controllers;

use DB;
use App\FAQ;
use App\User;
use App\Product;
use App\ProductCode;
use App\faq_categories;
use App\faq_category;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function getAdminIndex(){
        $allUsers = DB::table('users')
        ->orderBy('id','asc')
        ->get();


        $allProducts = DB::table('products')
        ->get();

        $countAllProducts = count($allProducts);
        $countAllUser = count($allUsers);


        $countAllUser = count($allUsers);
        return view('admin.index',[
            'allUserCount'      => $countAllUser,
            'allProductCount'   => $countAllProducts
            ]);
    }

    public function getAllUser(){
        // $allUsers = DB::table('users')
        // ->get();

        $userDetails = DB::table('users')
        ->select('users.*','roles.display_name','users.id')
        ->join('roles','roles.id','=','users.role_id')
        ->orderBy('users.id','asc')
        ->get();

        // $allUsers = User::all();
        $allUsers = DB::table('users')
        ->orderBy('id','asc')
        ->get();
        // dd($userDetails);


        return view('admin.user',[
            'allUsers'      =>$allUsers,
            'userDetails'   =>$userDetails
            ]);
    }

    public function getAllRoles(){
        $allRoles = Role::all();
        return view('admin.user-roles',['allRoles'=>$allRoles]);
    }

    public function getUserById($id){
        // $getUserById = User::find($id)
        // ->get();


        $getAllUserRoles = DB::table('roles')
        ->get();

        $getUserById = DB::table('users')
        ->select('users.*','roles.display_name')
        ->join('roles','roles.id','=','users.role_id')
        ->where('users.id',$id)
        ->get();
        // dd($getUserById);

        return view('admin.user-edit',[
            'getUserById'   =>$getUserById,
            'getAllUserRoles'     => $getAllUserRoles
            ]);
    }

    public function updateUserDetails(Request $request, $id){
            // dd($request);
        $user = User::find($id);

        // $affected = DB::table('users')
        // ->where('id',$id)
        // ->get();

        // dd($user->avatar);

        if ($request->hasFile('image')){
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
             DB::table('users')
            ->where('id',$id)
            ->update([
            'shipping_fullname'         => $request->input('shipping_fullname'),
            'shipping_address'          => $request->input('shipping_address'),
            'shipping_city'             => $request->input('shipping_city'),
            'shipping_phone'            => $request->input('shipping_phone'),
            'avatar'                   => $request->image->store('user_uploads','public')
            ]);
        }else{
            if($user->avatar != null){
                DB::table('users')
                ->where('id',$id)
                ->update([
                'shipping_fullname'         => $request->input('shipping_fullname'),
                'shipping_address'          => $request->input('shipping_address'),
                'shipping_city'             => $request->input('shipping_city'),
                'shipping_phone'            => $request->input('shipping_phone'),
                'avatar'                    => $user->avatar
                ]);
            } else {
                 DB::table('users')
                ->where('id',$id)
                ->update([
                'shipping_fullname'         => $request->input('shipping_fullname'),
                'shipping_address'          => $request->input('shipping_address'),
                'shipping_city'             => $request->input('shipping_city'),
                'shipping_phone'            => $request->input('shipping_phone'),
                'avatar'                    => null
                ]);
            }

        }

        return redirect()->route('admin.users')->with('toast_success','User Information was successfully updated!');
    }

    public function createUser(Request $request){

        dd('heelo from create user');

        $user = new User();

        return redirect()->route('admin.users')->with('toast_success','User Information was successfully updated!');

    }

    public function getUserForm(){
        $getAllUserRoles = DB::table('roles')
        ->get();
        return view('admin.user-add-form',['getAllUserRoles'=>$getAllUserRoles]);
    }

    public function addUser(Request $request){

        $user = new User();

        if ($request->hasFile('image')){
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
            User::create([
                'role_id'                   => $request->input('role_id'),
                'name'                      => $request->input('shipping_fullname'),
                'shipping_fullname'         => $request->input('shipping_fullname'),
                'shipping_address'          => $request->input('shipping_address'),
                'shipping_city'             => $request->input('shipping_city'),
                'shipping_phone'            => $request->input('shipping_phone'),
                'email'                     => $request->input('user_email'),
                'password'                  => Hash::make($request['password']),
                'avatar'                    => $request->image->store('users','public')
            ]);
        }else{

            User::create([
                'role_id'                   => $request->input('role_id'),
                'name'                      => $request->input('shipping_fullname'),
                'shipping_fullname'         => $request->input('shipping_fullname'),
                'shipping_address'          => $request->input('shipping_address'),
                'shipping_city'             => $request->input('shipping_city'),
                'shipping_phone'            => $request->input('shipping_phone'),
                'email'                     => $request->input('user_email'),
                'password'                  => Hash::make($request['password']),
                ]);
        }

        return redirect()->route('admin.users')->with('toast_success','New user successfully added!');
    }

    public function getRolesForm(){

        return view('admin.add-user-roles');
    }

    public function addRole(Request $request){

        Role::create([
            'name'                  => $request->input('role_name'),
            'display_name'          => $request->input('role_display_name')

        ]);

        return redirect()->route('admin.roles')->with('toast_success','New user successfully added!');
    }

    public function updateRoles(Request $request, $id){
        DB::table('roles')
        ->where('id',$id)
        ->update([
        'name'                      => $request->input('role_name'),
        'display_name'          => $request->input('role_display_name'),

        ]);

        return redirect()->route('admin.roles')->with('toast_success','Role successfully updated!');
    }

    public function update_getRolesForm(Request $request, $id){
       $roles = DB::table('roles')
       ->where('id',$id)
        ->get();

        // dd($roles);
        return view('admin.edit-user-roles',['roles'=>$roles]);
    }

    public function getAllPProduct(){
        $products = DB::table('products')
        ->get();


        return view('admin.products',['products'=>$products]);
    }

    public function getProductForm($id){

        $products =  DB::table('products')->where('id',$id)->get();
        $product_codes = ProductCode::all();

        // dd($product_codes);
        return view('admin.edit-product',[
            'products'          => $products,
            'product_codes'      => $product_codes
            ]);
    }

    public function updateProduct(Request $request,$id){

    if ($request->hasFile('image')){
        $request->validate([
            'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
        ]);
            DB::table('products')
            ->where('id',$id)
            ->update([
            'name'              => $request->input('product_name'),
            'description'       => $request->input('product_description'),
            'product_code'      => $request->input('product_code'),
            'product_capacity'  => $request->input('product_capacity'),
            'price'             => $request->input('product_price'),
            'srp_price'         => $request->input('product_srp'),
            'img_url'           => $request->image->store('products/img','public')

            ]);
    }else{

        DB::table('products')
        ->where('id',$id)
        ->update([
        'name'              => $request->input('product_name'),
        'description'       => $request->input('product_description'),
        'product_code'      => $request->input('product_code'),
        'product_capacity'  => $request->input('product_capacity'),
        'price'             => $request->input('product_price'),
        'srp_price'         => $request->input('product_srp')

        ]);
    }
        return redirect()->route('admin.product')->with('toast_success','Product successfully updated!');

    }

    public function get_addProductForm(){

        $productCodes = DB::table('product_codes')->get();
        // dd($productCodes);
        return view('admin.add-product',['productCodes' => $productCodes]);
    }
    public function addProduct(Request $request){
        $product = new Product();

        if ($request->hasFile('image')){
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
            Product::create([
                'name'              => $request->input('product_name'),
                'description'       => $request->input('product_description'),
                'product_code'      => $request->input('product_code'),
                'product_capacity'  => $request->input('product_capacity'),
                'price'             => $request->input('product_price'),
                'srp_price'         => $request->input('product_srp'),
                'img_url'           => $request->image->store('products/img','public')
            ]);
        }else{

          return back()->with('toast_error','Please upload an image of the product!');
        }

        return redirect()->route('admin.product')->with('toast_success','New product successfully added!');
    }


    public function get_addFaqForm(){

        $faq_categories = DB::table('faq_categories')
        ->get();

        return view('admin.add-faq-form',['faq_categories' => $faq_categories]);
    }

    public function getAllCategory(){
        $categories = DB::table('faq_categories')
        ->get();

        return view('admin.faq_cagetory',['categories'=> $categories]);
    }

    public function get_addCategoryForm(){
        return view('admin.add-faq_category');
    }

    public function addCategory(Request $request){

        $cat_name = DB::select('select cat_name from faq_categories where cat_name = ?', [$request->c_name]);
        // $category = new faq_category;
        // dd($cat_name);

            if(!empty($cat_name)){
                return back()->with('toast_error',['A category with the same name already exist!']);
            } else {
                DB::insert('insert into faq_categories (cat_name,cat_description) values (?,?)',[$request->c_name, $request->c_description]);

                return redirect()->route('admin.view-all-category')->with('toast_success',['New FAQ Category was successfully created']);
            }

    }

    public function getFaq(){

        // $faq = FAQ::all();
        $categories = DB::table('faq_categories')
        ->get();


        $faq = DB::table('faq')
        // ->orderBy('created_at', 'desc')
        ->get()
        ->groupBy('category');
        // ->where('category','Shipping')
        // ->get();

        return view ('admin.faq_index',['faq'=>$faq, 'categories'=>$categories]);
    }

    public function addFaq(Request $request){
        DB::insert('insert into faq (category,title, description) values (?,?,?)',[$request->faq_category, $request->faq_title, $request->faq_description]);
        return redirect()->route('faq')->with('toast_success',['New FAQ was successfully created']);

    }
}
