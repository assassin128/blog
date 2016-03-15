<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FrontendController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$results2 = DB::select('select * from mytable');
		var_dump($results2);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		DB::insert('INSERT INTO mytable (name, age) VALUE (?, ?)', ['Second person', 21]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id = "")
	{
		//
		if($id == ""){
			return redirect('');
		}
		$results = DB::select('select * from mytable where id = ?', [$id]);
		var_dump($results);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		DB::connection()->enableQueryLog();
		DB::table('mytable')->where('id', 2)->update(array('age' => 21, 'name' => 'huyhqaaaa'));
		$query = DB::getQueryLog();
		$lastQuery = end($query);
		var_dump($lastQuery);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id="")
	{
		//
		DB::delete('DELETE FROM mytable');
	}

	public function try_param($id = 1000){
		return !is_integer($id) ? "Try $id" : "Try blank";
	}

	public function try_blade($id=12){
//		$query = "DROP TABLE mytable";
//		DB::statement($query);
//		return;
		$query1 = "CREATE TABLE IF NOT EXISTS `mytable` (
        `id` int(10) NOT NULL,
          `name` varchar(50) NOT NULL,
          `age` int(10) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
		$query2 ="ALTER TABLE `mytable` ADD PRIMARY KEY (`id`)";
		$query3 = "ALTER TABLE `mytable` MODIFY `id` int(10) NOT NULL AUTO_INCREMENT";
		DB::statement($query1);
		DB::statement($query2);
		DB::statement($query3);
		return view('bl');
	}

	public function generate_db(){
		DB::insert('INSERT INTO mytable (id,name) VALUE (?, ?)', [1,'First person']);
	}

}
