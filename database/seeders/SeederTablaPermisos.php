<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos=[
            //tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //tabla especialidades
            'ver-especialidad',
            'crear-especialidad',
            'editar-especialidad',
            'borrar-especialidad',
            //usuarios
            'ver-usuarios',
            'crear-usuarios',
            'editar-usuarios',
            'borrar-usuarios',
            //citas
            'ver-citas',
            'crear-citas',
            'editar-citas',
            'borrar-citas',
            //medicos
            'ver-medico',
            'crear-medico',
            'editar-medico',
            'borrar-medico',
            //mascota
            'ver-pacientes',
            'crear-pacientes',
            'editar-pacientes',
            'borrar-pacientes',
             //propietarios
             'ver-propietarios',
             'crear-propietarios',
             'editar-propietarios',
             'borrar-propietarios',
             //historial clinico
             'ver-historial',
             'crear-historial',
             'editar-historial',
             'borrar-historial',
           ];
           foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
          
           }
    }
}
