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

    public function getById(int $id)
    {
        return $this->usuarioRepository->getById($id);
    }

    public function create(array $data)
    {
        if (isset($data['contraseña'])) {
            $data['contraseña'] = Hash::make($data['contraseña']);
        }

        return $this->usuarioRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        if (isset($data['contraseña'])) {
            $data['contraseña'] = Hash::make($data['contraseña']);
        }

        return $this->usuarioRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->usuarioRepository->delete($id);
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