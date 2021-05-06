<div class="chat">
    <h1>Liste des Chats</h1>
    <div class="array">
        <?php
        foreach ($var as $link){
            $address = $_SERVER['DOCUMENT_ROOT'] . "/index.php?ctrl=chat&num=" . $link['id'];
            echo "<a href='" . $address . "'>" . $link['name'] . "</a>";
        }

        ?>
    </div>

</div>