<?php
require 'database.php';

session_start();

// Verificar si el usuario tiene permiso para acceder a la página de administrador (debes implementar esta lógica)

// Obtener la lista de usuarios y roles de la base de datos
$sql_users = "SELECT id, email, password, nombre, apellido, dni, direccion, fecha_nacimiento, telefono, role_id  FROM users";
$stmt_users = $conn->prepare($sql_users);
$stmt_users->execute();
$users = $stmt_users->fetchAll(PDO::FETCH_ASSOC);

$sql_roles = "SELECT id, nombre FROM roles";
$stmt_roles = $conn->prepare($sql_roles);
$stmt_roles->execute();
$roles = $stmt_roles->fetchAll(PDO::FETCH_ASSOC);

// Procesar el formulario de asignación de roles
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['assign_role'])) {
        $user_id = $_POST['user_id'];
        $role_id = $_POST['role_id'];

        // Actualizar el rol del usuario en la tabla users
        $sql_update_user = "UPDATE users SET role_id = :role_id WHERE id = :user_id";
        $stmt_update_user = $conn->prepare($sql_update_user);
        $stmt_update_user->bindParam(':user_id', $user_id);
        $stmt_update_user->bindParam(':role_id', $role_id);

        // Insertar la asignación de rol en la tabla user_roles
        $sql_assign_role = "INSERT INTO user_roles (user_id, role_id) VALUES (:user_id, :role_id)";
        $stmt_assign_role = $conn->prepare($sql_assign_role);
        $stmt_assign_role->bindParam(':user_id', $user_id);
        $stmt_assign_role->bindParam(':role_id', $role_id);

        try {
            $conn->beginTransaction();

            if ($stmt_update_user->execute() && $stmt_assign_role->execute()) {
                // Rol asignado con éxito
                $conn->commit();
                header('Location: admin.php'); // Redirecciona para evitar envíos duplicados
            } else {
                // Error al asignar el rol
                $conn->rollBack();
                $message = 'Hubo un problema al asignar el rol al usuario.';
            }
        } catch (Exception $e) {
            $conn->rollBack();
            $message = 'Hubo un error en la transacción: ' . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Panel de Administración</title>
</head>
<body>
    <h1>Panel de Administración</h1>
    
    <!-- Aquí puedes mostrar un mensaje de éxito o error si lo necesitas -->
    <form method="post">
                    <label>Seleccionar usuario:</label>
                    <select name="user_id">
                        <?php foreach ($users as $user) : ?>
                            <option value="<?= $user['id'] ?>"><?= $user['nombre'] . ' ' . $user['apellido'] ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label>Seleccionar rol:</label>
                    <select name="role_id">
                        <?php foreach ($roles as $role) : ?>
                            <option value="<?= $role['id'] ?>"><?= $role['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>

                    <button type="submit" name="assign_role">Asignar Rol</button>
                </form>
    <h2>Lista de Usuarios</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Password</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>Domicilio</th>
            <th>Fecha de Nacimiento</th>
            <th>Teléfono</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['password'] ?></td>
                <td><?= $user['nombre'] ?></td>
                <td><?= $user['apellido'] ?></td>
                <td><?= $user['dni'] ?></td>
                <td><?= $user['direccion'] ?></td>
                <td><?= $user['fecha_nacimiento'] ?></td>
                <td><?= $user['telefono'] ?></td>
                <td><?= $user['role_id'] ?></td>
                <td>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>