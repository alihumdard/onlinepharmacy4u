<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Mail\otpVerifcation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use SebastianBergmann\Type\NullType;
use Carbon\Carbon;

// models ...
use App\Models\Comment;
use App\Models\Pharmacy4uGpLocation;
use App\Models\shippedOrder;
use App\Models\ProductAttribute;
use App\Models\QuestionCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\ShipingDetail;
use App\Models\Alert;
use App\Models\FaqProduct;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Question;
use App\Models\Collection;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\AssignQuestion;
use App\Models\ProductVariant;
use App\Models\QuestionMapping;
use App\Models\PMedGeneralQuestion;
use App\Models\PrescriptionMedGeneralQuestion;

class SystemController extends Controller
{
    protected $status;
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->status = config('constants.USER_STATUS');
    }

    public function index()
    {
        // return view('admin.pages.dashboard');
    }

    // system roles .... Super Admin, Dispensary, Doctor,User, 
    public function admins(Request $request)
    {
        $user = auth()->user();
        $page_name = 'dispensaries';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();

        if (isset($user->role) && $user->role == user_roles('1')) {
            $data['admins'] = User::where(['role' => user_roles('2')])->latest('id')->get()->toArray();
        }

        return view('admin.pages.admins', $data);
    }

    public function add_admin(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_dispensary';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();
        $data['state_list'] = STATE_LIST();
        if ($request->has('id')) {
            $data['admin'] = User::findOrFail($request->id)->toArray();
        }

        return view('admin.pages.add_admin', $data);
    }

    public function store_admin(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_dispensary';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $rules = [
            'name'     => 'required',
            'phone'    => 'required',
            'address'  => 'required',
            'gender'     => 'required',
            'role'     => 'required',
            'email'    => [
                'required',
                'email',
                Rule::unique('users')->ignore($request->id),
            ],
        ];
        if (!isset($request->id)) {
            $rules['password'] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['user'] = auth()->user();

        $updateData = [
            'name'       => ucwords($request->name),
            'email'      => $request->email,
            'role'       =>  $request->role,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'gender'      => $request->gender,
            'zip_code'   => $request->zip_code,
            'city'       => $request->city,
            'state'      => $request->state,
            'status'     => $this->status['Active'],
            'created_by' => $user->id,
        ];
        if ($request->password) {
            $updateData['password'] = Hash::make($request->password);
        }

        $saved = User::updateOrCreate(
            ['id' => $request->id ?? NULL],
            $updateData
        );
        $message = "Admin " . ($request->id ? "Updated" : "Saved") . " Successfully";
        if ($saved) {
            return redirect()->route('admin.admins')->with(['msg' => $message]);
        }
    }

    // doctors managment ...
    public function doctors(Request $request)
    {
        $user = auth()->user();
        $page_name = 'doctors';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();

        if (isset($user->role) && $user->role == user_roles('1')) {
            $data['doctors'] = User::where(['role' => user_roles('3')])->latest('id')->get()->toArray();
        }

        return view('admin.pages.doctors', $data);
    }
    public function add_doctor(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_doctor';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();
        if ($request->has('id')) {
            $data['doctor'] = User::findOrFail($request->id)->toArray();
        }

        return view('admin.pages.add_doctor', $data);
    }

    public function store_doctor(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_doctor';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $rules = [
            'name'       => 'required',
            'phone'      => 'required',
            'address'    => 'required',
            'gender'     => 'required',
            'role'       => 'required',
            'email'      => [
                'required',
                'email',
                Rule::unique('users')->ignore($request->id),
            ],
        ];

        if (!isset($request->id)) {
            $rules['password'] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['user'] = auth()->user();

        $updateData = [
            'name'       => ucwords($request->name),
            'email'      => $request->email,
            'role'       => $request->role,
            'phone'      => $request->phone,
            'gender'      => $request->gender,
            'address'    => $request->address,
            'short_bio'  => $request->short_bio,
            'zip_code'   => $request->zip_code,
            'city'       => $request->city,
            'status'     => $this->status['Active'],
            'created_by' => $user->id,
        ];
        if ($request->password) {
            $updateData['password'] = Hash::make($request->password);
        }

        $saved = User::updateOrCreate(
            ['id' => $request->id ?? NULL],
            $updateData
        );
        $message = "Doctor " . ($request->id ? "Updated" : "Saved") . " Successfully";
        if ($saved) {
            return redirect()->route('admin.doctors')->with(['msg' => $message]);
        }
    }

    //users management ...
    public function users(Request $request)
    {
        $user = auth()->user();
        $page_name = 'users';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();

        if (isset($user->role) && $user->role == user_roles('1')) {
            $data['users'] = User::where(['role' => user_roles('4')])->latest('id')->get()->toArray();
        }

        return view('admin.pages.users', $data);
    }

    // categories managment ...
    public function categories()
    {
        $user = auth()->user();
        $page_name = 'categories';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();

        if (isset($user->role) && $user->role == user_roles('1')) {
            $data['categories'] = Category::where('status', 'Active')->latest('id')->get()->toArray();
        }

        return view('admin.pages.categories.categories', $data);
    }

    public function sub_categories()
    {
        $user = auth()->user();
        $page_name = 'sub_categories';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();

        if (isset($user->role) && $user->role == user_roles('1')) {
            $data['categories'] = SubCategory::with('category')->where('status', 'Active')->latest('id')->get()->toArray();
        }

        return view('admin.pages.categories.sub_categories', $data);
    }

    public function child_categories()
    {
        $user = auth()->user();
        $page_name = 'child_categories';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();

        if (isset($user->role) && $user->role == user_roles('1')) {
            $data['categories'] = ChildCategory::with('subcategory')->where('status', 'Active')->latest('id')->get()->toArray();
        }

        return view('admin.pages.categories.child_categories', $data);
    }

    public function add_category(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_category';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();
        $data['title'] = 'Add Category';
        if ($request->has('id')) {
            $data['title'] = 'Edit Category';
            if ($request->selection == 1) {
                $data['category'] = Category::findOrFail($request->id)->toArray();
                $data['selection'] = 1;
            } elseif ($request->selection == 2) {
                $data['category'] = SubCategory::findOrFail($request->id)->toArray();
                $data['selection'] = 2;
                $data['parents'] = Category::all()->toArray();
                $data['catName'] = 'category_id';
            } elseif ($request->selection == 3) {
                $data['category'] = ChildCategory::findOrFail($request->id)->toArray();
                $data['selection'] = 3;
                $data['parents'] = SubCategory::all()->toArray();
                $data['catName'] = 'sub_category_id';
            }
        }

        return view('admin.pages.categories.add_category', $data);
    }

    public function category_validation($request, $selection)
    {
        if ($selection == 1) {
            if ($request->change_type == 2) {
                $validator = Validator::make($request->all(), [
                    'publish'   => 'required',
                    'name'     => [
                        'required',
                        Rule::unique('categories')->where(function ($query) {
                            return $query->where('status', '!=', 'Deleted');
                        }),
                    ],
                ]);
            } else {
                $validator = Validator::make($request->all(), [
                    'publish'   => 'required',
                    'name'     => [
                        'required',
                        Rule::unique('categories')->ignore($request->id),
                    ],
                ]);
            }
        } elseif ($selection == 2) {
            if ($request->change_type == 2) {
                $validator = Validator::make($request->all(), [
                    'publish'   => 'required',
                    'parent_id'   => 'required',
                    'name'     => [
                        'required',
                        Rule::unique('sub_categories')->where(function ($query) use ($request) {
                            return $query->where('status', '!=', 'Deleted')
                                ->where('category_id', $request->parent_id);
                        }),
                    ],
                ]);
            } else {
                $validator = Validator::make($request->all(), [
                    'publish'   => 'required',
                    'parent_id'   => 'required',
                    'name'     => [
                        'required',
                        Rule::unique('sub_categories')->where(function ($query) use ($request) {
                            return $query->where('category_id', $request->parent_id);
                        })->ignore($request->id),
                    ],
                ]);
            }
        } elseif ($selection == 3) {
            if ($request->change_type == 2) {
                $validator = Validator::make($request->all(), [
                    'publish'   => 'required',
                    'parent_id'   => 'required',
                    'name'     => [
                        'required',
                        Rule::unique('child_categories')->where(function ($query) use ($request) {
                            return $query->where('status', '!=', 'Deleted')
                                ->where('sub_category_id', $request->parent_id);;
                        }),
                    ],
                ]);
            } else {
                $validator = Validator::make($request->all(), [
                    'publish'   => 'required',
                    'parent_id'   => 'required',
                    'name'     => [
                        'required',
                        Rule::unique('child_categories')->where(function ($query) use ($request) {
                            return $query->where('sub_category_id', $request->parent_id);
                        })->ignore($request->id),
                    ],
                ]);
            }
        }

        return $validator;
    }

    public function delete_old_category($old_id, $old_category_type)
    {
        // when type of category change than delete category from current type

        if ($old_category_type == 1) {
            $category = Category::findOrFail($old_id);
        } elseif ($old_category_type == 2) {
            $category = SubCategory::findOrFail($old_id);
        } elseif ($old_category_type == 3) {
            $category = ChildCategory::findOrFail($old_id);
        }
        $update = $category->update([
            'status' => 'Deleted',
        ]);

        return ['update' => $update, 'old_image_path' => $category->image];
    }

    public function update_product_categories($old_cat_id, $old_cat_type, $new_cat, $new_cat_type)
    {
        if ($old_cat_type == 1) {
            $products = Product::where('category_id', $old_cat_id)->get()->toArray();
        } elseif ($old_cat_type == 2) {
            $products = Product::where('sub_category', $old_cat_id)->get()->toArray();
        } elseif ($old_cat_type == 3) {
            $products = Product::where('child_category', $old_cat_id)->get()->toArray();
        }
        $response = true;
        if ($products) {
            $product_ids = array_column($products, 'id');
            if ($new_cat_type == 1) {
                $data = [
                    'category_id' => $new_cat->id,
                    'sub_category' => NULL,
                    'child_category' => NULL,
                    'updated_by' => auth()->user()->id,
                ];
                $response = Product::whereIn('id', $product_ids)->update($data);
            } elseif ($new_cat_type == 2) {
                $data = [
                    'category_id' => $new_cat->category_id,
                    'sub_category' => $new_cat->id,
                    'child_category' => NULL,
                    'updated_by' => auth()->user()->id,
                ];
                $response = Product::whereIn('id', $product_ids)->update($data);
            } elseif ($new_cat_type == 3) {
                $data = [
                    'category_id' => SubCategory::where(['id' => $new_cat->sub_category_id, 'status' => 'Active'])->value('category_id'),
                    'sub_category' => $new_cat->sub_category_id,
                    'child_category' => $new_cat->id,
                    'updated_by' => auth()->user()->id,
                ];
                $response = Product::whereIn('id', $product_ids)->update($data);
            }
        }
        return $response;
    }

    public function store_category(Request $request)
    {
        // use for main,sub and child categories
        $user = auth()->user();
        $page_name = 'add_category';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $selection = $request->selection;

        $validator = $this->category_validation($request, $selection);

        // return $validator;
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['user'] = auth()->user();

        if ($request->hasFile('image') || !$request->id) {
            $rules['image'] = [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif,webm,svg,webp',
                'max:1024',
                // 'dimensions:max_width=1000,max_height=1000',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('category_images/', $imageName, 'public');
            $imagePath = 'category_images/' . $imageName;
        }

        // if change type is 1 than updation will occur in same category
        // if change type is 2 than updation will occur in different category (convert child category into sub category)
        if ($selection == 1) {
            // Main Category
            if ($request->change_type == 2) {
                $response = $this->delete_old_category($request->old_id, $request->old_category_type);
                $saved = Category::create(
                    [
                        'name'       => ucwords($request->name),
                        'slug'       => Str::slug($request->name),
                        'desc'       => $request->desc,
                        'publish'    => $request->publish,
                        'image'      => $imagePath ?? $response['old_image_path'],
                        'created_by' => $user->id,
                    ]
                );
                $update_product = $this->update_product_categories($request->old_id, $request->old_category_type, $saved, 1);
            } else {
                $saved = Category::updateOrCreate(
                    ['id' => $request->id ?? NULL],
                    [
                        'name'       => ucwords($request->name),
                        'slug'       => Str::slug($request->name),
                        'desc'       => $request->desc,
                        'publish'    => $request->publish,
                        'image'      => $imagePath ?? Category::findOrFail($request->id)->image,
                        'created_by' => $user->id,
                    ]
                );
            }
            $message = "category " . ($request->id ? "Updated" : "Saved") . " Successfully";
            if ($saved) {
                return redirect()->route('admin.categories')->with(['msg' => $message]);
            }
        } elseif ($selection == 2) {
            // Sub Category
            if ($request->change_type == 2) {
                $response = $this->delete_old_category($request->old_id, $request->old_category_type);
                $saved = SubCategory::create(
                    [
                        'name'       => ucwords($request->name),
                        'slug'       => Str::slug($request->name),
                        'category_id' => $request->parent_id,
                        'desc'       => $request->desc,
                        'publish'    => $request->publish,
                        'image'      => $imagePath ?? $response['old_image_path'],
                        'created_by' => $user->id,
                    ]
                );
                $update_product = $this->update_product_categories($request->old_id, $request->old_category_type, $saved, 2);
            } else {
                $saved = SubCategory::updateOrCreate(
                    ['id' => $request->id ?? NULL],
                    [
                        'name'       => ucwords($request->name),
                        'slug'       => Str::slug($request->name),
                        'category_id' => $request->parent_id,
                        'desc'       => $request->desc,
                        'publish'    => $request->publish,
                        'image'      => $imagePath ?? SubCategory::findOrFail($request->id)->image,
                        'created_by' => $user->id,
                    ]
                );
            }
            $message = "sub category " . ($request->id ? "Updated" : "Saved") . " Successfully";
            if ($saved) {
                return redirect()->route('admin.subCategories')->with(['msg' => $message]);
            }
        } elseif ($selection == 3) {
            // Child Category
            if ($request->change_type == 2) {
                $response = $this->delete_old_category($request->old_id, $request->old_category_type);
                $saved = ChildCategory::create(
                    [
                        'name'       => ucwords($request->name),
                        'slug'       => Str::slug($request->name),
                        'sub_category_id' => $request->parent_id,
                        'desc'       => $request->desc,
                        'publish'    => $request->publish,
                        'image'      => $imagePath ?? $response['old_image_path'],
                        'created_by' => $user->id,
                    ]
                );
                $update_product = $this->update_product_categories($request->old_id, $request->old_category_type, $saved, 3);
            } else {
                $saved = ChildCategory::updateOrCreate(
                    ['id' => $request->id ?? NULL],
                    [
                        'name'       => ucwords($request->name),
                        'slug'       => Str::slug($request->name),
                        'sub_category_id' => $request->parent_id,
                        'desc'       => $request->desc,
                        'publish'    => $request->publish,
                        'image'      => $imagePath ?? ChildCategory::findOrFail($request->id)->image,
                        'created_by' => $user->id,
                    ]
                );
            }
            $message = "child category " . ($request->id ? "Updated" : "Saved") . " Successfully";
            if ($saved) {
                return redirect()->route('admin.childCategories')->with(['msg' => $message]);
            }
        }
    }

    public function get_parent_category(Request $request)
    {
        $selection = $request->selection;
        if ($selection == 2) {
            $parents = Category::select('id', 'name')
                ->where('status', 'Active')
                ->pluck('name', 'id')
                ->toArray();
        } elseif ($selection == 3) {
            $parents = SubCategory::select('id', 'name')
                ->where('status', 'Active')
                ->pluck('name', 'id')
                ->toArray();
        }
        return response()->json(['status' => 'success', 'parents' => $parents]);
    }

    public function get_sub_category(Request $request)
    {
        $category_id = $request->category_id;
        $categories = SubCategory::select('id', 'name')
            ->where('status', 'Active')
            ->where('category_id', $category_id)
            ->pluck('name', 'id')
            ->toArray();

        return response()->json(['status' => 'success', 'sub_category' => $categories]);
    }

    public function get_child_category(Request $request)
    {
        $category_id = $request->category_id;
        $categories = ChildCategory::select('id', 'name')
            ->where('status', 'Active')
            ->where('sub_category_id', $category_id)
            ->pluck('name', 'id')
            ->toArray();

        return response()->json(['status' => 'success', 'child_category' => $categories]);
    }

    public function delete_category(Request $request)
    {
        $user = auth()->user();
        $page_name = 'dell_category';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $rules = [
            'id'  => 'required',
            'cat_type'  => 'required',
            'status'  => 'required',
        ];

        $status = 'Success';
        $message = "Category deleted Successfully";
        $class = 'bg-success';
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()]);
        }
        $productExists = Product::where($request->cat_type, $request->id)->where('status', 1)->exists();
        if ($productExists) {
            $status = 'Failed';
            $message = "Category can't deleted,Please delete associated products of that category frist.";
            $class = 'bg-danger';
        } else {
            if ($request->cat_type === 'child_category') {
                $category = ChildCategory::findOrFail($request->id);
            } elseif ($request->cat_type === 'sub_category') {
                $category = SubCategory::findOrFail($request->id);
            } elseif ($request->cat_type === 'category_id') {
                $category = Category::findOrFail($request->id);
            }

            $category->update([
                'status' => $request->status,
            ]);
        }

        return response()->json(['status' => $status, 'message' => $message, 'data' => ['class' => $class]]);
    }
    public function trash_categories(Request $request)
    {
        $user = auth()->user();
        $page_name = 'categories';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $data['user'] = auth()->user();
        $data['route'] = '';
        $data['cat_type'] = $request->cat_type;
        if ($request->cat_type === 'category_id') {
            $data['route'] = 'admin.categories';
            $data['categories'] = Category::where('status', 'Deactive')->latest('id')->get()->toArray();
        } elseif ($request->cat_type === 'sub_category') {
            $data['route'] = 'admin.subCategories';
            $data['categories'] = SubCategory::with('category')->where('status', 'Deactive')->latest('id')->get()->toArray();
        } elseif ($request->cat_type === 'child_category') {
            $data['route'] = 'admin.childCategories';
            $data['categories'] = ChildCategory::with('subcategory')->where('status', 'Deactive')->latest('id')->get()->toArray();
        } else {
            return redirect()->back();
        }

        return view('admin.pages.categories.trash_categories', $data);
    }

    // question management ...
    public function question_categories()
    {
        $user = auth()->user();
        $page_name = 'question_categories';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();

        if (isset($user->role) && $user->role == user_roles('1')) {
            $data['categories'] = QuestionCategory::latest('id')->get()->toArray();
        }

        return view('admin.pages.questions.question_categories', $data);
    }

    public function add_question_category(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_question_category';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();
        if ($request->has('id')) {
            $data['category'] = QuestionCategory::findOrFail($request->id)->toArray();
        }

        return view('admin.pages.questions.add_question_category', $data);
    }

    public function store_question_category(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_question_category';

        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'publish'   => 'required',
            'name'     => [
                'required',
                Rule::unique('question_categories')->ignore($request->id),
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['user'] = auth()->user();

        $saved = QuestionCategory::updateOrCreate(
            ['id' => $request->id ?? NULL],
            [
                'name'       => ucwords($request->name),
                'desc'       => $request->desc,
                'publish'    => $request->publish,
                'created_by' => $user->id,
            ]
        );
        $message = "category " . ($request->id ? "Updated" : "Saved") . " Successfully";
        if ($saved) {
            return redirect()->route('admin.questionCategories')->with(['msg' => $message]);
        }
    }

    public function questions(Request $request)
    {
        $user = auth()->user();
        $page_name = 'questions';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();
        $data['categories'] = [];
        if (isset($user->role) && $user->role == user_roles('1')) {
            $data['questions'] = Question::where(['status' => 'Active'])
                ->orderBy('category_title')
                ->orderByRaw('IF(`order` IS NULL, 1, 0), CAST(`order` AS UNSIGNED), `order`')
                ->orderBy('id')
                ->get()
                ->toArray();
            if ($data['questions']) {
                $data['categories'] = array_unique(array_column($data['questions'], 'category_title'));
            }
        }

        return view('admin.pages.questions.questions', $data);
    }

    public function trash_questions(Request $request)
    {
        $user = auth()->user();
        $page_name = 'questions';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $data['user'] = auth()->user();
        $data['route'] = '';
        $data['q_type'] = $request->q_type;
        if ($request->q_type === 'pro_question') {
            $data['route'] = 'admin.questions';
            $data['categories'] = [];
            if (isset($user->role) && $user->role == user_roles('1')) {
                $data['questions'] = Question::where(['status' => 'Deactive'])
                    ->orderBy('category_title')
                    ->orderByRaw('IF(`order` IS NULL, 1, 0), CAST(`order` AS UNSIGNED), `order`')
                    ->orderBy('id')
                    ->get()
                    ->toArray();
                if ($data['questions']) {
                    $data['categories'] = array_unique(array_column($data['questions'], 'category_title'));
                }
            }
        } elseif ($request->q_type === 'pmd_question') {
            $data['questions'] = PMedGeneralQuestion::where(['status' => 'Deactive'])->get()->toArray();
        } elseif ($request->q_type === 'pre_question') {
            $data['questions'] = PrescriptionMedGeneralQuestion::where(['status' => 'Active'])->get()->toArray();
        } else {
            return redirect()->back();
        }

        return view('admin.pages.questions.trash_questions', $data);
    }

    public function faq_questions(Request $request)
    {
        $user = auth()->user();
        $page_name = 'faq_questions';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();
        $data['categories'] = [];
        if (isset($user->role) && $user->role == user_roles('1')) {
            $data['questions'] = FaqProduct::where(['status' => 'Active'])
                ->orderBy('product_id')
                ->orderByRaw('IF(`order` IS NULL, 1, 0), CAST(`order` AS UNSIGNED), `order`')
                ->orderBy('id')
                ->get()
                ->toArray();
            if ($data['questions']) {
                $data['products'] = array_unique(array_column($data['questions'], 'product_title'));
            }
        }

        return view('admin.pages.questions.faq_questions', $data);
    }

    public function p_med_general_questions(Request $request)
    {
        $user = auth()->user();
        $page_name = 'p_med_gq';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();
        $data['questions'] = PMedGeneralQuestion::where(['status' => 'Active'])->get()->toArray();

        return view('admin.pages.questions.p_med_gq', $data);
    }

    public function prescription_med_general_questions(Request $request)
    {
        $user = auth()->user();
        $page_name = 'prescription_med_gq';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();
        $data['questions'] = PrescriptionMedGeneralQuestion::where(['status' => 'Active'])->get()->toArray();

        return view('admin.pages.questions.prescription_med_gq', $data);
    }

    public function add_question(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_question';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $data['user'] = auth()->user();
        $data['categories'] = QuestionCategory::latest('id')->get()->toArray();
        if ($request->has('id')) {
            $data['question'] = Question::findOrFail($request->id)->toArray();
        }
        return view('admin.pages.questions.add_question', $data);
    }

    public function add_faq_question(Request $request)
    {
        $user = auth()->user();
        $page_name = 'faq_questions';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $data['user'] = auth()->user();
        $data['products'] = Product::where(['status' => '1'])->latest('id')->get()->toArray();
        if ($request->has('id')) {
            $data['question'] = FaqProduct::findOrFail($request->id)->toArray();
        }
        return view('admin.pages.questions.add_faq_question', $data);
    }

    public function store_question(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_question';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'is_assigned' => 'required',
            'anwser_set' => 'required',
            'category_id' => 'required',
            'title'   => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['user'] = auth()->user();
        $question = Question::updateOrCreate(
            ['id' => $request->id ?? NULL],
            [
                'category_id' => $request->category_id,
                'category_title'  => QuestionCategory::findOrFail($request->category_id)->name,
                'title'       => ucwords($request->title),
                'desc'        => $request->desc ?? NULL,
                'is_assigned'  => $request->is_assigned,
                'anwser_set'  => $request->anwser_set,
                'type'        => $request->type,
                'yes_lable'   => ucwords($request->yes_lable) ?? NULL,
                'no_lable'    => ucwords($request->no_lable) ?? NULL,
                'optA'        => ucwords($request->optA) ?? NULL,
                'optB'        => ucwords($request->optB) ?? NULL,
                'optC'        => ucwords($request->optC) ?? NULL,
                'optD'        => ucwords($request->optD) ?? NULL,
                'order'       => $request->order ?? null,
                'is_dependent' => ($request->type == 'non_dependent') ? 'no' : 'yes',
                'created_by' => $user->id,
            ]
        );
        if ($question->id) {
            if ($question->is_assigned == 'yes') {
                $options = ['optA', 'optB', 'optC', 'optD', 'optY', 'optN', 'openBox', 'file'];
                // dd($request->next_quest);
                foreach ($options as $option) {
                    $value = $request->next_quest[$option];
                    $selector = 'nothing';
                    if ($value['next_type'] == 'alert') {
                        $alert = Alert::updateOrCreate(
                            [
                                // 'id' => $question->alert_id ?? NULL,
                                'question_id' => $question->id,
                                'q_category_id' => $question->category_id,
                                'option' => $option,
                            ],
                            [
                                'type' => $value['alert_type'],
                                'body' => $value['alert_msg'],
                                'route'         => 'web.productQuestion',
                                'option'        => $option,
                                'question_id'   => $question->id,
                                'q_category_id' => $question->category_id,
                                'created_by'    => $user->id
                            ]
                        );
                        if ($alert->id) {
                            $selector = $alert->id;
                            $mapped = QuestionMapping::updateOrCreate(
                                [
                                    'question_id' => $question->id,
                                    'category_id' => $question->category_id,
                                    'answer' => $option,
                                ],
                                [
                                    'question_id' => $question->id,
                                    'category_id' => $question->category_id,
                                    'answer'      => $option,
                                    'next_type'   => 'alert',
                                    'selector'    => $alert->id,
                                    'status'      => 1,
                                    'created_by'  => $user->id
                                ]
                            );
                        } else {
                            dd('alert is not saved');
                        }
                    } else if ($value['next_type'] == 'question') {
                        $selector = $value['question'];
                        $mapped = QuestionMapping::updateOrCreate(
                            [
                                'question_id' => $question->id,
                                'category_id' => $question->category_id,
                                'answer' => $option,
                            ],
                            [
                                'question_id' => $question->id,
                                'category_id' => $question->category_id,
                                'answer'      => $option,
                                'next_type'   => 'question',
                                'selector'    => $selector,
                                'status'      => 1,
                                'created_by'  => $user->id
                            ]
                        );
                    } else if ($value['next_type'] == 'nothing') {
                        $mapped = QuestionMapping::updateOrCreate(
                            [
                                'question_id' => $question->id,
                                'category_id' => $question->category_id,
                                'answer' => $option,
                            ],
                            [
                                'question_id' => $question->id,
                                'category_id' => $question->category_id,
                                'answer'      => $option,
                                'next_type'   => 'nothing',
                                'selector'    => $selector,
                                'status'      => 1,
                                'created_by'  => $user->id
                            ]
                        );
                    }
                }
            }

            $message = "Question " . ($request->id ? "Updated" : "Saved") . " Successfully";
            return redirect()->route('admin.questions')->with(['msg' => $message]);
        }
    }

    public function store_faq_question(Request $request)
    {
        $user = auth()->user();
        $page_name = 'faq_questions';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'title'      => 'required',
            'order'      => 'required',
            'desc'       => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data['user'] = auth()->user();
        $question = FaqProduct::updateOrCreate(
            ['id' => $request->id ?? NULL],
            [
                'product_id' => $request->product_id,
                'product_title' => Product::findOrFail($request->product_id)->title,
                'order'      => $request->order,
                'title'      => ucwords($request->title),
                'desc'       => $request->desc ?? NULL,
                'created_by' => $user->id,
            ]
        );
        if ($question->id) {
            $message = "FAQ question " . ($request->id ? "Updated" : "Saved") . " Successfully";
            return redirect()->route('admin.faqQuestions')->with(['msg' => $message]);
        }
    }

    public function delete_question(Request $request)
    {
        $user = auth()->user();
        $page_name = 'dell_question';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $rules = [
            'id'  => 'required',
            'q_type'  => 'required',
            'status'  => 'required',
        ];

        $status = 'Success';
        $action = ($request->status == 'Active') ? ' Reverted ' : (($request->status == 'Deactive') ? ' Sent to Trash ' : ' Deleted ');
        $message = "Question " . $action . " Successfully";
        $class = ($request->status == 'Deleted') ? 'bg-danger' : 'bg-success';
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $status = 'Failed';
            $message = "Question can't deleted.";
            $class = 'bg-danger';
            return response()->json(['status' => $status, 'message' => $message, 'data' => ['class' => $class], 'errors' => $validator->errors()]);
        }

        if ($request->q_type === 'pro_question') {
            $question = Question::findOrFail($request->id);
        } elseif ($request->q_type === 'pmd_question') {
            $question = PMedGeneralQuestion::findOrFail($request->id);
        } elseif ($request->q_type === 'pre_question') {
            $question = PrescriptionMedGeneralQuestion::findOrFail($request->id);
        }

        $question->update([
            'status' => $request->status,
        ]);

        return response()->json(['status' => $status, 'message' => $message, 'data' => ['class' => $class]]);
    }

    // question assignment manament...
    public function assign_question(Request $request)
    {
        // question mapping screen
        $user = auth()->user();
        $page_name = 'assign_question';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $data['user'] = auth()->user();
        if (isset($user->role) && $user->role == user_roles('1')) {
            $data['categories'] = QuestionCategory::where(['status' => 'Active'])->latest('id')->get()->toArray();
        }
        return view('admin.pages.questions.assign_question', $data);
    }

    public function get_assign_quest(Request $request)
    {
        $user = auth()->user();
        $page_name = 'assign_question';

        if (!view_permission($page_name)) {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized']);
        }

        $questions = [];

        if (isset($user->role) && $user->role == user_roles('1') && $request->has('id')) {
            $questions = Question::select('id', 'title', 'order')
                ->where(['category_id' => $request->id, 'status' => 'Active'])
                ->orderByRaw('IF(`order` IS NULL, 1, 0), CAST(`order` AS UNSIGNED), `order`')
                ->orderBy('id')
                ->get()
                ->toArray();
        }

        return response()->json(['status' => 'success', 'questions' => $questions]);
    }

    public function store_assign_quest(Request $request)
    {
        $user = auth()->user();
        $page_name = 'assign_question';

        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'category_id'   => 'required',
            'question_id.*' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['user'] = auth()->user();

        // Delete previous records for the given category_id
        AssignQuestion::where('category_id', $request->category_id)->delete();

        // Loop through each question_id and insert new records
        foreach ($request->question_id ?? [] as $questionId) {
            AssignQuestion::create([
                'category_id' => $request->category_id,
                'category_title' => Category::findOrFail($request->category_id)->name,
                'question_id'    => $questionId,
                'question_title' => Question::findOrFail($questionId)->title,
                'status'      => $this->status['Active'],
                'created_by'  => $user->id,
            ]);
        }

        $message = "Data Updated Successfully";
        return redirect()->back()->with(['msg' => $message, 'category_id' => $request->category_id]);
    }

    // Question Mapping ...
    public function question_mapping(Request $request)
    {
        // Question mapping which question is next base on answer
        $user = auth()->user();
        $page_name = 'question_mapping';

        // if (!view_permission($page_name)) {
        //     return redirect()->back();
        // }

        $validator = Validator::make($request->all(), [
            'category_id'   => 'required',
            'question_id.*' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['user'] = auth()->user();

        $options = ['optA', 'optB', 'optC', 'optD', 'optY', 'optN', 'openBox', 'file'];
        foreach ($options as $option) {
            $value = $request->$option;
            // Check if the value is not null
            if ($value !== null && $value !== '') {
                $response = QuestionMapping::updateOrCreate(
                    [
                        'category_id' => $request->category_id,
                        'question_id' => $request->question_id,
                        'answer' => $option,
                    ],
                    [
                        'category_id' => $request->category_id,
                        'question_id' => $request->question_id,
                        'answer'      => $option,
                        'next_question' => $value,
                        'status'      => 1,
                        'created_by'  => $user->id
                    ]
                );
            }
        }

        $message = "Data Saved Successfully";
        return redirect()->back()->with(['msg' => $message]);
    }

    public function question_detail(Request $request)
    {
        $question_id = $request->id;
        $category_id = $request->categoryId;
        $result['detail'] = Question::findOrFail($question_id)->toArray();
        $result['other_qstn'] = Question::select('id', 'title')
            ->where(['category_id' => $category_id, 'is_dependent' => 'yes', 'status' => 'Active'])
            ->orderBy('id')
            ->pluck('title', 'id')
            ->toArray();

        $result['dependant_question'] = QuestionMapping::where('category_id', $category_id)
            ->where('question_id', $question_id)
            ->get();
        return response()->json(['status' => 'success', 'result' => $result]);
    }

    public function get_next_question(Request $request)
    {
        $question_id = $request->id;
        $category_id = $request->categoryId;
        $answer = $request->answer;
        $result['detail'] = Question::findOrFail($question_id)->toArray();

        $result['other_qstn'] = AssignQuestion::join('assign_questions as tbl2', function ($join) use ($question_id) {
            $join->on('assign_questions.category_id', '=', 'tbl2.category_id')
                ->where('tbl2.question_id', '!=', $question_id);
        })
            ->select('tbl2.question_id', 'tbl2.question_title')
            ->where('assign_questions.question_id', $question_id)
            ->where('assign_questions.category_id', $category_id)
            ->pluck('tbl2.question_title', 'tbl2.question_id')
            ->toArray();

        return response()->json(['status' => 'success', 'result' => $result]);
    }

    public function get_dp_questions(Request $request)
    {
        $category_id = $request->cat_id;
        $result['dp_qstn'] = Question::select('id', 'title')
            ->where(['category_id' => $category_id, 'is_dependent' => 'yes', 'status' => 'Active'])
            ->orderBy('id')
            ->pluck('title', 'id')
            ->toArray();
        if ($result['dp_qstn']) {
            return response()->json(['status' => 'success', 'result' => $result]);
        } else {
            return response()->json(['status' => 'empty', 'result' => []]);
        }
    }

    // orders managment ...
    public function order_detail(Request $request)
    {
        $data['user'] = auth()->user();
        $page_name = 'orders';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        if ($request->id) {
            $id = base64_decode($request->id);
            $order = Order::with('user', 'shipingdetails', 'orderdetails', 'orderdetails.product')->where(['id' => $id, 'payment_status' => 'Paid'])->first();
            if ($order) {
                $data['userOrders'] = Order::select('id')
                    ->where('email', $order->email)
                    ->where('status', 'Paid')
                    ->where('id', '!=', $order->id)
                    ->get()
                    ->toArray();
                $data['userOrders']  = [];
                $data['order']  = $order->toArray() ?? [];
                // dd($data);
                return view('admin.pages.order_detail', $data);
            } else {
                return redirect()->back()->with('error', 'Order not found.');
            }
        } else {
            return redirect()->back()->with('error', 'Order not found.');
        }
    }

    public function consultation_view(Request $request)
    {
        $data['user'] = auth()->user();
        $page_name = 'consultation_view';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        if ($request->odd_id) {
            $odd_id = base64_decode($request->odd_id);
            $user_result = [];
            $prod_result = [];
            $consultaion  = OrderDetail::where(['id' => $odd_id, 'status' => '1'])->latest('created_at')->latest('id')->first();
            if ($consultaion) {
                $consutl_quest_ans = json_decode($consultaion->generic_consultation, true);
                $consult_quest_keys = array_keys(array_filter($consutl_quest_ans, function ($value) {
                    return $value !== null;
                }));
                if ($consultaion->consultation_type == 'pmd') {
                    $consult_questions = PMedGeneralQuestion::whereIn('id', $consult_quest_keys)->select('id', 'title', 'desc')->get()->toArray();
                } elseif ($consultaion->consultation_type == 'premd') {
                    $consult_questions = PrescriptionMedGeneralQuestion::whereIn('id', $consult_quest_keys)->select('id', 'title', 'desc')->get()->toArray();
                    $pro_quest_ans = json_decode($consultaion->product_consultation, true);
                    $pro_quest_ids = array_keys(array_filter($pro_quest_ans, function ($value) {
                        return $value !== null;
                    }));
                    $product_consultation = Question::whereIn('id', $pro_quest_ids)->orderBy('id')->get()->toArray();
                    $product_consultation = collect($product_consultation)->mapWithKeys(function ($item) {
                        return [$item['id'] => $item];
                    });

                    foreach ($pro_quest_ans as $q_id => $answer) {
                        if (isset($product_consultation[$q_id])) {
                            $prod_result[] = [
                                'id' => $q_id,
                                'title' => $product_consultation[$q_id]['title'],
                                'desc' => $product_consultation[$q_id]['desc'],
                                'answer' => $answer,
                            ];
                        }
                    }
                }
                $consult_questions = collect($consult_questions)->mapWithKeys(function ($item) {
                    return [$item['id'] => $item];
                });

                foreach ($consutl_quest_ans as $quest_id => $ans) {
                    if (isset($consult_questions[$quest_id])) {
                        $user_result[] = [
                            'id' => $quest_id,
                            'title' => $consult_questions[$quest_id]['title'],
                            'desc' => $consult_questions[$quest_id]['desc'],
                            'answer' => $ans,
                        ];
                    }
                }
                $data['order_user_detail'] =  ShipingDetail::where(['order_id' => $consultaion->order_id, 'status' => 'Active'])->latest('created_at')->latest('id')->first();
                $data['user_profile_details'] =  (isset($data['order_user_detail']['user_id']) && $consultaion->consultation_type != 'pmd') ? User::findOrFail($data['order_user_detail']['user_id']) : [];
                $data['generic_consultation'] = $user_result;
                $data['product_consultation'] = $prod_result ?? [];
                return view('admin.pages.consultation_view', $data);
            } else {
                return redirect()->back()->with('error', 'Transaction not found.');
            }
        } else {
            return redirect()->back();
        }
    }

    public function orders_recieved()
    {
        $data['user'] = auth()->user();
        $page_name = 'orders_recieved';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $orders = Order::with('user')->where(['payment_status' => 'Paid', 'status' => 'Received'])->latest('created_at')->get()->toArray();
        if ($orders) {
            $emails = array_unique(Arr::pluck($orders, 'email'));
            $userOrdersData = Order::select('email', DB::raw('count(*) as total_orders'))
                ->whereIn('email', $emails)
                ->where('status', 'Paid')
                ->groupBy('email')
                ->get()
                ->toArray();
            $data['order_history'] = $userOrdersData;
            $data['orders'] = $orders;
        }

        return view('admin.pages.orders_recieved', $data);
    }

    public function orders_created()
    {
        $data['user'] = auth()->user();
        $page_name = 'orders_created';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $orders = Order::with('user')->where(['payment_status' => 'Paid', 'status' => 'Received'])->latest('created_at')->get()->toArray();
        if ($orders) {
            $emails = array_unique(Arr::pluck($orders, 'email'));
            $userOrdersData = Order::select('email', DB::raw('count(*) as total_orders'))
                ->whereIn('email', $emails)
                ->where('status', 'Paid')
                ->groupBy('email')
                ->get()
                ->toArray();
            $data['order_history'] = $userOrdersData;
            $data['orders'] = $orders;
        }

        return view('admin.pages.orders_created', $data);
    }

    public function orders_refunded()
    {
        $data['user'] = auth()->user();
        $page_name = 'orders_refunded';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $orders = Order::with('user')->where(['payment_status' => 'Paid', 'status' => 'Refund'])->latest('created_at')->get()->toArray();
        if ($orders) {
            $emails = array_unique(Arr::pluck($orders, 'email'));
            $userOrdersData = Order::select('email', DB::raw('count(*) as total_orders'))
                ->whereIn('email', $emails)
                ->where('status', 'Paid')
                ->groupBy('email')
                ->get()
                ->toArray();
            $data['order_history'] = $userOrdersData;
            $data['orders'] = $orders;
        }

        return view('admin.pages.orders_refunded', $data);
    }

    public function doctors_approval()
    {
        $data['user'] = auth()->user();
        $page_name = 'doctors_approval';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $orders = Order::with('user')->where(['payment_status' => 'Paid', 'order_for' => 'doctor'])->whereIn('status', ['Received', 'Approved', 'Not_Approved'])->latest('created_at')->get()->toArray();
        if ($orders) {
            $userIds = array_unique(Arr::pluck($orders, 'user.id'));
            $userOrdersData = Order::select('user_id', DB::raw('count(*) as total_orders'))
                ->whereIn('user_id', $userIds)
                ->groupBy('user_id')
                ->get()
                ->toArray();
            $data['order_history'] = $userOrdersData;
            $data['orders'] = $orders;
        }
        return view('admin.pages.doctors_approval', $data);
    }

    public function dispensary_approval()
    {
        $data['user'] = auth()->user();
        $page_name = 'dispensary_approval';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $orders = Order::with('user')->where(['payment_status' => 'Paid', 'order_for' => 'despensory'])->whereIn('status', ['Received', 'Approved', 'Not_Approved'])->latest('created_at')->get()->toArray();

        if ($orders) {
            $userIds = array_unique(Arr::pluck($orders, 'user.id'));
            $userOrdersData = Order::select('user_id', DB::raw('count(*) as total_orders'))
                ->whereIn('user_id', $userIds)
                ->groupBy('user_id')
                ->get()
                ->toArray();
            $data['order_history'] = $userOrdersData;
            $data['orders'] = $orders;
        }
        return view('admin.pages.despensory_approval', $data);
    }

    public function orders_shiped()
    {
        $data['user'] = auth()->user();
        $page_name = 'orders_shipped';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $orders = Order::with('user')->where(['payment_status' => 'Paid', 'status' => 'Shipped'])->latest('created_at')->get()->toArray();
        if ($orders) {
            $emails = array_unique(Arr::pluck($orders, 'email'));
            $userOrdersData = Order::select('email', DB::raw('count(*) as total_orders'))
                ->whereIn('email', $emails)
                ->where('status', 'Paid')
                ->groupBy('email')
                ->get()
                ->toArray();
            $data['order_history'] = $userOrdersData;
            $data['orders'] = $orders;
        }

        return view('admin.pages.orders_shiped', $data);
    }

    public function orders_audit()
    {
        $data['user'] = auth()->user();
        $page_name = 'orders_shipped';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $orders = Order::with('user', 'shipingdetails')->where(['payment_status' => 'Paid', 'status' => 'Shipped'])->latest('created_at')->get()->toArray();
        $data['filters'] = [];
        if ($orders) {
            $combined = array_map(function ($order) {
                return $order['shipingdetails']['address'] . '_chapi_' . $order['shipingdetails']['zip_code'];
            }, $orders);

            $uniqueCombined = array_unique($combined);

            $filters = array_map(function ($item) {
                $parts = explode('_chapi_', $item, 2);
                return [
                    'address' => $parts[0],
                    'postal_code' => $parts[1]
                ];
            }, $uniqueCombined);
            $data['filters'] = $filters;
            $data['orders'] = $orders;
        }

        return view('admin.pages.orders_audit', $data);
    }

    public function add_order(Request $request)
    {
        $user = auth()->user();
        $page_name = 'orders_created';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $data['user'] = auth()->user();
        $data['products'] = Product::with('variants')->where('status', $this->status['Active'])->latest('id')->get()->sortBy('title')->values()->keyBy('id')->toArray();
        foreach ($data['products'] as $key => $product) {
            if ($product['variants']) {
                $data['variants'][$product['id']] = $product['variants'];
            }
        }
        $data['users'] = User::where(['status' => $this->status['Active'], 'role' => user_roles('4')])->latest('id')->get()->sortBy('name')->keyBy('id')->toArray();
        return view('admin.pages.add_order', $data);
    }

    public function store_order(Request $request)
    {
        $user = auth()->user();
        $page_name = 'orders_created';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $validator = Validator::make($request->all(), [
            'product_id'        => 'required',
            'firstName'         => 'required',
            'lastName'          => 'required',
            'email'             => 'required',
            'phone'             => 'required',
            'address'           => 'required',
            'city'              => 'required',
            'zip_code'          => 'required',
            'shiping_cost'      => 'required',
            'product_qty'       => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $order =  Order::create([
            'user_id'        => $request->user_id ?? 'guest',
            'email'          => $request->email,
            'note'           => $request->note,
            'shiping_cost'   => $request->shiping_cost,
            'coupon_code'    => $request->coupon_code ?? Null,
            'coupon_value'   => $request->coupon_value ?? Null,
            'total_ammount'  => $request->total_ammount ?? Null,
        ]);
        dd($order);
        if ($order) {

            $message = "Question " . ($request->id ? "Updated" : "Saved") . " Successfully";
            return redirect()->route('admin.questions')->with(['msg' => $message]);
        }
    }

    public function gpa_letters()
    {
        $data['user'] = auth()->user();
        $page_name = 'gpa_letters';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $orders = Order::with('user')->where(['payment_status' => 'Paid', 'order_for' => 'doctor'])->whereIn('status', ['Approved', 'Shipped'])->latest('created_at')->get()->toArray();
        if ($orders) {
            $userIds = array_unique(Arr::pluck($orders, 'user.id'));
            $userOrdersData = Order::select('user_id', DB::raw('count(*) as total_orders'))
                ->whereIn('user_id', $userIds)
                ->groupBy('user_id')
                ->get()
                ->toArray();
            $data['order_history'] = $userOrdersData;
            $data['orders'] = $orders;
        }
        return view('admin.pages.gpa_letters', $data);
    }

    public function change_status(Request $request)
    {
        $data['user'] = auth()->user();
        $page_name = 'orders';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $validatedData = $request->validate([
            'id' => 'required|exists:orders,id',
            'status' => 'required',
        ]);

        $order = Order::findOrFail($validatedData['id']);
        $order->status = $validatedData['status'];
        $order->hcp_remarks = $validatedData['hcp_remarks'] ?? null;
        $update = $order->save();
        if ($update) {
            $msg = 'Order is ' . $validatedData['status'];
            $status = 'success';
            return redirect()->route('admin.orderDetail', ['id' => base64_encode($validatedData['id'])])->with('status', $status)->with('msg', $msg);
        }
        return redirect()->back();
    }

    public function create_shiping_order(Request $request)
    {
        $user = auth()->user();
        $page_name = 'orders';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $validatedData = $request->validate([
            'id' => 'required|exists:orders,id'
        ]);

        $order = Order::with('user', 'shipingdetails', 'orderdetails')->where(['id' => $request->id, 'payment_status' => 'Paid'])->first();
        if ($order) {

            try {
                $order = $order->toArray() ?? [];

                $weightSum = array_sum(array_column($order['orderdetails'], 'weight'));
                $order['weight'] = $weightSum !== 0 ? $weightSum : 1;
                $order['quantity'] = array_sum(array_column($order['orderdetails'], 'product_qty'));
                $payload = $this->make_shiping_payload($order);
                $apiKey = env('ROYAL_MAIL_API_KEY');
                $client = new Client();
                $response = $client->post('https://api.parcel.royalmail.com/api/v1/orders', [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $apiKey,
                        'Content-Type' => 'application/json',
                    ],
                    'json' => $payload,
                ]);

                $statusCode = $response->getStatusCode();
                $body = $response->getBody()->getContents();
                if ($statusCode == 200) {
                    $response = json_decode($body, true);
                    // dd($response);
                    $shipped = [];
                    if ($response['createdOrders']) {
                        foreach ($response['createdOrders'] as $key => $val) {
                            $shipped[] = shippedOrder::create([
                                'user_id' => $order['user']['id'] ?? 'Guest',
                                'order_id' => $order['id'],
                                'order_identifier' => $val['orderIdentifier'],
                                'tracking_no' => $this->get_tracking_number($val['orderIdentifier']) ?? Null,
                                'order_date' => $val['orderDate'],
                                'cost' => $order['shiping_cost'],
                                'errors' => json_encode($val['errors'] ?? []) ?? NULL,
                                'status' => 'Shipped',
                                'created_by' => $user->id,
                            ]);
                        }
                    }
                    if ($response['failedOrders']) {
                        foreach ($response['failedOrders'] as $key => $val) {
                            $shipped[] = shippedOrder::create([
                                'user_id' => $order['user']['id'] ?? 'Guest',
                                'order_id' => $order['id'],
                                'order_identifier' => $val['orderIdentifier']  ?? NULL,
                                'order_date' => $val['orderDate'] ?? NULL,
                                'cost' => $order['shiping_cost'],
                                'errors' => json_encode($val['errors'] ?? []),
                                'status' => 'ShippingFail',
                                'created_by' => $user->id,
                            ]);
                        }
                    }
                    $order = Order::findOrFail($order['id']);
                    $order->order_identifier = $shipped[0]->order_identifier;
                    $order->tracking_no = $shipped[0]->tracking_no;
                    $order->shipped_order_id = $shipped[0]->id;
                    $order->status = $shipped[0]->status;
                    $update = $order->save();
                    $msg = ($shipped[0]->status == 'Shipped') ? 'Order is shipped' : 'Order shiping failed';
                    $status = ($shipped[0]->status == 'Shipped') ? 'success' : 'fail';
                    return redirect()->route('admin.orderDetail', ['id' => base64_encode($validatedData['id'])])->with('status', $status)->with('msg', $msg);

                    // return redirect()->route('admin.getShippingOrder', ['id' => $shipped[0]->order_identifier])->with(['msg' =>$msg ,'status'=>$shipped[0]->status]);
                } else {
                    echo "contact to developer";
                }
            } catch (\Exception $e) {
                dd($e);
            }
        }
        return redirect()->back();
    }

    public function get_shiping_order(Request $request)
    {
        $order_id = $request->id;
        $order = Order::findOrFail($order_id);
        $tracking_nos = Null;
        $apiKey = env('ROYAL_MAIL_API_KEY');

        $client = new Client();
        $response = $client->get('https://api.parcel.royalmail.com/api/v1/orders/' . $order->order_identifier, [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $body = json_decode($response->getBody()->getContents(), true);
        if ($statusCode == '200') {
            $tracking_nos = array_column($body, 'trackingNumber');
        }

        $order->tracking_no = $tracking_nos[0] ?? Null;
        $update = $order->save();
        $msg = ($tracking_nos[0] ?? Null) ? 'Order is Tracked' : 'Order tracking failed';
        $status = ($tracking_nos[0] ?? Null) ? 'success' : 'fail';
        return redirect()->route('admin.orderDetail', ['id' => base64_encode($order->id)])->with('status', $status)->with('msg', $msg);
    }

    private function get_tracking_number($orderId)
    {
        $order_id = $orderId;
        $tracking_nos = Null;
        $apiKey = env('ROYAL_MAIL_API_KEY');

        $client = new Client();
        $response = $client->get('https://api.parcel.royalmail.com/api/v1/orders/' . $order_id, [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $body = json_decode($response->getBody()->getContents(), true);
        if ($statusCode == '200') {
            $tracking_nos = array_column($body, 'trackingNumber');
        }
        return $tracking_nos[0] ?? Null;
    }

    private function make_shiping_payload($order)
    {
        $content = [];
        foreach ($order['orderdetails'] as $val) {
            $content[] = [
                "name" => $val['product_name'],
                "SKU" => null,
                "quantity" => $val['product_qty'],
                "unitValue" => $val['product_price'],
                "unitWeightInGrams" => $val['weight'],
                "customsDescription" => 'it is medical product.',
                "extendedCustomsDescription" => "",
                "customsCode" => null,
                "originCountryCode" => "GB",
                "customsDeclarationCategory" => null,
                "requiresExportLicence" => null,
                "stockLocation" => null
            ];
        }

        $order_ref = '#00' . $order['id'];
        $payload = [
            "items" => [
                [
                    "orderReference" => $order_ref,
                    "recipient" => [
                        "address" => [
                            "fullName" => ($order['shipingdetails']['firstName']) ? $order['shipingdetails']['firstName'] . ' ' . $order['shipingdetails']['lastName'] : $order['user']['name'],
                            "companyName" => null,
                            "addressLine1" => $order['shipingdetails']['address'] ?? $order['user']['address'],
                            "addressLine2" => $order['shipingdetails']['address2'] ?? '',
                            "addressLine3" => null,
                            "city" => $order['shipingdetails']['city'] ?? $order['user']['city'],
                            "county" => "United Kingdom",
                            "postcode" => $order['shipingdetails']['zip_code'] ?? $order['user']['zip_code'],
                            "countryCode" => "GB"
                        ],
                        "phoneNumber" => $order['shipingdetails']['phone'] ?? $order['user']['phone'],
                        "emailAddress" => $order['shipingdetails']['email']  ?? $order['user']['email'],
                        "addressBookReference" => null
                    ],
                    "sender" => [
                        "tradingName" => null,
                        "phoneNumber" => '01623572757',
                        "emailAddress" => 'info@online-pharmacy4u.co.uk'
                    ],
                    "billing" => [
                        "address" => [
                            "fullName" => ($order['shipingdetails']['firstName']) ? $order['shipingdetails']['firstName'] . ' ' . $order['shipingdetails']['lastName'] : $order['user']['name'],
                            "companyName" => null,
                            "addressLine1" => $order['shipingdetails']['address'] ?? $order['user']['address'],
                            "addressLine2" => $order['shipingdetails']['address2'] ?? '',
                            "addressLine3" => null,
                            "city" => $order['shipingdetails']['city'] ?? $order['user']['city'],
                            "county" => "United Kingdom",
                            "postcode" => $order['shipingdetails']['zip_code'] ?? $order['user']['zip_code'],
                            "countryCode" => "GB"
                        ],
                        "phoneNumber" => $order['shipingdetails']['phone'] ?? $order['user']['phone'],
                        "emailAddress" => $order['shipingdetails']['email']  ?? $order['user']['email']
                    ],
                    "packages" => [
                        [
                            "weightInGrams" => $order['weight'],
                            "packageFormatIdentifier" => "parcel",
                            "customPackageFormatIdentifier" => "",
                            "dimensions" => [
                                "heightInMms" => 10,
                                "widthInMms" => 20,
                                "depthInMms" => 30
                            ],
                            "contents" => $content
                        ]
                    ],
                    "orderDate" => $order['created_at'],
                    "plannedDespatchDate" => null,
                    "specialInstructions" => $order['note'],
                    "subtotal" => $order['total_ammount'] - $order['shiping_cost'],
                    "shippingCostCharged" => $order['shiping_cost'],
                    "otherCosts" => 0,
                    "customsDutyCosts" => null,
                    "total" => $order['total_ammount'],
                    "currencyCode" => "GBP",
                    "postageDetails" => [
                        "sendNotificationsTo" => "sender",
                        "consequentialLoss" => 0,
                        "receiveEmailNotification" => null,
                        "receiveSmsNotification" => null,
                        "guaranteedSaturdayDelivery" => null,
                        "requestSignatureUponDelivery" => null,
                        "isLocalCollect" => null,
                        "safePlace" => null,
                        "department" => null,
                        "AIRNumber" => null,
                        "IOSSNumber" => null,
                        "requiresExportLicense" => null,
                        "commercialInvoiceNumber" => null,
                        "commercialInvoiceDate" => null
                    ],
                    "label" => [
                        "includeLabelInResponse" => false,
                        "includeCN" => false,
                        "includeReturnsLabel" => false
                    ],
                    "orderTax" => 0
                ]
            ]
        ];
        return  $payload;
    }

    // comments
    public function comments(Request $request)
    {
        try {
            $data = Comment::where(['comment_for' => 'Orders', 'comment_for_id' => $request->id])->get()->toArray();
            $message = 'Comments retirved  successfully';

            return response()->json(['status' => 'success', 'message' => $message, 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Error geting comments', 'error' => $e->getMessage()], 500);
        }
    }

    public function comment_store(Request $request): JsonResponse
    {
        $data['user'] = auth()->user();
        $page_name = 'orders_recieved';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        try {

            $comment = new Comment();
            $comment->comment_for    = 'Orders';
            $comment->comment_for_id = $request->comment_for_id;
            $comment->user_id        = Auth::user()->id;
            $comment->user_name  = Auth::user()->name;
            $comment->user_pic   = (Auth::user()->user_pic) ? asset('storage/' . Auth::user()->user_pic) : asset('assets/admin/img/profile-img1.png');
            $comment->comment    = $request->comment;
            $comment->created_by = Auth::id();;
            $save = $comment->save();

            $message = 'Comment added successfully';
            return response()->json(['status' => 'success', 'message' => $message, 'data' => $save]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Error storing Invoice', 'error' => $e->getMessage()], 500);
        }
    }

    public function update_additional_note(Request $request)
    {
        // update additional notes by admin which enter by user at order received screen
        $data['user'] = auth()->user();
        $page_name = 'orders_recieved';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $rules = [
            'note' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $updateData = [
            'note'       => $request->note,
            'updated_by' => $data['user']->id,
        ];

        $response = Order::where('id', $request->order_id)->update($updateData);

        $message = "Data updated Successfully";
        if ($response) {
            return redirect()->route('admin.orderDetail', ['id' => base64_encode($request->order_id)])->with(['msg' => $message]);
        }
    }

    public function update_shipping_address(Request $request)
    {
        // update shipping address by admin if enter wrong by user at order received screen
        $data['user'] = auth()->user();
        $page_name = 'orders_recieved';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $updateData = [];
        if ($request->city) {
            $updateData['city'] = $request->city;
        }

        if ($request->postal_code) {
            $updateData['zip_code'] = $request->postal_code;
        }

        if ($request->address1) {
            $updateData['address'] = $request->address1;
        }

        if ($request->address2) {
            $updateData['address2'] = $request->address2;
        }

        if ($request->city || $request->postal_code || $request->address1 || $request->address2) {
            $updateData['updated_by'] = $data['user']->id;
            $response = ShipingDetail::where('order_id', $request->order_id)->update($updateData);
            $message = "Data updated Successfully";
        } else {
            $message = "No data Received for update";
        }

        return redirect()->route('admin.orderDetail', ['id' => base64_encode($request->order_id)])->with(['msg' => $message]);
    }

    public function gp_locations()
    {
        $user = auth()->user();
        $page_name = 'gp_locations';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();

        if (isset($user->role) && $user->role == user_roles('1')) {
            $data['gp_locations'] = Pharmacy4uGpLocation::where('status', 'Active')->latest('id')->get()->toArray();
        }

        return view('admin.pages.questions.gp_locations', $data);
    }
}
