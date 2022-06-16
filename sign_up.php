<form action="sign_up_verif.php" method="POST">
    <label for="nom">Nom*</label>
    <input type="text" name="l_name" required>
    <label for="prenom">Prénom*</label>
    <input type="text" name="f_name" required>
    <label for="TD">TD</label>
    <select name="td">
        <option value="">--Veuillez choisir une valeur--</option>
        <option value="AB">AB</option>
        <option value="CD">CD</option>
        <option value="EF">EF</option>
        <option value="GH">GH</option>
    </select>
    <label for="mdp">Mot de passe</label>
    <input type="password" name="mdp" minlength="8" required>
    <label for="mdp2">Entrez a nouveau votre mot de passe</label>
    <input type="password" name="mdp2" minlength="8" required>
    <button type="submit">Envoyer</button>
</form>