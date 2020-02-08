<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Vocabulary;

class HashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = \App\Vocabulary::all();
        return view('hasher', [
        'words' => $words]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function getHashMethod($data,$prefix)
    {
	    $keyWords = [];
	    $result = [];
            foreach ($data as $key => $value)
	    {
	 	if (strpos($key, $prefix) === 0) {
			$keyWord = str_replace($prefix, '', $key);
			$result[$keyWord]['hash'] = $value;
			$keyWords[] = $keyWord;
	 	}	 
	    }

	    foreach ($keyWords as $keyWord) {
		    $result[$keyWord]['algoritm'] = $data[$keyWord];
	    }
	    return $result; 
    }
    public function store(Request $request)
    {
	    $prefix = 'hash_';
	    $all = $request->all();
	    $this->getHashMethod($all,$prefix);
    }

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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
