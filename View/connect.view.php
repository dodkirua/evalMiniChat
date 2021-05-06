
<div class="chat">
    <h1>Connection</h1>
    <form action="<?= $_SERVER['DOCUMENT_ROOT'] . "/index.php?ctrl=form&action=connect" ?>">

        <div class="form">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="form">
            <label for="pass">PassWord</label>
            <input type="password" name="pass" id="pass">
        </div>
        <input type="submit" value="Valider">

    </form>

</div>
<script src="/assets/js/connect.js"></script>