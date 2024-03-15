document.getElementById('formLivreur').addEventListener('submit', function(e){
    e.preventDefault();
    ajouterLivreur();
});

function ajouterLivreur() {
    let nom = document.getElementById('nom').value;
    let prenom = document.getElementById('prenom').value;
    let tel = document.getElementById('tel').value;
    let numSS = document.getElementById('numSS').value;
    let disponible = document.getElementById('disponible').value; 

    // Validation du téléphone
    let regexTel = /^(\+\d{1,3})?\d{8,10}$/;
    if (!regexTel.test(tel)) {
        alert("Le format du numéro de téléphone est invalide.");
        return;
    }

    // Validation du numéro SS
    let regexSS = /^\d+$/;
    if (!regexSS.test(numSS)) {
        alert("Le format du numéro de sécurité sociale est invalide.");
        return;
    }

    // Si tout est valide, création du FormData et appel AJAX
    let formData = new FormData(document.getElementById('formLivreur'));
    formData.append('action', 'ajouter'); // Ajouter une action pour le switch PHP
    console.log(formData);
    
    $.ajax({
       url: '../../../Scripts/PhP/gestionLivreurs.php',
       type: 'POST',
       data: formData,
       contentType: false,
       processData: false,
       dataType: 'json',
       timeout: 1000
    })
    .done(function(data) {
        console.log(data);
        afficherLivreurs(); // Actualiser l'affichage des livreurs
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        console.error('Erreur:', textStatus, 'Détails:', errorThrown, 'Réponse:', jqXHR.responseText);
    });
}


function afficherLivreurs() {
    $.ajax({
        url: '../../../Scripts/PhP/gestionLivreurs.php',
        type: 'POST',
        data: {action: 'afficher'},
        dataType: 'json'
    })
    .done(function(data) {
        console.log(data);
        const tbody = document.getElementById('listeLivreurs').getElementsByTagName('tbody')[0];
        tbody.innerHTML = ''; // Réinitialiser le contenu du tbody
        data.livreurs.forEach(function(livreur) {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td><input type="text" class="edit-nom" value="${livreur.Nom}"></td>
                <td><input type="text" class="edit-prenom" value="${livreur.Prenom}"></td>
                <td><input type="text" class="edit-tel" value="${livreur.Tel}"></td>
                <td><input type="text" class="edit-numSS" value="${livreur.NumSS}"></td>
                <td>
                    <select class="edit-disponible">
                        <option value="1" ${livreur.Disponible ? 'selected' : ''}>Oui</option>
                        <option value="0" ${!livreur.Disponible ? 'selected' : ''}>Non</option>
                    </select>
                </td>
                <td>
                    <button onclick="enregistrerModification(${livreur.IdLivreur}, this.parentNode.parentNode)">Modifier</button>
                    <button onclick="archiverLivreur(${livreur.IdLivreur})">Archiver</button>
                </td>
            `;
            tbody.appendChild(tr);
        });
    })
    .fail(function(jqXHR, textStatus) {
        console.error('Erreur:', textStatus);
    });
}


function modifierLivreur(id) {
    let formData = new FormData();
    formData.append('action', 'modifier');
    formData.append('idLivreur', id);

    $.ajax({
        url: '../../../Scripts/PhP/gestionLivreurs.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json'
    })
    .done(function(data) {
        console.log(data);
        afficherLivreurs();
    })
    .fail(function(jqXHR, textStatus) {
        console.error('Erreur:', textStatus);
    });
}

function archiverLivreur(id) {
    let formData = new FormData();
    formData.append('action', 'archiver');
    formData.append('idLivreur', id);

    $.ajax({
        url: '../../../Scripts/PhP/gestionLivreurs.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json'
    })
    .done(function(data) {
        console.log(data);
        afficherLivreurs();
    })
    .fail(function(jqXHR, textStatus) {
        console.error('Erreur:', textStatus);
    });
}

function afficherLivreurs() {
    $.ajax({
        url: '../../../Scripts/PhP/gestionLivreurs.php',
        type: 'POST',
        data: {action: 'afficher'},
        dataType: 'json'
    })
    .done(function(data) {
        console.log(data);
        const tbody = document.getElementById('listeLivreurs').getElementsByTagName('tbody')[0];
        tbody.innerHTML = ''; // Réinitialiser le contenu du tbody
        if (data.livreurs)
        {
            data.livreurs.forEach(function(livreur) {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td><input type="text" class="edit-nom" value="${livreur.Nom}" /></td>
                    <td><input type="text" class="edit-prenom" value="${livreur.Prenom}" /></td>
                    <td><input type="text" class="edit-tel" value="${livreur.Tel}" /></td>
                    <td><input type="text" class="edit-numSS" value="${livreur.NumSS}" /></td>
                    <td>
                        <select class="edit-disponible">
                            <option value="1" ${livreur.Disponible === "1" ? 'selected' : ''}>Oui</option>
                            <option value="0" ${livreur.Disponible === "0" ? 'selected' : ''}>Non</option>
                        </select>
                    </td>
                    <td>
                        <button onclick="enregistrerModification(${livreur.IdLivreur}, this.parentNode.parentNode)">Modifier</button>
                        <button onclick="archiverLivreur(${livreur.IdLivreur})">Archiver</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }
        else if (data.error)
        {
            console.error("php error : " + data.error); 
            alert('Database Error');
        }
    })
    .fail(function(jqXHR, textStatus) {
        console.error('Erreur lors de la récupération des livreurs:', textStatus);
    });
}


function enregistrerModification(idLivreur, row) {
    let formData = new FormData();
    formData.append('action', 'modifier');
    formData.append('idLivreur', idLivreur);
    formData.append('nom', row.querySelector('.edit-nom').value);
    formData.append('prenom', row.querySelector('.edit-prenom').value);
    formData.append('tel', row.querySelector('.edit-tel').value);
    formData.append('disponible', row.querySelector('.edit-disponible').value);
    formData.append('numSS', row.querySelector('.edit-numSS').value);

    $.ajax({
        url: '../../../Scripts/PhP/gestionLivreurs.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json'
    })
    .done(function(data) {
        console.log(data);
        alert('Modification enregistrée avec succès');
        afficherLivreurs(); // Recharger la liste pour afficher les modifications
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        console.error('Erreur:', textStatus, 'Détails:', errorThrown);
        alert('Erreur lors de l\'enregistrement des modifications');
    });
}


afficherLivreurs();
