<div class="chat">
    <h1>Mini chat</h1>
    <h2>Bienvenue sur le chat <?= $var['chatName'] ?></h2>
    <div class="link">
        <a href="/index.php?ctrl=chat">retour a la liste des chats</a>
    </div>
    <div class="area" id="area"></div>
    <div class="interact">
        <input type="hidden" value="<?= $var['numChat'] ?>" id="numChat">
        <input type="hidden" value="<?= $var['userId'] ?>" id="userId">
        <label for="add"></label>
        <input id="add" name="message" class="message">
        <input type="submit" value="Valider" id="submit">
    </div>
</div>
<script src="/assets/js/index.js"></script>
