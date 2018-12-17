<?php

namespace Academico2\Http\Controllers\API\Academico;

use Illuminate\Http\Request;
use Academico2\Http\Controllers\Controller;
use Academico2\Model\Academico\Materia;
use Academico2\Model\Academico\MateriaCorrelativa;
use Academico2\Http\Resources\Materia\MateriaResource;
use Academico2\Http\Resources\Materia\MateriasResource;

class MateriaController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MateriaResource::collection(Materia::paginate());
    }


    /**
     * Retorna el listado de materias por carrera
     */
    public function getMateriasByCarrera(Carrera $carrera){
        return MateriaResource::collection(
            Materia::where('id_carrera' , $carrera->id_carrera)->all()
        );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_carrera' => 'required',
            'nombre' => 'required',
            'semestre_nro' => 'required',
            'anho_lectivo' => 'required'
        ]);


        $materia = Materia::create($request->all());
        return [ "data" => $materia ];
    }


    /**
     * Verificia si el alumno no se inscripbio en la 
     */
    public function notInscription(){

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        return new MateriaResource($materia);
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
