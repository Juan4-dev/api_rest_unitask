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

    public function findByNumeroIdentificacion(int $numeroIdentificacion)
    {
        return $this->model->where("numero_identificacion", $numeroIdentificacion)->first();
    }

    public function findByNombreEmpleado(string $nombreEmpleado)
    {
        return $this->model->where("nombre_empleado", "like", "%" . $nombreEmpleado . "%")->get();
    }

    public function findByApellidoEmpleado(string $apellidoEmpleado)
    {
        return $this->model->where("apellido_empleado", "like", "%" . $apellidoEmpleado . "%")->get();
    }

    public function findByTelefonoEmpleado(string $telefonoEmpleado)
    {
        return $this->model->where("telefono_empleado", $telefonoEmpleado)->get();
    }

    public function findByCorreoEmpleado(string $correoEmpleado)
    {
        return $this->model->where("correo_empleado", $correoEmpleado)->first();
    }

    public function findByUsuario(string $usuario)
    {
        return $this->model->where("usuario", $usuario)->first();
    }

    public function assignRole(int $numeroIdentificacion, int $idRol)
    {
        $user = $this->findByNumeroIdentificacion($numeroIdentificacion);
        if ($user) {
            $user->update(["id_rol" => $idRol]);
            return $user->fresh();
        }
        return null;
    }

    public function verifyCredentials(string $usuario, string $password)
    {
        $user = $this->model->where('usuario', $usuario)->first();
        
        if ($user && Hash::check($password, $user->contraseña)) 
        {
            return $user;
        }
        
        return null;
    }
}