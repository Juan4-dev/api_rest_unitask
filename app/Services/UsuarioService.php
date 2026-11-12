<?php

namespace App\Services;

use App\Repositories\UsuarioRepository;

class UsuarioService
{
    public function __construct(protected UsuarioRepository $usuarioRepository)
    {
    }

    public function getAll()
    {
        return $this->empleadoRepository->getAll();
    }

    public function getById($id)
    {
        return $this->empleadoRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->empleadoRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->empleadoRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->empleadoRepository->delete($id);
    }

    public function findByNombreEmpleado(string $nombreEmpleado)
    {
        return $this->empleadoRepository->findByNombreEmpleado($nombreEmpleado);
    }

    public function findByNumeroIdentificacion(int $numeroIdentificacion)
    {
        return $this->empleadoRepository->findByNumeroIdentificacion($numeroIdentificacion);
    }

    public function findByApellidoEmpleado(string $apellidoEmpleado)
    {
        return $this->empleadoRepository->findByApellidoEmpleado($apellidoEmpleado);
    }

    public function findByTelefonoEmpleado(string $telefonoEmpleado)
    {
        return $this->empleadoRepository->findByTelefonoEmpleado($telefonoEmpleado);
    }

    public function findByUsuario(string $usuario)
    {
        return $this->usuarioRepository->findByUsuario($usuario);
    }

    public function assignRole(int $usuario, int $rol)
    {
        return $this->usuarioRepository->assignRole($usuario, $rol);
    }

    public function verifyCredentials(string $usuario, string $contraseña)
    {
        return $this->usuarioRepository->verifyCredentials($usuario, $contraseña);
    }
}
