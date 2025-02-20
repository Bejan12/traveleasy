<style>
@import url('https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Ultra&display=swap');


    .table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    .table th, .table td {
        font-family: 'Instrument Sans', sans-serif;
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .table th {
        background-color: #6A00FF;
        color: white;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .table-striped tbody tr:nth-of-type(even) {
        background-color: #ffffff;
    }

    .table-bordered {
        border: 1px solid #ddd;
    }

    .container {
        text-align: center;
        margin-top: 50px;
    }

    .container h1 {
        font-family: Instrument Sans, sans-serif;
        font-weight: bold;
        font-size: 50px;
        color: #6A00FF;
        margin-bottom: 30px;
    }
</style>

<div class="container">
    <h1><?php echo $data['title']; ?></h1>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Gebruikersnaam</th>
                <th>Wachtwoord</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['users'] as $user): ?>
                <tr>
                    <td><?php echo $user->Gebruikersnaam; ?></td>
                    <td><?php echo $user->Wachtwoord; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>