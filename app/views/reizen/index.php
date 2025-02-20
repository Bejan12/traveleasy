<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3">
        <div class="col-12 text-center">
            <h3 class="mb-4"><?php echo $data['title']; ?></h3>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12 text-right">
            <a href="#" class="btn btn-success">Reis Toevoegen</a>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12">
            <form action="<?php echo URLROOT; ?>/reizen/index" method="GET" class="form-inline">
                <div class="input-group mb-3">
                    <select name="bestemming" class="form-control">
                        <option value="">Selecteer bestemming</option>
                        <?php foreach ($data['bestemmingen'] as $bestemming) : ?>
                            <option value="<?php echo $bestemming->Land; ?>" <?php echo $data['bestemming'] == $bestemming->Land ? 'selected' : ''; ?>>
                                <?php echo $bestemming->Land . ' - ' . $bestemming->Luchthaven; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-primary">Zoeken</button>
                </div>
                <div class="input-group">
                    <select name="vertrekdatum" class="form-control">
                        <option value="">Selecteer vertrekdatum</option>
                        <?php foreach ($data['vertrekdatums'] as $datum) : ?>
                            <option value="<?php echo $datum->Vertrekdatum; ?>" <?php echo $data['vertrekdatum'] == $datum->Vertrekdatum ? 'selected' : ''; ?>>
                                <?php echo $datum->Vertrekdatum; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-primary">Zoeken</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Vluchtnummer</th>
                        <th>Vertrekdatum</th>
                        <th>Vertrektijd</th>
                        <th>Aankomstdatum</th>
                        <th>Aankomsttijd</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data['reizen'])) : ?>
                        <tr>
                            <td colspan="6" class="text-center">Geen reizen beschikbaar</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($data['reizen'] as $reis) : ?>
                            <tr>
                                <td><?php echo $reis->Vluchtnummer; ?></td>
                                <td><?php echo $reis->Vertrekdatum; ?></td>
                                <td><?php echo $reis->Vertrektijd; ?></td>
                                <td><?php echo $reis->Aankomstdatum; ?></td>
                                <td><?php echo $reis->Aankomsttijd; ?></td>
                                <td>
                                    <a href="#"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 text-left">
            <a href="<?php echo URLROOT; ?>/homepages/index" class="btn btn-secondary">Terug naar het Dashboard</a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>