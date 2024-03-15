function chargerLivreurs() {
    $.ajax({
        url: '../../../Scripts/PhP/gestionLivreurs.php',
        type: 'POST',
        data: { action: 'afficher' },
        dataType: 'json',
        success: function(data) {
            console.log(data);
            const div = document.getElementById('listeLivreurs');
            div.innerHTML = '';
            data.livreurs.forEach(function(livreur) {
                // nouveau div pour contenir la checkbox et le label
                const livreurItem = document.createElement('div');
                livreurItem.className = 'livreur-item'; // Ajoutez une classe pour le styling
                
                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.id = 'dispo_' + livreur.IdLivreur;
                checkbox.dataset.idLivreur = livreur.IdLivreur;
                checkbox.checked = livreur.PresentCeSoir === "1"; // Initialiser selon la disponibilité du soir
                checkbox.onclick = function() {
                    specifierDisponibiliteSoir(this.dataset.idLivreur, this.checked);
                };

                const label = document.createElement('label');
                label.htmlFor = checkbox.id;
                label.textContent = livreur.Nom + ' ' + livreur.Prenom;

                // ajout checkbox et label au div 'livreur-item'
                livreurItem.appendChild(checkbox);
                livreurItem.appendChild(label);

                // Ajout 'livreur-item' au div principal
                div.appendChild(livreurItem);
            });
        }
    });
}


function specifierDisponibiliteSoir(idLivreur, present) {
    $.ajax({
        url: '../../../Scripts/PhP/gestionLivreurs.php',
        type: 'POST',
        data: {
            action: 'specifierDisponibiliteSoir',
            idLivreur: idLivreur,
            present: present
        },
        dataType: 'json',
        success: function(response) {
            console.log(response.message);
            alert('Disponibilité mise à jour.');
        },
        error: function(xhr, status, error) {
            console.error("Erreur: " + status + " - " + error);
            alert('Erreur lors de la mise à jour de la disponibilité.');
        }
    });
}

chargerLivreurs();