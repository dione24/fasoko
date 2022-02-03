<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Liste des Services</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>

                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <a href="/addservices" class="btn btn-success"><i class="fa fa-plus"></i>
                    Add</a><br /><br />
                <table class="table table-striped table-bordered " id="dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ListeService as $key => $value) { ?>
                        <tr>
                            <td><?= $value['RefServices']; ?></td>
                            <td><?= $value['nomService']; ?></td>
                            <td> <a href="/editUsers/<?= $value['RefServices']; ?>" class="btn btn-warning"><i
                                        class="fa fa-minus"></i>
                                    Edit</a> <a href="/deleteUsers/<?= $value['RefServices']; ?>"
                                    class="btn btn-danger"><i class="fa fa-minus"></i> Del</a></td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>