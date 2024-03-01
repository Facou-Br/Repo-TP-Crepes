document.getElementById('formLivreur').addEventListener('submit', function(e){
    e.preventDefault();
    ajouterLivreur();
});

function ajouterLivreur() {
    let formData = new FormData(document.getElementById('formLivreur'));
    formData.append('action', 'ajouter'); // Ajouter une action pour le switch PHP

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
    .fail(function(jqXHR, textStatus) {
        console.error('Erreur:', textStatus);
    });
}


function afficherLivreurs() {
    const tbody = document.getElementById('listeLivreurs').getElementsByTagName('tbody')[0];
    const tr = ``;
    tbody.innerHTML += tr;
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
        url: '/Scripts/PhP/gestionLivreurs.php',
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
        const tbody = document.getElementById('listeLivreurs').getElementsByTagName('tbody')[0];
        tbody.innerHTML = '';
        data.forEach(function(livreur) {
            const tr = `<tr>
                            <td>${livreur.Nom}</td>
                            <td>${livreur.Prenom}</td>
                            <td>${livreur.Tel}</td>
                            <td>${livreur.Disponible ? 'Oui' : 'Non'}</td>
                            <td>
                                <button onclick="modifierLivreur(${livreur.IdLivreur})">Modifier</button>
                                <button onclick="archiverLivreur(${livreur.IdLivreur})">Archiver</button>
                            </td>
                        </tr>`;
            tbody.innerHTML += tr;
        });
    })
    .fail(function(jqXHR, textStatus) {
        console.error('Erreur:', textStatus);
    });
}

afficherLivreurs();
