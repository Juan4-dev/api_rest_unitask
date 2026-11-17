<?php

namespace App\Services;

use App\Interfaces\UsuarioInterface;
use Illuminate\Support\Facades\Hash;

class UsuarioService
{
    public function __construct(protected UsuarioInterface $usuarioRepository)
    {
    }

    public function getAll()
    {
        return $this->usuarioRepository->getAll();
    }

    // Cambiamos $id por $numeroIdentificacion para reflejar la PK real de la tabla
    public function getById(int $numeroIdentificacion)
    {
        return $this->usuarioRepository->getById($numeroIdentificacion);
    }

    public function create(array $data)
    {
        if (isset($data['contraseña'])) {
            $data['contraseña'] = Hash::make($data['contraseña']);
        }

        return $this->usuarioRepository->create($data);
    }

    public function update(int $numeroIdentificacion, array $data)
    {
        if (isset($data['contraseña'])) {
            $data['contraseña'] = Hash::make($data['contraseña']);
        }

        return $this->usuarioRepository->update($numeroIdentificacion, $data);
    }

    public function delete(int $numeroIdentificacion)
    {
        return $this->usuarioRepository->delete($numeroIdentificacion);
    }

    public function findByNombreEmpleado(string $nombreEmpleado)
    {
        return $this->usuarioRepository->findByNombreEmpleado($nombreEmpleado);
    }

    public function findByNumeroIdentificacion(int $numeroIdentificacion)
    {
        return $this->usuarioRepository->findByNumeroIdentificacion($numeroIdentificacion);
    }

    public function findByApellidoEmpleado(string $apellidoEmpleado)
    {
        return $this->usuarioRepository->findByApellidoEmpleado($apellidoEmpleado);
    }

    public function findByTelefonoEmpleado(string $telefonoEmpleado)
    {
        return $this->usuarioRepository->findByTelefonoEmpleado($telefonoEmpleado);
    }

    public function findByCorreoEmpleado(string $correoEmpleado)
    {
        return $this->usuarioRepository->findByCorreoEmpleado($correoEmpleado);
    }

    public function findByUsuario(string $usuario)
    {
        return $this->usuarioRepository->findByUsuario($usuario);
    }

    public function assignRole(int $numeroIdentificacion, int $idRol)
    {
        return $this->usuarioRepository->assignRole($numeroIdentificacion, $idRol);
    }

    public function verifyCredentials(string $usuario, string $contraseña)
    {
        return $this->usuarioRepository->verifyCredentials($usuario, $contraseña);
    }
}