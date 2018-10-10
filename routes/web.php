<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use furbook\Http\Requests\CatRequest;

View::composer('partials.form.cat', function ($view) {
    $view->breeds = furbook\Breed::pluck('name', 'id');
});


Route::get('/', function () {
    /**
     * Test get query log
     */
    //DB::enableQueryLog();
    //$breed = furbook\Breed::find(1);
    //dd(DB::getQueryLog());

    //$cat = furbook\Cat::find(1);

    /**
     * Test data relation
     */
    //dd($breed->cats);
    //dd($cat->breed);
    return redirect('cats');
});

// Show list cats
//Route::get('/cats', function () {
//    $cats = furbook\Cat::orderBy('created_at', 'DESC')->get();
//    //dd($cats);
//    return view('cats.index')->with('cats', $cats);
//})->name('cat.index');
Route::resource('cats', 'CatController');

// Show list cats belong to breed
//Route::get('/cats/breeds/{name}', function ($name) {
//    $breed = furbook\Breed::where('name', $name)
//        ->first();
//    $cats = $breed->cats;
//    //dd($cats);
//    return view('cats.index', compact('breed', 'cats'));
//})->name('cat.breed');
// Show detail of cat
//Route::get('/cats/{cat}', function (furbook\Cat $cat) {
//   return view('cats.show')->with('cat', $cat);
//})->name('cat.show')->where('id', '[0-9]+');

// Show form create cat
//Route::get('/cats/create', function () {
//    $breeds = furbook\Breed::pluck('name', 'id');
//    //dd($breeds);
//    return view('cats.create', compact('breeds'));
//})->name('cat.create');

// Insert new cat
//Route::post('/cats', function () {
//    $validator = Validator::make(
//        request()->all(),
//        [
//            'name'          => 'required|max:255',
//            'date_of_birth' => 'required|date_format:"Y-m-d"',
//            'breed_id'      => 'required|numeric',
//        ],
//        [
//            'required'    => 'Trường :attribute là bắt buộc',
//            'max'         => 'Trường :attribute tối đa là :max kí tự',
//            'numeric'     => 'Trường bắt buộc :attribute là kiểu số nguyên',
//            'date_format' => 'Trường :attribute format không đúng định dạng :format',
//        ]
//    );
//
//    if ($validator->fails()) {
//        return redirect()
//            ->back()
//            ->withErrors($validator)
//            //->with('errors', $validator)
//            ->withInput();
//    }
//
//    $data = Request::all();
//    furbook\Cat::create($data);
//    return redirect()
//        ->route('cat.index');
//})->name('cat.store');

// Show form edit cat
//Route::get('/cats/{id}/edit', function ($id) {
////    return 'Show form edit cat #' . $id;
//    $breeds = furbook\Breed::pluck('name', 'id');
//    $cat = furbook\Cat::find($id);
//    //dd($cat);
//    return view('cats.edit', compact('cat', 'breeds'));
//})->name('cat.edit');

// Update cat

//    return 'Update cat';
//Route::put('/cats/{id}', function (CatRequest $request, $id) {
//    $data = $request->all();
//    $cat = furbook\Cat::find($id);
//    $cat->update($data);
//    return redirect()
//        ->route('cat.index');
//})->name('cat.update');


// Delete cat
//    Route::delete('/cats/{id}', function ($id) {
//
//        $cat = furbook\Cat::find($id);
//        $cat->delete();
//        return redirect()
//            ->route('cat.index');
//    })->name('cat.destroy');
//Route::get('/cats/breeds/{name}', ['uses' => 'CatController@breed', 'as' => 'cats.breed']);
Route::get('/cats/breeds/{name}', [
    'uses' => 'CatController@breed',
    'as' => 'cats.breed',
    //'middleware' => 'admin'
]);
// Test
//Route::get('test', 'TestController@_is_last_weekday_of_month');
Route::get('test', 'TestController@_is_last_weekday_of_month');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

