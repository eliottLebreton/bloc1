// Validation du formulaire
function validateForm() {
    // Récupérer les valeurs des champs
    var prenom = document.getElementById("prenom").value;
    var nom = document.getElementById("nom").value;
    var mail = document.getElementById("mail").value;
    var commentaire = document.getElementById("commentaire").value;

    // Vérifier que le prénom et le nom contiennent uniquement des lettres (alphabétiques)
    var namePattern = /^[A-Za-z]+$/;
    if (!namePattern.test(prenom)) {
        alert("Le prénom ne doit contenir que des lettres.");
        return false;
    }
    if (!namePattern.test(nom)) {
        alert("Le nom ne doit contenir que des lettres.");
        return false;
    }

    // Vérifier que l'email a un format valide
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(mail)) {
        alert("Veuillez entrer une adresse email valide.");
        return false;
    }

    // Vérifier que le commentaire ne dépasse pas 500 caractères
    if (commentaire.length > 500) {
        alert("Le commentaire ne doit pas dépasser 500 caractères.");
        return false;
    }

    // Si tout est validé, soumettre le formulaire
    return true;
}
