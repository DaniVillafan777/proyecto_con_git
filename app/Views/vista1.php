<?= $this->extend('layout/base') ?>
<?= $this->section('contenido') ?>
<button type="button" class="btn btn-info mb-2" id="btn-nueva-persona">Nuevo</button>
<table class="table table-dark table-striped" id="tbl-personas">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha registro</th>
                <th>Estado</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $user) :?>
            <tr>
                <td><?= $user['nombre'] ?></td>
                <td><?= $user['apellido'] ?></td>
                <td><?= $user['fecha_registro'] ?></td>
                <td><?= $user['estado'] ?></td> 
                <td>
                    <button type="button" data-id="<?= $user['id_persona'] ?>" class="btn btn-outline-success btn-sm float-end ms-3 btn-editar">Modificar</button>
                    <button type="button" data-id="<?= $user['id_persona'] ?>" class="btn btn-outline-danger btn-sm float-end btn-eliminar">Eliminar</button>
                </td>   
            </tr>
            <?php endforeach; ?>
        </tbody>
</table>
<script src="<?= base_url('assets/js/js/persona.js') ?>"></script>
<?= $this->endSection('contenido') ?>

