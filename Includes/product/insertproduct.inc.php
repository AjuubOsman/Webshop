<div class="container mt-3">
    <h2>Categorie toevoegen</h2>
    <form action="php/insertproduct.php" method="POST">
        <div class="mb-3 mt-3">
            <label>Naam:</label>
            <input type="text" class="form-control" placeholder="Naam" name="name">
        </div>
        <div class="mb-3 mt-3">
            <label>Beschrijving:</label>
            <input type="text" class="form-control" placeholder="Beschrijving" name="description">
        </div>
        <div class="mb-3 mt-3">
            <label>Prijs:</label>
            <input type="text" class="form-control" placeholder="Prijs" name="price">

            <select class="form-select">
                <option value="">1</option>

            </select>
        </div>

        <button type="submit" class="btn btn-success">Toevoegen</button>
    </form>
</div>