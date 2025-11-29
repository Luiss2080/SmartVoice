@extends('modulos.configuracion.layout')

@section('config-content')
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon users">
                <i class="fa-solid fa-users"></i>
            </div>
            <div class="stat-info">
                <div class="stat-value">{{ $totalUsuarios }}</div>
                <div class="stat-label">Total Usuarios</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon new">
                <i class="fa-solid fa-user-plus"></i>
            </div>
            <div class="stat-info">
                <div class="stat-value">{{ $nuevosUsuarios }}</div>
                <div class="stat-label">Nuevos (Mes)</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon active">
                <i class="fa-solid fa-user-check"></i>
            </div>
            <div class="stat-info">
                <div class="stat-value">{{ $totalUsuarios }}</div>
                <div class="stat-label">Usuarios Activos</div>
            </div>
        </div>
    </div>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div>
            <h2 class="config-page-title" style="margin-bottom: 5px;">Gestión de Usuarios</h2>
            <p class="config-page-subtitle" style="margin-bottom: 0;">Administra el acceso al sistema.</p>
        </div>
        <button class="btn btn-primary btn-sm" onclick="openModal('createUserModal')">
            <i class="fa-solid fa-plus" style="margin-right: 5px;"></i> Nuevo Usuario
        </button>
    </div>

    <table class="users-table">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Email</th>
                <th>Fecha Registro</th>
                <th style="text-align: right;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <div class="user-avatar-small">
                            {{ substr($usuario->name, 0, 1) }}
                        </div>
                        <span style="font-weight: 500;">{{ $usuario->name }}</span>
                    </div>
                </td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
                <td style="text-align: right;">
                    <div style="display: flex; gap: 5px; justify-content: flex-end;">
                        <button class="btn-icon" style="width: 32px; height: 32px;" onclick="editUser({{ $usuario }})">
                            <i class="fa-solid fa-pen" style="font-size: 0.9rem;"></i>
                        </button>
                        @if(auth()->id() !== $usuario->id)
                            <form action="{{ route('users.destroy', $usuario->id) }}" method="POST" onsubmit="return confirm('¿Eliminar usuario?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-icon" style="width: 32px; height: 32px; color: #ff6b6b;">
                                    <i class="fa-solid fa-trash" style="font-size: 0.9rem;"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Create User Modal -->
    <div id="createUserModal" class="modal">
        <div class="card" style="width: 400px; max-width: 90%;">
            <div class="card-header">
                <h3 class="card-title">Nuevo Usuario</h3>
                <button onclick="closeModal('createUserModal')" style="background: none; border: none; font-size: 1.2rem; cursor: pointer;">&times;</button>
            </div>
            <div class="card-body" style="padding: 20px;">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div style="margin-bottom: 15px;">
                        <label class="config-label">Nombre</label>
                        <input type="text" name="name" class="config-input" required>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label class="config-label">Email</label>
                        <input type="email" name="email" class="config-input" required>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label class="config-label">Contraseña</label>
                        <input type="password" name="password" class="config-input" required minlength="8">
                    </div>
                    <button type="submit" class="btn btn-primary btn-full">Crear Usuario</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div id="editUserModal" class="modal">
        <div class="card" style="width: 400px; max-width: 90%;">
            <div class="card-header">
                <h3 class="card-title">Editar Usuario</h3>
                <button onclick="closeModal('editUserModal')" style="background: none; border: none; font-size: 1.2rem; cursor: pointer;">&times;</button>
            </div>
            <div class="card-body" style="padding: 20px;">
                <form id="editUserForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div style="margin-bottom: 15px;">
                        <label class="config-label">Nombre</label>
                        <input type="text" name="name" id="edit_name" class="config-input" required>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label class="config-label">Email</label>
                        <input type="email" name="email" id="edit_email" class="config-input" required>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label class="config-label">Nueva Contraseña (Opcional)</label>
                        <input type="password" name="password" class="config-input" minlength="8" placeholder="Dejar vacío para mantener">
                    </div>
                    <button type="submit" class="btn btn-primary btn-full">Actualizar Usuario</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById(id).classList.add('show');
        }

        function closeModal(id) {
            document.getElementById(id).classList.remove('show');
        }

        function editUser(user) {
            document.getElementById('edit_name').value = user.name;
            document.getElementById('edit_email').value = user.email;
            document.getElementById('editUserForm').action = `/users/${user.id}`;
            openModal('editUserModal');
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.classList.remove('show');
            }
        }
    </script>
@endsection
