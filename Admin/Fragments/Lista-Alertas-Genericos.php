<?php
if(isset($_SESSION['alertMsg']) && isset($_SESSION['alertType'])) { 
?>
    <div class="alert alert-<?=$_SESSION['alertType']?> alert-dismissible fade show" role="alert">
        <?=$_SESSION['alertMsg']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
    unset($_SESSION['alertType']);
    unset($_SESSION['alertMsg']);
}
