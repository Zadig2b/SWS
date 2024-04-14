<div id="create-student-section" class="section">
    <h2>Création d'un Apprenant</h2>
    <div id="studentCreationForm">
        <form id="studentForm">
            <div class="mb-3">
                <label for="nomInput" class="form-label">Nom*</label>
                <input type="text" class="form-control" id="nomInput" required>
            </div>
            <div class="mb-3">
                <label for="prenomInput" class="form-label">Prénom*</label>
                <input type="text" class="form-control" id="prenomInput" required>
            </div>
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email*</label>
                <input type="email" class="form-control" id="emailInput" required>
            </div>
            <button type="button" class="btn btn-primary" id="retour-btn-student-submit">Retour</button>
            <button type="button" class="btn btn-primary" id="studentSubmit" onclick="createStudent()">Sauvegarder</button>
        </form>
    </div>
</div>
