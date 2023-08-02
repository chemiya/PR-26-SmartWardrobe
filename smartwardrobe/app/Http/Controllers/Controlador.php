<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;
use Illuminate\Http\Response;

class Controlador extends Controller
{
    public function index()
    {
        // Lógica para manejar la solicitud GET de la página de inicio
        return view('principal');
    }

    public function identificacion()
    {
        // Lógica para manejar la solicitud GET de la página de inicio
        return view('identificacion');
    }

    public function registro()
    {
        // Lógica para manejar la solicitud GET de la página de inicio
        return view('registro');
    }




    public function misConjuntos()
    {
        // Lógica para manejar la solicitud GET de la página de inicio
        $idUsuario=Cookie::get("idUsuario");
        $conjuntos=DB::select("select * from conjuntos where idUsuario=".$idUsuario);
        return view('misConjuntos')->with("conjuntos",$conjuntos);
    }

    public function misPrendas()
    {
        // Lógica para manejar la solicitud GET de la página de inicio
        $idUsuario=Cookie::get("idUsuario");
        $prendas=DB::select("select * from prendas where idUsuario=".$idUsuario);
        return view("misPrendas")->with("prendas",$prendas);
    }





    public function registrarConjunto()
    {
        // Lógica para manejar la solicitud GET de la página de inicio
        $idUsuario=Cookie::get("idUsuario");
        $prendas=DB::select("select * from prendas where idUsuario=".$idUsuario);
        
        return view('registrarConjunto',['prendas'=>$prendas]);
    }

    public function registrarPrenda()
    {
        // Lógica para manejar la solicitud GET de la página de inicio
        return view('registrarPrenda');
    }





    public function detalleConjunto($id)
    {
        $conjunto=DB::select("select * from conjuntos where id=".$id);
        $idConjunto=$conjunto[0]->id;
        $prendasIncluidas=DB::select("select componente.seccion as seccion, prenda.nombre as nombre, prenda.marca as marca, prenda.fechaCompra as fechaCompra,prenda.foto as foto from prendas prenda, componentes componente where componente.idConjunto=".$idConjunto." and componente.idPrenda=prenda.id");

        return view('detalleConjunto',['conjunto'=>$conjunto[0],"prendasIncluidas"=>$prendasIncluidas]);
    }

    public function detallePrenda($id)
    {
        $prenda=DB::select("select * from prendas where id=".$id);

        return view('detallePrenda',['prenda'=>$prenda[0]]);
     
    }




    public function editarPrenda($id)
    {
        // Lógica para manejar la solicitud GET de la página de inicio
        $prenda=DB::select("select * from prendas where id=".$id);

        return view('editarPrenda',['prenda'=>$prenda[0]]);
    }

    public function editarConjunto($id)
    {
        // Lógica para manejar la solicitud GET de la página de inicio
        $conjunto=DB::select("select * from conjuntos where id=".$id);
        $idConjunto=$conjunto[0]->id;
        $prendasIncluidas=DB::select("select componente.id as idComponente, componente.seccion as seccion, prenda.id as idPrenda, prenda.nombre as nombre, prenda.marca as marca,prenda.foto as foto, prenda.fechaCompra as fechaCompra from prendas prenda, componentes componente where componente.idConjunto=".$idConjunto." and componente.idPrenda=prenda.id");

        $idUsuario=Cookie::get("idUsuario");
        $prendas=DB::select("select * from prendas where idUsuario=".$idUsuario);

        $idIncluidas=[];
        foreach($prendasIncluidas as $prendaIncluida){
            array_push($idIncluidas,$prendaIncluida->idPrenda);
        }

        $prendasFiltradas=[];
        foreach($prendas as $prenda){
            if(!in_array($prenda->id,$idIncluidas)){
                array_push($prendasFiltradas,$prenda);
            }
        }


        return view('editarConjunto',['conjunto'=>$conjunto[0],"prendasIncluidas"=>$prendasIncluidas,"prendasFiltradas"=>$prendasFiltradas]);
    }



    public function identificarUsuarioAccion(Request $request)
    {

        $mensajes = [
            'username.required' => 'El username es obligatorio.',
           
            'password.required' => 'La contraseña es obligatoria.'
            
       ];

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],$mensajes);


        try{
            $encontrados=DB::select("select * from usuarios where username=? and password=?",[$request->username,$request->password ]);
        }catch(Throwable $th){
            $encontrados=0;
        }

       
        
        if( count($encontrados)>0){
            Cookie::queue("idUsuario",$encontrados[0]->id,60);
            return redirect()->route('misPrendas');
            
        
        }else{
            return redirect()->route('identificacion')->with('error', 'Usuario y contraseña incorrectos');
        }


       /*
        if($sql==true){
            return redirect()->route('misPrendas')->with('success', 'Guardado correctamente');
        }else{
            return back()->with("error","producto no se ha registrado");
        }*/
    }



    public function registrarUsuarioAccion(Request $request)
    {

        $mensajes = [
            'username.required' => 'El username es obligatorio.',
            'email.required' => 'El email es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.',
            'email.email' => 'El email debe tener el formato correcto.'
       ];

        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ],$mensajes);


        try{
            $sql=DB::insert("insert into usuarios(username, password,email) values(?,?,?)",[$request->username,$request->password,$request->email ]);
        }catch(Throwable $th){
            $sql=0;
        }



       
        if($sql==true){
            return redirect()->route('identificacion')->with('success', 'Te has registrado con éxito');
        }else{
            return back()->with("error","producto no se ha registrado");
        }
    }
    public function registrarPrendaAccion(Request $request)
    {

        $mensajes = [
            'nombre.required' => 'El nombre es obligatorio.',
            'talla.required' => 'La talla es obligatoria.',
            'fechaCompra.required' => 'La fecha de compra es obligatoria.',
            'precioCompra.required' => 'El precio de compra es obligatorio.',
            'marca.required' => 'La marca es obligatoria.',
            "foto.required"=>"La foto es obligatoria."
       ];

        $request->validate([
            'nombre' => 'required',
            'talla' => 'required',
            'fechaCompra' => 'required',
            'precioCompra' => 'required',
            'marca' => 'required',
            'foto' => 'required'

        ],$mensajes);

        $file_name = time() . '.' . request()->foto->getClientOriginalExtension();

        request()->foto->move(public_path('images'), $file_name);

        //return $request->nombre."/".$request->talla."/".$request->fechaCompra."/".$request->precioCompra."/".$request->marca."/";

        $idUsuario=Cookie::get("idUsuario");
        try{
            $sql=DB::insert("insert into prendas(nombre, talla,fechaCompra,precioCompra,marca,idUsuario,foto) values(?,?,?,?,?,?,?)",[$request->nombre,$request->talla,$request->fechaCompra,$request->precioCompra ,$request->marca,$idUsuario,$file_name]);
        }catch(Throwable $th){
            $sql=0;
         
        }

      

  
        if($sql==true){
            return redirect()->route('misPrendas')->with('success', 'La prenda se ha registrado');
        }else{
            return back()->with("error","producto no se ha registrado");
        }
    }

    public function registrarConjuntoAccion(Request $request)
    {

        $mensajes = [
            'nombre.required' => 'El nombre es obligatorio.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'foto.required' => 'La foto es obligatoria.'
            
       ];

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'foto' => 'required'
            

        ],$mensajes);

        

        $depuracion="";
        //return $request->nombre."/".$request->talla."/".$request->fechaCompra."/".$request->precioCompra."/".$request->marca."/";
        $idUsuario=Cookie::get("idUsuario");
        $prendas=DB::select("select * from prendas where idUsuario=".$idUsuario);
        $prendasIncluidasArray=[];
        foreach($prendas as $prenda){
            $prendaIncluida=new PrendasIncluidas();
            $prendaIncluida->id=$prenda->id;
            array_push($prendasIncluidasArray,$prendaIncluida);
        }



        /*
        foreach($prendasIncluidasArray as $prenda){
            $depuracion=$depuracion."/".$prenda->id;
        }

        echo $depuracion;*/


        
        $indice=0;
        $junto="";
        $numeroPrendas=0;
        if ($_SERVER["REQUEST_METHOD"] === "POST" ) {
            foreach ($_REQUEST as $key => $value) {
                $nombre=htmlspecialchars($key); 
                $valor=htmlspecialchars($value); 
                if(strpos($nombre,"incluir")!==false){
                    //echo $nombre." valor incluye".$valor." <br>";

                    $prendaModificar=$prendasIncluidasArray[$indice];
                    $prendaModificar->incluida=$valor;
                    if($valor!="noincluir"){
                        $numeroPrendas++;
                    }

                    $prendasIncluidasArray[$indice]=$prendaModificar;
                    $junto=$junto. "id:".$prendaModificar->id."  incluida:".$prendaModificar->incluida."<br>";

                    $indice++;
                }

               
                
            }
        }


        /*
        foreach($prendasIncluidasArray as $prenda){
            $depuracion=$depuracion."/".$prenda->id;
            $depuracion=$depuracion."/".$prenda->incluida;
        }

        echo $depuracion;*/


        
        
        if($numeroPrendas==0){
            return back()->with("error","Debes incluir alguna prenda.");
        }

        $fechaCreacion = date("Y-m-d");
        $idUsuario=Cookie::get("idUsuario");
        

        $file_name = time() . '.' . request()->foto->getClientOriginalExtension();

        request()->foto->move(public_path('images'), $file_name);
        

        
        try{
            $sql=DB::insert("insert into conjuntos(nombre, descripcion,fechaCreacion, numeroPrendas,foto,idUsuario) values(?,?,?,?,?,?)",[$request->nombre,$request->descripcion, $fechaCreacion,$numeroPrendas,$file_name,$idUsuario]);
        }catch(Throwable $th){
            $sql=0;
         
        }

        $encontrado=DB::select("select * from conjuntos where nombre='".$request->nombre."'and descripcion='".$request->descripcion."'and fechaCreacion='".$fechaCreacion."'and numeroPrendas=".$numeroPrendas." and idUsuario=".$idUsuario);

        $idEncontrado=$encontrado[0]->id;

        

        
        $inserts="";
        foreach($prendasIncluidasArray as $prendaArray){
            
            if($prendaArray->incluida!="noincluir"){
                $sql=DB::insert("insert into componentes(idUsuario,idPrenda,idConjunto,seccion) values(?,?,?,?)",[$idUsuario,$prendaArray->id,$idEncontrado,$prendaArray->incluida]);
                $inserts=$inserts."   nueva";
            }
        }

       
  
        if($sql==true){
            return redirect()->route('misConjuntos')->with('success', 'El conjunto se ha registrado');
        }else{
            return back()->with("error","producto no se ha registrado");
        }
    }

    public function eliminarPrendaAccion($id){
        try{
            $sql=DB::delete("delete from prendas where id=$id");
            
        }catch(Throwable $th){
            $sql=0;
        }



       
        if($sql==true){
            return redirect()->route('misPrendas')->with('success', 'Prenda eliminada');
        }else{
            return back()->with("error","producto no se ha eliminado");
        }
    }

    public function eliminarPrendaConjuntoAccion($id){
        try{
            $sql=DB::delete("delete from componentes where id=$id");
            
        }catch(Throwable $th){
            $sql=0;
        }



       
        if($sql==true){
            return back()->with("success","Prenda eliminada del conjunto");
        }else{
            return back()->with("error","producto no se ha eliminado");
        }
    }

    public function eliminarConjuntoAccion($id){
        try{
            $sql=DB::delete("delete from conjuntos where id=$id");
            
        }catch(Throwable $th){
            $sql=0;
        }



       
        if($sql==true){
            return redirect()->route('misConjuntos')->with('success', 'Conjunto eliminado');
        }else{
            return back()->with("error","producto no se ha eliminado");
        }
    }

    public function editarPrendaAccion(Request $request)
    {

        $mensajes = [
            'nombre.required' => 'El nombre es obligatorio.',
            'talla.required' => 'La talla es obligatoria.',
            'fechaCompra.required' => 'La fecha de compra es obligatoria.',
            'precioCompra.required' => 'El precio de compra es obligatorio.',
            'marca.required' => 'La marca es obligatoria.'
       ];

        $request->validate([
            'nombre' => 'required',
            'talla' => 'required',
            'fechaCompra' => 'required',
            'precioCompra' => 'required',
            'marca' => 'required'

        ],$mensajes);

        //return $request->nombre."/".$request->talla."/".$request->fechaCompra."/".$request->precioCompra."/".$request->marca."/";

        
        $file_name="foto";
        if($request->foto != '')
        {
            $file_name = time() . '.' . request()->foto->getClientOriginalExtension();

            request()->foto->move(public_path('images'), $file_name);
        }




        try{
            if($file_name!="foto"){
                $sql=DB::update("update prendas set nombre=?,talla=?,fechaCompra=?,precioCompra=?, marca=?,foto=? where id=?",[$request->nombre,$request->talla,$request->fechaCompra,$request->precioCompra ,$request->marca,$file_name, $request->id]);
            }else{
                $sql=DB::update("update prendas set nombre=?,talla=?,fechaCompra=?,precioCompra=?, marca=? where id=?",[$request->nombre,$request->talla,$request->fechaCompra,$request->precioCompra ,$request->marca, $request->id]);
            }
            
        }catch(Throwable $th){
            $sql=0;
         
        }

      

  
        if($sql==true){
            return redirect()->route('misPrendas')->with('success', 'Se ha editado la prenda');
        }else{
            return back()->with("error","producto no se ha registrado");
        }
    }



    public function editarConjuntoAccion(Request $request)
    {

        $mensajes = [
            'nombre.required' => 'El nombre es obligatorio.',
            'descripcion.required' => 'La descripcion es obligatoria.'
            
       ];

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'

        ],$mensajes);

        //return $request->nombre."/".$request->talla."/".$request->fechaCompra."/".$request->precioCompra."/".$request->marca."/";

       


        $file_name="foto";
        if($request->foto != '')
        {
            $file_name = time() . '.' . request()->foto->getClientOriginalExtension();

            request()->foto->move(public_path('images'), $file_name);
        }


        $idUsuario=Cookie::get("idUsuario");
        $indice=0;
        $junto="";
       
        if ($_SERVER["REQUEST_METHOD"] === "POST" ) {
            foreach ($_REQUEST as $key => $value) {
                $nombre=htmlspecialchars($key); 
                $valor=htmlspecialchars($value); 
                if(strpos($nombre,"incluir")!==false){
                    //echo $nombre." valor incluye".$valor." <br>";
                    if($valor!="noincluir"){
                        $idPrenda=str_replace("incluir", "", $nombre);
                        $sql=DB::insert("insert into componentes(idUsuario,idPrenda,idConjunto,seccion) values(?,?,?,?)",[$idUsuario,$idPrenda,$request->id,$valor]);
                       
                    }
                    

                   
                }

               
                
            }
        }



        $cantidad=DB::select("select count(*) as numero from componentes where idConjunto=".$request->id);
        $numeroPrendas=$cantidad[0]->numero;

        try{
            if($file_name!="foto"){
                $sql=DB::update("update conjuntos set nombre=?,descripcion=?, foto=?,numeroPrendas=? where id=?",[$request->nombre,$request->descripcion,$file_name,$numeroPrendas,$request->id]);
            }else{
                $sql=DB::update("update conjuntos set nombre=?,descripcion=?,numeroPrendas=? where id=?",[$request->nombre,$request->descripcion,$numeroPrendas,$request->id]);
            }

            
        }catch(Throwable $th){
            $sql=0;
         
        }

      

  
        if($sql==true){
            return redirect()->route('misConjuntos')->with('success', 'Se ha editado el conjunto');
        }else{
            return back()->with("error","producto no se ha registrado");
        }
    }
}

class PrendasIncluidas{
    public $id;
    public $incluida;
}
