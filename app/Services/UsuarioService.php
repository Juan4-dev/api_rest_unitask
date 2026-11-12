<?php

namespace App\Services;

use App\Interfaces\UsuarioInterface;

class UsuarioService
{
    public function __construct(protected UsuarioInterface $usuarioRepository)
    {
    }

    public function getAll()
    {
        return $this->usuarioRepository->getAll(); // Cambiado de all() a getAll()
    }

    public function getById($id)
    {
        return $this->usuarioRepository->getById($id); // Cambiado de find() a getById() según el BaseRepository
    }

    public function create(array $data)
    {
        // Opcional: Aquí puedes aplicar Hash::make($data['contraseña']) si no lo haces en el modelo
        return $this->usuarioRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->usuarioRepository->update($id, $data);
    }

    public function delete($id)
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