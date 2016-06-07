<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Support\Facades\DB;
use Request;
use Illuminate\Http\ProdutosRequest;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{
 	
 	public function lista(){
 		 //$produtos = DB::select('select * from produtos');
 		 $produtos = Produto::all();
 		 return view('produto.listagem')->with('produtos',$produtos);	
	}   

	public function mostra($id){
		//$resposta = DB::select('select * from produtos where id = ?',[$id]);
		$produto=Produto::find($id);
  		if(empty($produto)) {
    		return "Esse produto não existe";
		}
  		return view('produto.detalhes')->with('p', $produto);
	}
 
	public function novo(){
		return view('produto.formulario');
	}

	public function adiciona(){
		  $validator = Validator::make(
        	['nome' => Request::input('nome')],
        	['nome' => 'required|min:5']
		);
    if ($validator->fails())
    	{
      	return redirect()
        ->action('ProdutoController@novo');
		} 
		Produto::create(Request::all());
	 return redirect()
        ->action('ProdutoController@lista')
        ->withInput(Request::only('nome'));
	}

	public function listaJson(){
    	$produtos = Produto::all();
    	return response()->json($produtos);
	}

	public function remove($id){
    	 $produto = Produto::find($id);
	    $produto->delete();
	    return redirect()
        ->action('ProdutoController@lista');
	}

	public function editar($id){
		$produto = Produto::find($id);
		if(empty($produto)) {
    		return redirect()
        ->action('ProdutoController@lista');	
		}
  		return view('produto.atualiza')->with('p', $produto);
	}

	public function atualizar($id){
		 $input = Request::all();
		 $produto = Produto::find($id);
		 $produto->update($input);
		return redirect()
        ->action('ProdutoController@lista')
        ->withInput(Request::only('valor'));
	}

}
