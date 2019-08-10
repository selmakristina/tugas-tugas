<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
	public function index()
	{
		$data['siswa'] = \DB::table('t_siswa')
			->orderBY('jenkel')
			//->where('nama_lengkap','like','%o%')
			->get();
		return view('belajar', $data);
	}
	public function create()
	{
		return view('siswa.form');
	}
	public function store(Request $request) 
	{
		$input = $request->all();
		unset($input['_token']);
		$status = \DB::table('t_siswa')->insert($input);
		
		if ($status)
		{
			return redirect('/siswa')->with('success','data berhasil di tambahkan');
		}else{
			return redirect('/siswa/create')->with('error','data gagal ditambahkan');
		}
	}
	public function edit(Request $request, $id)
	{
		$data['siswa']=\DB::table('t_siswa')->find($id);
		return view('siswa.form',$data);
	}
	public function update(Request $request, $id)
	{
	$rule=[
	'nis'=>'required|numeric',
	'nama_lengkap'=>'required|string',
	'jenkel'=>'required',
	'goldar'=>'required',	];
	$this->validate($request, $rule);
	

	$input=$request->all();
	unset($input['_token']);
	unset($input['_method']);
	
	$status=\DB::table('t_siswa')->where('id',$id)->update($input);
	
	if ($status)
	{
	return redirect ('/siswa')->with('success','Data berhasil diubah');
	}
	else {
	return redirect ('/siswa/create')->with('Error','Data gagal diubah');
	}
	}
	public function destroy(Request $request, $id)
	{
	$ststus = \DB::table('t_siswa')->where('id',$id)->delete();
	
	if ($ststus) 
	{
	return redirect('/siswa')->with('success','Data berhasil dihapus');
	}
	else {
	return redirect ('/siswa/create')->with('error','Data gagal dihapus');
	}
	}
}