<?php namespace ActivoFijo;

use Illuminate\Database\Eloquent\Model;


class Oficina extends Model {

	//
	protected $table = '01ofnas';
	public $timestamps = false;
	protected $primaryKey = 'IdOfna';

	public function empleados()
    {
        return $this->hasMany('ActivoFijo\Empleado','IdOfna','IdOfna');
    }

    //regresa los valores relacionados
    public function bienes()
    {
        return $this->hasMany('ActivoFijo\MovtosDetalle','Ubicac','IdOfna')
        ->where('ultimo',1)
        ->whereRaw("NOT EdodelBien like '%BAJA%'");
        //->get();
    }

		//regresa los valores relacionados
    public function movimientos()
    {
        return $this->hasMany('ActivoFijo\Detalles','Ubicac','IdOfna')
        ->where('ultimo',1)
        ->whereRaw("NOT EdodelBien like '%BAJA%'");
        //->get();
    }

    public function getNumeroEmpleadosAttribute()
    {
    	# Regresa el numero de empleados
    	return $this->empleados()->where('Baja', 0)->count();
    }

    public function getNumeroBienesAttribute()
    {
        # Regresa el numero de bienes en la adscripcion
        return $this->bienes()->count();
    }
    public function getTotalmovimientosAttribute()
    {
        # code...
        return \DB::table('movtosdetal')->where('Ubicac',$this->IdOfna)->count();
        //return 1;
    }

    //Busqueda
    public function scopeNombre($query, $nombre)
    {
        # busca por nombre
        if($nombre!="")
            $query->where('DescOfna','LIKE','%'.$nombre.'%');
    }

    public function scopeId($query, $id)
    {
        # busca por id
        if($id!="")
            $query->where('IdOfna',$id);
    }
    
}