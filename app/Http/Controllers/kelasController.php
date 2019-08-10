<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
	public function index ()
	{
		// $data['kelas'] = \DB::table('t_kelas')
			// ->orderBy('jurusan')
		//->get();	
		
		$data['kelas'] = \App\Kelas::orderBy('jurusan')->get();
		return view ('belajar', $data);
	}
		
		public function create()
	{
		return view('kelas.form');
	}
	
	public function store(Request $request) 
	{
		$rule=[
		'nama_kelas'=>'required|string',
		'lokasi_ruangan'=>'required',
		'jurusan'=>'required',
		'nama_wali_kelas'=>'required|string',	];
	$this->validate($request, $rule);
	
		$input = $request->all();
		//unset($input['_token']);
		//$status = \DB::table('t_kelas')->insert($input);
		
		$status=\\App\Kelas::create($input);
		
		if ($status)
		{
			return redirect('/kelas')->with('success','data berhasil di tambahkan');
		}else{
			return redirect('/kelas/create')->with('error','data gagal ditambahkan');
		}
	}
	public function edit(Request $request, $id)
	{
		$data['kelas']=\DB::table('t_kelas')->find($id);
		return view('kelas.form',$data);
	
	public function update(Request $request, $id)
	{
		$rule=[
		'nama_kelas'=>'required|string',
		'lokasi_ruangan'=>'required',
		'jurusan'=>'required',
		'nama_wali_kelas'=>'required|string',	];
	$this->validate($request, $rule);
	
	$input=$request->all();
	//unset($input['_token']);
	//unset($input['_method']);
	
	//$status=\DB::table('t_kelas')->where('id',$id)->update($input);
	
	$kelas=\App\Kelas::find($id);
	$status=$kelas->update($input);
	
	if ($status)
	{
	return redirect ('/kelas')->with('success','Data berhasil diubah');
	}
	else {
	return redirect ('/kelas/create')->with('Error','Data gagal diubah');
	}
	}
	
	public function destroy(Request $request, $id)
	{
		$kelas = \App\Kelas::find($id);
		$status = $kelas->delete();
		
	    //$ststus = \DB::table('t_kelas')->where('id',$id)->delete();
	
	if ($statustus) 
	{
	return redirect('/kelas')->with('success','Data berhasil dihapus');
	}
	else {
	return redirect ('/kelas/create')->with('error','Data gagal dihapus');
	}
	}
}