<div class="chat">
    <h1>Liste des Chats</h1>
    <div class="array">
        <div class="link">
            <a href="/index.php?ctrl=addChat">Ajout d'un chat</a>
        </div>
        <?php
        foreach ($var as $link){
            $address = "/index.php?ctrl=chat&num=" . $link['id'];
            echo "<a href='" . $address . "'>" . $link['name'] . "</a>";
        }

        ?>
    </div>

</div>