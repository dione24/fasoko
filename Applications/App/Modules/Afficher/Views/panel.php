<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Liste des Abonnements</h5>
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
                <button class="btn btn-success" data-toggle="modal" data-target="#addUsers"><i class="fa fa-plus"></i>
                    Add</button><br /><br />
                <table class="table table-striped table-bordered " id="dataTable">
                    <thead>
                        <tr>
                            <th>Statut</th>
                            <th>RF</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Téléphone</th>
                            <th>Service</th>
                            <th>Date Mise en Place</th>
                            <th>Nb Mois</th>
                            <th>Date Fin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $In3days = date('Y-m-d', strtotime(date('Y-m-d') . '+3 days'));
                        foreach ($ListeAb as $key => $value) {
                            $datePlusDuration =
                                date('Y-m-d', strtotime(" +" . $value['Duree'] . " month ", strtotime($value['DateM'])));
                        ?>
                        <tr>
                            <td><?php if (strtotime($datePlusDuration) >= strtotime($In3days)) {
                                        echo '<span class="badge badge-success">Valide</span>';
                                    } elseif (strtotime($datePlusDuration) == strtotime($In3days)) {
                                        echo '<span class="badge badge-warning">Arrive à expiration</span>';
                                    } elseif (strtotime($datePlusDuration) <= strtotime($In3days)) {
                                        echo '<span class="badge badge-danger">Expiré</span>';
                                    } ?></td>
                            <td>AB-<?= $value['RefAb'] . '-' . date('Y'); ?> </td>
                            <td><?= $value['nom']; ?> </td>
                            <td><?= $value['prenom']; ?></td>
                            <td> <?= str_replace(' ', '', $value['telephone']); ?></a>
                            </td>
                            <td><?= $value['nomService']; ?></td>
                            <td><?= date('d-m-Y', strtotime($value['DateM'])); ?></td>
                            <td><?= $value['Duree']; ?></td>
                            <td>
                                <?= date('d-m-Y', strtotime(" +" . $value['Duree'] . " month ", strtotime($value['DateM']))); ?>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <button class="dropdown-item" data-toggle="modal"
                                            data-target="#whatsapp-<?= $value['RefAb']; ?>">Alert
                                            Using Whatsapp</button>
                                        <a class="dropdown-item" href="#">Extend</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!--Send Using Whatsapp--->
                        <div class="modal fade" id="whatsapp-<?= $value['RefAb']; ?>" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form method="post">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="whatsapp">Send Message Using Whatsapp</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Phone Number</label>
                                                <input type="text" class="form-control" name="phone"
                                                    value="<?= str_replace(' ', '', $value['telephone']); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Message</label>
                                                <textarea class="form-control" name="message"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="sumbit" class="btn btn-primary">Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--Send Using Whatsapp--->
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!---modalAddUsers--->
<div class="modal fade" id="addUsers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Statut">Client</label>
                        <select class="form-control" name="RefClient">
                            <?php foreach ($ListeClients as $key => $value) { ?>
                            <option value="<?= $value['id']; ?>">
                                <?= $value['nom'] . ' ' . $value['prenom'] . ' ' . $value['telephone']; ?>
                            </option>
                            <?php   } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Statut">Service</label>
                        <select class="form-control" name="RefService">
                            <?php foreach ($ListeService as $key => $value) { ?>
                            <option value="<?= $value['RefServices']; ?>"><?= $value['nomService']; ?> </option>
                            <?php   } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="login">Date de mise en place </label>
                        <input type="date" class="form-control" name="DateM">
                    </div>
                    <div class="form-group">
                        <label for="prenom">Durée</label>
                        <input type="int" class="form-control" name="Duree">
                    </div>
                    <div class="form-group">
                        <label for="prenom">Note</label>
                        <input type="text" class="form-control" name="note">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Ferner</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>