<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Vocabulary;
use \App\User;
use Illuminate\Support\Facades\Auth;
use \App\Hash;

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
    public function store(Request $request)
    {
	    $prefix = 'hash_';
	    $dataRequest = $request->all();
	    $userHashes = $this->getHashMethod($dataRequest,$prefix);
	    $id = Auth::id();
        if (!isset($id)) {
            return redirect('/register');
        }
        foreach ($userHashes as $key=>$hash) {
            $record = new Hash();
            $record->user_id = $id; 
            $record->key = $key;
            $record->hash = $hash['hash'];
            $record->algoritm = $hash['algoritm'];
            $record->save();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user_id = Auth::id();
        if (!isset($user_id)) {
            return redirect('/register');
        }
        $records = Hash::all()->where('user_id', $user_id);

        $json = [];
        foreach ($records as $record) {
            $key = $record['key'];
            $json[$key]['algoritm'] = $record['algoritm'];
            $json[$key]['hash'] = $record['hash'];
        }   

        print_r(json_encode($json, JSON_UNESCAPED_UNICODE));

       
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
    /* parser data and create associative array  */

    private function getHashMethod($data,$prefix)
    {
	    $keyWords = [];
	    $result = [];
            foreach ($data as $key => $value)
	    {
	 	if (strpos($key, $prefix) === 0 and isset($value)) {
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

    
}
