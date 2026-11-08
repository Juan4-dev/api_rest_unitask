<?php

namespace App\Services;
use App\Repositories\UsuarioRepository;
use Illuminate\Support\Facades\Hash;

class UsuarioService
{
    protected UsuarioRepository $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
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
        $data['contraseña'] = Hash::make($data['contraseña']);

        return $this->usuarioRepository->create($data); 
    }

    public function update(int $id, array $data)
    {
        $data['contraseña'] = Hash::make($data['contraseña']);

        return $this->usuarioRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->usuarioRepository->delete($id);
    }

    public function findByUsuario(string $usuario)
    {
        return $this->usuarioRepository->findByUsuario($usuario);
    }

    public function findByIdentification(string $numeroIdentificacion)
    {
        return $this->usuarioRepository->findByIdentification($numeroIdentificacion);
    }

    public function findByRol(int $rol)
    {
        return $this->usuarioRepository->findByRol($rol);
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

