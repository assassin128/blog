<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\M_category;
use Illuminate\Http\Request;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$categories = M_category::orderBy('id', 'DESC')->get();
//		$categories = DB::table('category')->orderBy('id', 'DESC');
//		dd($categories);
		return view('category/index', ['categories' => $categories]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('category/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$messages = [
			'required' => 'Custom required.!!!',
		];

		$this->validate($request, [
			'cate_name' => 'required',
		], $messages);

		M_category::create($request->all());
		return redirect('category')->with('message', $this->message_code('success'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$category = M_category::find($id);
//		dd($category);
		if(!isset($category)) return redirect('category');
		return view('category/detail', ['category' => $category]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request, $id)
	{
		//
		$category = M_category::find($id);
		if(empty($category)) return redirect('category');
		return view('category/edit', ['category' => $category]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		//
		$messages = [
				'required' => 'Custom required.!!!',
		];

		$this->validate($request, [
				'cate_name' => 'required',
		], $messages);

		$cate_data = $request->all();
		$cate = M_category::find($id);

		if(empty($cate)){
			return redirect('category');
		}

		$cate->fill($cate_data)->save();
		return redirect('category')->with('message', $this->message_code('success'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$category = M_category::find($id);
		if(empty($category)) return redirect('category');
		$category->delete();
		return redirect()->route('category.index')->with('message', $this->message_code('success'));
	}

	public function message_code($code)
	{
		$arr_message = array(
			'error' => 'Error',
			'success' => 'Success',
		);
		return $arr_message[$code];
	}

}
