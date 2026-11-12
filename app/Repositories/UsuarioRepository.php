<?php

namespace App\Repositories;

use App\Models\Usuario;
use App\Interfaces\UsuarioInterface;
use Illuminate\Support\Facades\Hash;

class UsuarioRepository extends BaseRepository implements UsuarioInterface
{
    public function __construct(Usuario $usuario)
    {
        parent::__construct($usuario);
    }

    public function findByNombreEmpleado(string $nombreEmpleado)
    {
        return $this->model->where("nombre_empleado", $nombreEmpleado)->get();
    }

    public function findByNumeroIdentificacion(int $numeroIdentificacion)
    {
        return $this->model->where("numero_identificacion", $numeroIdentificacion)->first();
    }

    public function findByApellidoEmpleado(string $apellidoEmpleado)
    {
        return $this->model->where("apellido_empleado", $apellidoEmpleado)->get();
    }

    public function findByTelefonoEmpleado(string $telefonoEmpleado) // Cambiado a string por si el teléfono trae símbolos o ceros a la izquierda
    {
        return $this->model->where("telefono_empleado", $telefonoEmpleado)->get();
    }

    public function findByUsuario(string $usuario)
    {
        return $this->model->where("usuario", $usuario)->first();
    }

    public function assignRole(int $numeroIdentificacion, int $idRol)
    {
        return $this->model->where("numero_identificacion", $numeroIdentificacion)->update(["id_rol" => $idRol]);
    }

    public function verifyCredentials(string $usuario, string $contraseña)
    {
        $user = $this->model->where('usuario', $usuario)->first();
        
        if ($user && Hash::check($contraseña, $user->contraseña)) 
        {
            return $user;
        }
        
        return null;
    }
}