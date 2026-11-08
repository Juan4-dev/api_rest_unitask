<?php

namespace App\Repositories;

use App\Models\Usuario;
use App\Interfaces\UsuarioInterface;

class UsuarioRepository extends BaseRepository implements UsuarioInterface
{
    public function __construct(Usuario $usuario)
    {
        parent::__construct($usuario);
    }

    public function findByUsuario(string $usuario)
    {
        return $this->model->where("usuario", $usuario)->first();
    }

    public function findByIdentification(string $numeroIdentificacion)
    {
        return $this->model->where("numero_identificacion", $numeroIdentificacion)->first();
    }

    public function findByRol(int $rol)
    {
        return $this->model->where("rol", $rol)->get();
    }

    public function assignRole(int $usuario, int $rol)
    {
        return $this->model->where("id", $usuario)->update(["rol" => $rol]);
    }

    public function verifyCredentials(string $usuario, string $contraseña)
    {
    $user = $this->model->where('usuario', $usuario)->first();

    if ($user && Hash::check($contraseña, $user->contraseña)) {
        return $user;
    }

    return null;
    }

}
